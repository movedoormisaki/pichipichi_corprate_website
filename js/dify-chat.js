/**
 * Dify API Chat Client
 *
 * Dify の Chat API を直接呼び出してカスタムチャットUIを実現する。
 * embed.min.js（iframe方式）と異なり、HTML/CSSを完全にカスタマイズ可能。
 *
 * 【注意】
 * APIキーをフロントエンドに直接記載しているため、テスト用途限定。
 * 本番環境では必ずサーバーサイドプロキシ経由でAPIキーを隠蔽すること。
 *
 * 例: WordPress の admin-ajax.php や REST API エンドポイントを中継サーバーとして使用し、
 *      APIキーはサーバー側の環境変数（wp-config.php 等）に格納する。
 */
(function () {
  "use strict";

  // ─── 設定 ───
  var API_BASE = "https://api.dify.ai/v1";
  // APIキーは .env → PHP → window.difyApiConfig 経由で渡される
  var config = window.difyApiConfig || {};
  var API_KEY = config.apiKey || "";
  var USER_ID = "cefit-test-user";

  // ─── DOM要素 ───
  var messagesEl = document.getElementById(
    "custom-chat-messages",
  );
  var inputEl = document.getElementById(
    "custom-chat-input",
  );
  var sendBtn = document.getElementById("custom-chat-send");

  if (!messagesEl || !inputEl || !sendBtn) return;

  // ─── 状態管理 ───
  var conversationId = "";
  var isLoading = false;

  // ─── Markdown → HTML 変換 ───
  function renderMarkdown(text) {
    if (
      typeof marked !== "undefined" &&
      marked.parse
    ) {
      return marked.parse(text, { breaks: true });
    }
    // marked.js が読み込まれていない場合はフォールバック
    return text
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/\n/g, "<br>");
  }

  // ─── メッセージをDOMに追加 ───
  function appendMessage(
    role,
    text,
    useMarkdown,
  ) {
    var wrapper = document.createElement("div");
    wrapper.className =
      "custom-chat__message custom-chat__message--" +
      role;

    // アバター
    var avatar = document.createElement("div");
    avatar.className =
      "custom-chat__avatar custom-chat__avatar--" +
      role;
    avatar.textContent =
      role === "bot"
        ? "\uD83E\uDD16"
        : "\uD83D\uDC64";

    // 吹き出し
    var bubble = document.createElement("div");
    bubble.className = "custom-chat__bubble";

    if (useMarkdown && text) {
      bubble.innerHTML = renderMarkdown(text);
    } else {
      bubble.textContent = text;
    }

    wrapper.appendChild(avatar);
    wrapper.appendChild(bubble);
    messagesEl.appendChild(wrapper);
    messagesEl.scrollTop =
      messagesEl.scrollHeight;
    return bubble;
  }

  // ─── 吹き出し内ローディング表示 ───
  function setBubbleLoading(bubble, label) {
    bubble.classList.add("custom-chat__bubble--loading");
    bubble.innerHTML =
      '<span class="custom-chat__loading-label">' + label + '</span>' +
      '<span class="custom-chat__loading-dots">' +
      '<span class="dot"></span><span class="dot"></span><span class="dot"></span>' +
      '</span>';
    messagesEl.scrollTop = messagesEl.scrollHeight;
  }

  function clearBubbleLoading(bubble) {
    bubble.classList.remove("custom-chat__bubble--loading");
  }

  // ─── UIの有効/無効切り替え ───
  function setUIEnabled(enabled) {
    inputEl.disabled = !enabled;
    sendBtn.disabled = !enabled;
    isLoading = !enabled;

    if (!enabled) {
      sendBtn.classList.add("is-loading");
    } else {
      sendBtn.classList.remove("is-loading");
    }
  }

  // ─── SSEストリーミングでDify APIを呼ぶ ───
  async function sendMessage(query) {
    if (!query.trim() || isLoading) return;

    if (!API_KEY) {
      appendMessage(
        "bot",
        "APIキーが設定されていません。テーマディレクトリの .env ファイルに DIFY_API_KEY=app-xxxxx を設定してください。",
        false,
      );
      return;
    }

    // ユーザーメッセージを表示
    appendMessage("user", query, false);
    inputEl.value = "";
    setUIEnabled(false);

    // ボットの吹き出しを先に作成し、ローディング表示
    var botBubble = appendMessage("bot", "", false);
    setBubbleLoading(botBubble, "接続中");

    try {
      var requestBody = {
        inputs: {},
        query: query,
        response_mode: "streaming",
        conversation_id: conversationId,
        user: USER_ID,
      };
      console.log("[dify-chat] 送信:", {
        conversation_id: conversationId || "(新規会話)",
        query: query,
      });

      var response = await fetch(API_BASE + "/chat-messages", {
        method: "POST",
        headers: {
          Authorization: "Bearer " + API_KEY,
          "Content-Type": "application/json",
        },
        body: JSON.stringify(requestBody),
      });

      if (!response.ok) {
        throw new Error(
          "API Error: " + response.status + " " + response.statusText
        );
      }

      // 接続成功 → 応答中に切り替え
      setBubbleLoading(botBubble, "応答中");

      var reader = response.body.getReader();
      var decoder = new TextDecoder();
      var buffer = "";
      var fullText = "";

      while (true) {
        var result = await reader.read();
        if (result.done) break;

        buffer += decoder.decode(result.value, {
          stream: true,
        });
        var lines = buffer.split("\n");
        // 最後の不完全な行はバッファに残す
        buffer = lines.pop() || "";

        for (var i = 0; i < lines.length; i++) {
          var line = lines[i].trim();
          if (!line.startsWith("data:")) continue;

          var jsonStr = line.substring(5).trim();
          if (!jsonStr) continue;

          try {
            var data = JSON.parse(jsonStr);

            // すべてのイベントから conversation_id を取得（最初の message イベントで既に含まれる）
            if (
              data.conversation_id &&
              !conversationId
            ) {
              conversationId =
                data.conversation_id;
              console.log(
                "[dify-chat] conversation_id 取得:",
                conversationId,
              );
            }

            if (
              data.event === "message" ||
              data.event === "agent_message"
            ) {
              // 最初のテキスト到着時にローディング表示をクリア
              if (!fullText) {
                clearBubbleLoading(botBubble);
              }
              fullText += data.answer || "";
              // ストリーミング中はMarkdownをリアルタイム描画
              botBubble.innerHTML = renderMarkdown(fullText);
              messagesEl.scrollTop = messagesEl.scrollHeight;
            }

            if (data.event === "message_end") {
              // message_end でも念のため更新
              if (data.conversation_id) {
                conversationId =
                  data.conversation_id;
              }
            }

            if (data.event === "error") {
              fullText +=
                "\n[エラー: " +
                (data.message || "不明なエラー") +
                "]";
              botBubble.innerHTML =
                renderMarkdown(fullText);
            }
          } catch (e) {
            // JSON解析失敗は無視（不完全なチャンクの可能性）
          }
        }
      }

      // 最終描画（完全なMarkdownとして再レンダリング）
      if (fullText) {
        botBubble.innerHTML =
          renderMarkdown(fullText);
      } else {
        botBubble.textContent =
          "（応答がありませんでした）";
      }
    } catch (err) {
      clearBubbleLoading(botBubble);
      botBubble.textContent = "エラーが発生しました: " + err.message;
    } finally {
      setUIEnabled(true);
      inputEl.focus();
    }
  }

  // ─── イベントリスナー ───
  sendBtn.addEventListener("click", function () {
    sendMessage(inputEl.value);
  });

  inputEl.addEventListener(
    "keydown",
    function (e) {
      if (e.key === "Enter" && !e.shiftKey) {
        e.preventDefault();
        sendMessage(inputEl.value);
      }
    },
  );
})();
