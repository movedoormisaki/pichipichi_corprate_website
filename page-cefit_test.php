<?php

/**
 * Template Name: CEFIT Test
 * Template Post Type: page
 * @package WordPress
 * @subpackage  Pichi pichi Co., Ltd.
 * @since 1.0.0
 */
?>
<? get_header();
include 'nav.php' ?>
<main class="cefit-test">
    <div class="cefit-test__headline low-c-headline">
        <div class="cefit-test__container container">
            <h1>CEFIT TEST</h1>
            <p>チャットボット テストページ — API方式 vs embed方式 比較</p>
        </div>
    </div>

    <div class="cefit-test__body">
        <div class="cefit-test__container container">
            <section class="cefit-test__content">
                <h2>Dify チャットボット 比較テスト</h2>
                <p>
                    左側が Dify API を直接呼び出す自作UI（デザイン完全カスタマイズ可能）、
                    右側が embed.min.js の iframe 埋め込み方式です。
                </p>
            </section>

            <!-- 2カラム比較エリア -->
            <div class="cefit-test__compare">
                <!-- 左: API方式（自作チャットUI） -->
                <div class="cefit-test__panel">
                    <div class="cefit-test__panel-header">API方式（自作UI）</div>
                    <div class="custom-chat">
                        <div class="custom-chat__header">
                            <span class="custom-chat__title">CEFIT チャットサポート</span>
                        </div>
                        <div class="custom-chat__messages" id="custom-chat-messages">
                            <div class="custom-chat__message custom-chat__message--bot">
                                <div class="custom-chat__avatar custom-chat__avatar--bot">🤖</div>
                                <div class="custom-chat__bubble">こんにちは！ご質問やお問い合わせがありましたら、お気軽にどうぞ。</div>
                            </div>
                        </div>
                        <div class="custom-chat__input-area">
                            <input
                                type="text"
                                id="custom-chat-input"
                                class="custom-chat__input"
                                placeholder="メッセージを入力..."
                                autocomplete="off" />
                            <button id="custom-chat-send" class="custom-chat__send-btn" type="button">
                                送信
                            </button>
                        </div>
                    </div>
                </div>

                <!-- 右: embed方式（iframe） -->
                <div class="cefit-test__panel">
                    <div class="cefit-test__panel-header">embed方式（iframe）</div>
                    <div class="cefit-test__iframe-wrapper">
                        <iframe
                            src="https://udify.app/chatbot/F6zNU9wPlSnTVOcJ"
                            class="cefit-test__iframe"
                            allow="microphone"
                            frameborder="0"></iframe>
                    </div>
                </div>
            </div>

            <div class="cefit-test__info">
                <h3>テスト項目</h3>
                <ul>
                    <li>左側（API方式）：メッセージ送信 → ストリーミングレスポンス表示</li>
                    <li>右側（embed方式）：iframe内のDifyチャットボット動作確認</li>
                    <li>会話ログの確認</li>
                </ul>
            </div>
        </div>
    </div>

</main>

<!-- Dify API設定（.env から読み込み） -->
<?php
$env_path = get_stylesheet_directory() . '/.env';
$dify_api_key = '';
if (file_exists($env_path)) {
    $env_lines = file($env_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($env_lines as $line) {
        if (strpos($line, '#') === 0) continue;
        if (strpos($line, 'DIFY_API_KEY=') === 0) {
            $dify_api_key = substr($line, strlen('DIFY_API_KEY='));
            break;
        }
    }
}
?>
<script>
    window.difyApiConfig = {
        apiKey: "<?php echo esc_js($dify_api_key); ?>"
    };
</script>
<!-- Markdown パーサー（ボットの応答をHTML描画するため） -->
<script src="https://cdn.jsdelivr.net/npm/marked@15.0.7/marked.min.js"></script>
<!-- 自作チャットUI用 JavaScript -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/dify-chat.js" defer></script>

<!-- 既存の embed.min.js バブルボタン方式（右下に表示） -->
<script>
    window.difyChatbotConfig = {
        token: 'F6zNU9wPlSnTVOcJ',
        inputs: {
            // You can define the inputs from the Start node here
            // key is the variable name
            // e.g.
            // name: "NAME"
        },
        systemVariables: {
            // user_id: 'YOU CAN DEFINE USER ID HERE',
            // conversation_id: 'YOU CAN DEFINE CONVERSATION ID HERE, IT MUST BE A VALID UUID',
        },
        userVariables: {
            // avatar_url: 'YOU CAN DEFINE USER AVATAR URL HERE',
            // name: 'YOU CAN DEFINE USER NAME HERE',
        },
    }
</script>
<script
    src="https://udify.app/embed.min.js"
    id="F6zNU9wPlSnTVOcJ"
    defer>
</script>
<style>
    #dify-chatbot-bubble-button {
        background-color: #1C64F2 !important;
    }

    #dify-chatbot-bubble-window {
        width: 24rem !important;
        height: 40rem !important;
    }
</style>

<? get_footer(); ?>