# Dify チャットボット × Salesforce CRM 連携ガイド

## 目次

1. [全体アーキテクチャ](#1-全体アーキテクチャ)
2. [Dify セットアップ](#2-dify-セットアップ)
3. [Webサイトへの埋め込み](#3-webサイトへの埋め込み)
4. [デザインカスタマイズ一覧](#4-デザインカスタマイズ一覧)
5. [API方式による自作チャットUI](#5-api方式による自作チャットui)
6. [Salesforce 連携方法](#6-salesforce-連携方法)
7. [リードキャプチャの実装](#7-リードキャプチャの実装)
8. [会話ログの記録](#8-会話ログの記録)
9. [セキュリティと認証](#9-セキュリティと認証)
10. [トラブルシューティング](#10-トラブルシューティング)

---

## 1. 全体アーキテクチャ

```
┌──────────────────────────────────────────────────────┐
│  Webサイト (WordPress)                                │
│  ┌────────────────────────────┐                      │
│  │ page-cefit_test.php        │                      │
│  │ Dify embed.min.js          │                      │
│  │ チャットバブルボタン (右下)   │                      │
│  └────────────┬───────────────┘                      │
└───────────────┼──────────────────────────────────────┘
                │ ユーザーがチャット
                ▼
┌──────────────────────────────────────────────────────┐
│  Dify (クラウド版)                                     │
│  ┌──────────────────────────────────────┐            │
│  │ チャットボット アプリケーション          │            │
│  │  ├─ LLMノード (会話 + 情報抽出)        │            │
│  │  ├─ HTTP Requestノード → Salesforce   │            │
│  │  └─ 条件分岐 (新規/既存リード判定)      │            │
│  └──────────────────────┬───────────────┘            │
└─────────────────────────┼────────────────────────────┘
                          │ REST API
                          ▼
┌──────────────────────────────────────────────────────┐
│  Salesforce CRM                                       │
│  ├─ Lead (リード作成)                                  │
│  ├─ Contact (既存顧客参照)                              │
│  ├─ Task (会話ログ記録)                                 │
│  └─ Custom Object (チャット分析データ)                   │
└──────────────────────────────────────────────────────┘
```

---

### 3.3 カスタマイズ可能なCSS変数

```css
#dify-chatbot-bubble-button {
    --dify-chatbot-bubble-button-bottom: 1.25rem;   /* 下からの距離 */
    --dify-chatbot-bubble-button-right: 1.25rem;    /* 右からの距離 */
    --dify-chatbot-bubble-button-bg-color: #00a2e8; /* ボタン背景色 */
    --dify-chatbot-bubble-button-width: 56px;       /* ボタン幅 */
    --dify-chatbot-bubble-button-height: 56px;      /* ボタン高さ */
    --dify-chatbot-bubble-button-border-radius: 28px; /* 角丸 */
}

#dify-chatbot-bubble-window {
    width: 24rem;   /* チャットウィンドウ幅 */
    height: 40rem;  /* チャットウィンドウ高さ */
}
```

---

## 4. デザインカスタマイズ一覧

Difyチャットボット（embed.min.js バブル方式）のデザイン変更可否をまとめる。

### 4.1 変更できるもの

#### バブルボタン（右下のフローティングボタン） - CSS で自由に変更可能

| 項目 | CSS プロパティ | 例 |
|---|---|---|
| 背景色 | `background-color` | `#1C64F2 !important` |
| サイズ（幅） | `width` | `60px !important` |
| サイズ（高さ） | `height` | `60px !important` |
| 角丸 | `border-radius` | `50% !important` |
| 影 | `box-shadow` | `0 4px 12px rgba(0,0,0,0.15) !important` |
| 下からの距離 | `bottom` | `20px !important` |
| 右からの距離 | `right` | `20px !important` |
| 左に配置 | `right: unset; left` | `20px !important` |
| ホバー時の変形 | `transform` (hover) | `scale(1.1)` |

```css
#dify-chatbot-bubble-button {
    background-color: #1C64F2 !important;
    width: 60px !important;
    height: 60px !important;
    border-radius: 50% !important;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
    bottom: 20px !important;
    right: 20px !important;
}
```

#### チャットウィンドウの外枠 - CSS で変更可能

| 項目 | CSS プロパティ | 例 |
|---|---|---|
| 幅 | `width` | `24rem !important` |
| 高さ | `height` | `40rem !important` |
| 角丸 | `border-radius` | `12px !important` |
| 影 | `box-shadow` | `0 8px 32px rgba(0,0,0,0.2) !important` |

```css
#dify-chatbot-bubble-window {
    width: 24rem !important;
    height: 40rem !important;
    border-radius: 12px !important;
}
```

#### JavaScript 設定（difyChatbotConfig）

| 項目 | プロパティ | 説明 |
|---|---|---|
| ドラッグ移動 | `draggable: true` | ユーザーがボタンをドラッグで移動可能にする |
| ドラッグ方向 | `dragAxis: 'both'` | `'both'`, `'x'`, `'y'` から選択 |
| 入力変数の事前設定 | `inputs: {}` | ワークフローの入力値を事前に渡せる |
| ユーザー情報 | `userVariables: {}` | ユーザーのアバターURL、名前を設定 |
| システム変数 | `systemVariables: {}` | user_id, conversation_id を設定 |

#### Dify ダッシュボード側で変更可能

| 項目 | 設定場所 |
|---|---|
| アプリのアイコン | アプリ設定 → 基本情報 |
| アプリの名前（ヘッダーに表示） | アプリ設定 → 基本情報 |
| ウェルカムメッセージ | プロンプト設定 → オープニング |
| 入力フォームの項目 | ワークフロー → 開始ノード |
| テーマカラー（一部） | アプリ設定 → 外観 |
| 推奨質問の表示 | プロンプト設定 → サジェスト |

### 4.2 変更できないもの

チャットウィンドウの内部は **iframe**（`udify.app` ドメイン）で描画されるため、CSSでの上書きがブラウザのクロスオリジンポリシーにより**ブロックされる**。

| 項目 | 変更可否 | 理由 |
|---|---|---|
| メッセージ吹き出しのデザイン | 不可 | iframe 内部 |
| メッセージのフォント・文字色 | 不可 | iframe 内部 |
| 送信ボタンのデザイン | 不可 | iframe 内部 |
| 入力欄のスタイル | 不可 | iframe 内部 |
| チャットヘッダーのレイアウト | 不可 | iframe 内部 |
| ボットアバターの形状 | 不可 | iframe 内部 |
| メッセージの余白・行間 | 不可 | iframe 内部 |
| ローディングアニメーション | 不可 | iframe 内部 |

### 4.3 完全カスタマイズが必要な場合

チャットウィンドウ内部のデザインも変更したい場合は、**embed.min.js を使わず、Dify API を直接呼び出して独自のチャットUIを構築する**方法がある。

```
embed.min.js 方式（現在）     →  手軽だがUI変更に制限あり
Dify API + 自作UI 方式        →  全デザインを自由に変更可能（開発コスト高）
```

**Dify API を使う場合のエンドポイント:**

```
POST https://api.dify.ai/v1/chat-messages
Authorization: Bearer {api_key}
Content-Type: application/json

{
  "inputs": {},
  "query": "ユーザーのメッセージ",
  "response_mode": "streaming",
  "conversation_id": "",
  "user": "user-id"
}
```

> この方式ではチャットUIのHTML/CSS/JSをすべて自前で実装する必要があるため、デザイン要件が明確な場合にのみ推奨。

---

## 5. API方式による自作チャットUI

embed.min.js（iframe方式）ではチャットウィンドウ内部のデザイン変更ができないため、Dify API を直接呼び出す自作チャットUIを実装した。`page-cefit_test.php` にて embed方式と並べて比較テストできるようになっている。

### 5.1 アーキテクチャ

```
┌──────────────────────────────────────────────────────┐
│  ブラウザ                                              │
│  ┌───────────────────┐  ┌───────────────────┐        │
│  │ 自作チャットUI (左)  │  │ embed iframe (右)  │        │
│  │ js/dify-chat.js    │  │ udify.app         │        │
│  └────────┬──────────┘  └────────┬──────────┘        │
└───────────┼──────────────────────┼───────────────────┘
            │ fetch (SSE)          │ iframe postMessage
            ▼                      ▼
┌──────────────────────────────────────────────────────┐
│  Dify API (api.dify.ai)                                │
│  POST /v1/chat-messages (streaming)                    │
└──────────────────────────────────────────────────────┘
```

### 5.2 ファイル構成

| ファイル | 役割 |
|---|---|
| `page-cefit_test.php` | 2カラム比較レイアウト（左: 自作UI、右: iframe） |
| `js/dify-chat.js` | Dify Chat API クライアント（SSEストリーミング対応） |
| `scss/object/project/_cefit-test.scss` | 比較レイアウト + 自作チャットUIのスタイル |

### 5.3 APIキーの設定

embed方式のトークン（`F6zNU9wPlSnTVOcJ`）と API方式のAPIキーは**別物**。

**取得手順:**

1. Dify ダッシュボードにログイン
2. 対象のアプリを開く
3. 左サイドバー「API参照」をクリック
4. 「APIキー」セクションからキーをコピー（`app-xxxxxxxx` 形式）

**設定方法:**

`js/dify-chat.js` 内の以下の行を編集:

```javascript
const API_KEY = 'YOUR_DIFY_API_KEY';  // ← ここを差し替え
```

> **セキュリティ注意**: フロントエンドJSにAPIキーを直接記載するのはテスト用途限定。本番環境ではサーバーサイドプロキシ（WordPress REST API等）を経由してAPIキーを隠蔽すること。

### 5.4 API呼び出しの仕組み

`js/dify-chat.js` は以下の流れで動作する:

1. ユーザーがメッセージを入力して送信
2. `POST https://api.dify.ai/v1/chat-messages` にfetchリクエスト
3. `response_mode: "streaming"` を指定し、SSE（Server-Sent Events）でレスポンスを受信
4. `event: message` / `event: agent_message` のデータからテキストを逐次取得し、タイプライター風に表示
5. `event: message_end` で `conversation_id` を保存（次回以降のマルチターン会話に使用）

### 5.5 カスタマイズ可能な項目（embed方式との比較）

| 項目 | API方式（自作UI） | embed方式（iframe） |
|---|---|---|
| メッセージ吹き出しデザイン | 自由に変更可 | 変更不可 |
| フォント・文字色 | 自由に変更可 | 変更不可 |
| 送信ボタンデザイン | 自由に変更可 | 変更不可 |
| ヘッダーデザイン | 自由に変更可 | 変更不可 |
| 背景色・レイアウト | 自由に変更可 | 変更不可 |
| Powered by Dify 表示 | 表示なし | 非表示不可 |
| 導入コスト | 高（JS実装が必要） | 低（scriptタグのみ） |
| メンテナンスコスト | 高 | 低 |

### 5.6 本番移行時の対応

1. **サーバーサイドプロキシの実装**: APIキーをサーバー側に移動
2. **エラーハンドリングの強化**: ネットワーク障害、レート制限への対応
3. **会話履歴の永続化**: `conversation_id` をローカルストレージ等に保存
4. **入力サニタイズ**: XSS対策としてメッセージ表示時にHTMLエスケープ

---

## 6. Salesforce 連携方法

Dify側での連携には3つの方法がある。推奨は **方法A + 方法B の組み合わせ**。

### 方法A: Salesforce マーケットプレイスプラグイン（読み取り用）

既存の顧客データ参照に最適。

**インストール手順:**

1. Difyダッシュボード → マーケットプレイス
2. 「Salesforce」プラグインを検索・インストール
3. 認証情報を設定:

| 設定項目 | 値 |
|---|---|
| Login URL | `https://login.salesforce.com`（本番）または `https://test.salesforce.com`（Sandbox） |
| Username | Salesforceユーザー名 |
| Password | パスワード + セキュリティトークン（連結） |

**セキュリティトークンの取得:**

Salesforce → 設定 → 個人情報 → 「セキュリティトークンのリセット」

**使用例（SOQLクエリ）:**

```sql
SELECT Id, FirstName, LastName, Email, Company
FROM Lead
WHERE Email = '{{user_email}}'
```

### 方法B: HTTP Request ノード（書き込み用）

リード作成、会話ログ記録に使用。

**Difyワークフローでの設定:**

1. ワークフローに「HTTP Request」ノードを追加
2. 設定:

```
メソッド: POST
URL: https://YOUR_INSTANCE.salesforce.com/services/data/v59.0/sobjects/Lead/
ヘッダー:
  Authorization: Bearer {{salesforce_access_token}}
  Content-Type: application/json
ボディ:
{
  "FirstName": "{{extracted_first_name}}",
  "LastName": "{{extracted_last_name}}",
  "Email": "{{extracted_email}}",
  "Company": "{{extracted_company}}",
  "LeadSource": "Dify Chatbot",
  "Description": "{{conversation_summary}}"
}
```

### 方法C: n8n / Zapier ミドルウェア（複雑なフロー用）

複数ステップの自動化が必要な場合に使用。

```
Dify → Webhook → n8n → Salesforce
                     → メール通知
                     → Slack通知
```

---

## 7. リードキャプチャの実装

### 7.1 Difyワークフロー設計

```
[チャット開始]
  │
  ▼
[LLMノード: 会話 + 情報収集]
  │ ユーザーから名前・メール・会社名・問い合わせ内容を自然に聞き出す
  │
  ▼
[LLMノード: 情報抽出]
  │ 会話からJSON形式で構造化データを抽出
  │ {
  │   "first_name": "太郎",
  │   "last_name": "田中",
  │   "email": "taro@example.com",
  │   "company": "株式会社テスト",
  │   "inquiry": "サービスについて知りたい"
  │ }
  │
  ▼
[条件分岐: メール情報があるか？]
  │
  ├─ Yes → [HTTP Request: Salesforce リード作成]
  │           │
  │           ▼
  │         [LLMノード: 完了メッセージ送信]
  │
  └─ No  → [LLMノード: 追加情報を依頼]
```

### 7.2 情報抽出プロンプト例

```
以下の会話から、ユーザーの情報を JSON 形式で抽出してください。
情報が見つからない場合は null を入れてください。

抽出する項目:
- first_name: 名
- last_name: 姓
- email: メールアドレス
- company: 会社名
- phone: 電話番号
- inquiry: 問い合わせ内容の要約

会話:
{{conversation_history}}
```

### 7.3 Salesforce OAuth2 アクセストークン取得

HTTP Request でSalesforceに接続するには、事前にアクセストークンを取得する必要がある。

**Connected App の作成:**

1. Salesforce 設定 → アプリマネージャー → 新規接続アプリケーション
2. 以下を設定:
   - 接続アプリケーション名: `Dify Chatbot Integration`
   - API名: `Dify_Chatbot_Integration`
   - OAuth設定を有効にする: チェック
   - コールバックURL: `https://login.salesforce.com/services/oauth2/callback`
   - 選択したOAuthスコープ: `Full access (full)` または `Manage user data via APIs (api)`
3. Consumer Key と Consumer Secret を控える

**トークン取得リクエスト:**

```
POST https://login.salesforce.com/services/oauth2/token
Content-Type: application/x-www-form-urlencoded

grant_type=password
&client_id=YOUR_CONSUMER_KEY
&client_secret=YOUR_CONSUMER_SECRET
&username=YOUR_SALESFORCE_USERNAME
&password=YOUR_PASSWORD_WITH_SECURITY_TOKEN
```

**レスポンス:**

```json
{
  "access_token": "00D...",
  "instance_url": "https://yourinstance.salesforce.com",
  "token_type": "Bearer"
}
```

> **注意**: アクセストークンには有効期限がある。本番運用ではリフレッシュトークンを使った自動更新の仕組みを実装すること。

---

## 8. 会話ログの記録

### 8.1 Salesforce Task オブジェクトへの記録

チャット終了時に、会話の要約をSalesforceの「活動（Task）」として記録する。

**HTTP Request 設定:**

```
メソッド: POST
URL: https://YOUR_INSTANCE.salesforce.com/services/data/v59.0/sobjects/Task/
ヘッダー:
  Authorization: Bearer {{salesforce_access_token}}
  Content-Type: application/json
ボディ:
{
  "Subject": "Dify Chatbot 会話ログ",
  "Description": "{{conversation_transcript}}",
  "Status": "Completed",
  "Priority": "Normal",
  "ActivityDate": "{{today_date}}",
  "WhoId": "{{lead_or_contact_id}}"
}
```

### 8.2 カスタムオブジェクトの活用

より詳細な分析が必要な場合、Salesforceにカスタムオブジェクトを作成:

| フィールド | API名 | 型 |
|---|---|---|
| セッションID | Session_ID__c | Text |
| 開始時刻 | Start_Time__c | DateTime |
| 終了時刻 | End_Time__c | DateTime |
| メッセージ数 | Message_Count__c | Number |
| 会話要約 | Conversation_Summary__c | Long Text |
| ユーザー感情 | User_Sentiment__c | Picklist (Positive/Neutral/Negative) |
| 関連リード | Related_Lead__c | Lookup(Lead) |

---

## 9. セキュリティと認証

### 9.1 チェックリスト

- [ ] Salesforce の Connected App で IP制限を設定
- [ ] OAuth スコープを必要最小限に設定
- [ ] アクセストークンをDifyの環境変数（シークレット）として保存
- [ ] Salesforce のセキュリティトークンを定期的にローテーション
- [ ] Dify アプリのレート制限を設定
- [ ] チャットボットからの入力値をサニタイズ（SOQLインジェクション対策）

### 9.2 Dify でのシークレット管理

Difyのワークフロー内で機密情報を扱う場合:

1. Difyダッシュボード → 設定 → 環境変数
2. 以下をシークレットとして登録:
   - `SALESFORCE_ACCESS_TOKEN`
   - `SALESFORCE_INSTANCE_URL`
   - `SALESFORCE_CLIENT_ID`
   - `SALESFORCE_CLIENT_SECRET`

### 9.3 CORS / ドメイン制限

Difyクラウド版では、埋め込みを許可するドメインを設定可能:

1. Difyダッシュボード → アプリ設定 → セキュリティ
2. 許可するドメインを追加（例: `https://pichipichi.co.jp`）

---

## 10. トラブルシューティング

### チャットボタンが表示されない

| 原因 | 対処 |
|---|---|
| トークンが間違っている | Difyダッシュボードで正しいトークンを確認 |
| baseURLが間違っている | クラウド版は `https://udify.app` |
| scriptタグのid属性がトークンと不一致 | `id="YOUR_TOKEN"` を確認 |
| アプリが未公開 | Difyダッシュボードで「公開」を実行 |
| CORSエラー | ブラウザのコンソールを確認、ドメイン許可設定を見直す |

### Salesforce API エラー

| エラーコード | 原因 | 対処 |
|---|---|---|
| 401 Unauthorized | アクセストークンの期限切れ | トークンを再取得、リフレッシュトークンの仕組みを導入 |
| 400 Bad Request | リクエストボディの形式エラー | 必須フィールド（LastName, Company）が含まれているか確認 |
| 403 Forbidden | APIアクセス権限不足 | Connected App のOAuthスコープを確認 |
| 429 Too Many Requests | レート制限 | リクエスト頻度を下げる、バッチ処理を検討 |

### Salesforce リードが作成されない

1. Difyワークフローの実行ログを確認（ダッシュボード → ログ）
2. HTTP Request ノードのレスポンスを確認
3. Salesforce 側の入力規則（Validation Rule）に引っかかっていないか確認
4. 必須フィールド `LastName` と `Company` が空でないか確認

---

## 参考リンク

- [Dify 公式ドキュメント - Webサイト埋め込み](https://docs.dify.ai/en/use-dify/publish/webapp/embedding-in-websites)
- [Dify 公式ドキュメント - HTTP Request ノード](https://docs.dify.ai/en/use-dify/nodes/http-request)
- [Dify マーケットプレイス - Salesforce プラグイン](https://marketplace.dify.ai/plugin/eric-2369/salesforce)
- [Salesforce REST API ドキュメント](https://developer.salesforce.com/docs/atlas.en-us.api_rest.meta/api_rest/)
- [Salesforce Connected App 設定ガイド](https://help.salesforce.com/s/articleView?id=sf.connected_app_create.htm)
