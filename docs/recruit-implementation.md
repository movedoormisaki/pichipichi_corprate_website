# 採用サイト（page-recruit.php）の実装

2026年10月23日。Figma「ぴちぴち 採用LP v9｜PC・スマホ」をSWELL子テーマのテンプレートとして実装。

## 対象

- PC：Figma `3:11`（1440px）
- スマホ：Figma `3:12`（390px）
- ファイル：https://www.figma.com/design/I4SG42iEqBoI5BsJiXxHRA

## 追加・変更ファイル

| ファイル | 内容 |
|---|---|
| `page-recruit.php` | テンプレート「採用サイト」。ヒーロー／理念／仕事を知る／働き方／代表メッセージ／学べるスキル／募集条件／Q&A／選考／LINE CTA／フッター |
| `scss/object/project/_recruit.scss` | ページ専用スタイル（`.recruit` ブロック）。`_index.scss` に登録済み |
| `img/recruit/icon-*.svg` | アイコン（Figmaのアセットはこの環境からダウンロードできなかったため、同系のラインアイコンで再作成） |
| `functions.php` | 採用テンプレートでのみ Noto Sans JP / Oswald を読み込む |
| `css/theme.min.css` | `npm run build` で再生成 |

## 写真・画像の配置（要対応）

Figma上の写真・キャラクター画像はネットワーク制限により取得できなかった。以下のファイル名で `img/recruit/` に書き出して置くと、テンプレートが自動で表示する（無い間は「NO IMAGE」またはプレースホルダー表示）。

| ファイル名 | 用途 | Figmaレイヤー |
|---|---|---|
| `sausage-experience.webp` | ヒーロー背景・仕事カード01 | `sausage-experience.webp` |
| `meal-delivery.webp` | 仕事カード02・働き方の写真 | `meal-delivery.webp` / `Photo break` |
| `bento.png` | 募集条件の商品写真（背景除去） | `Asset/お弁当/提供画像・背景除去` |
| `shishimame.png` | Q&A・CTAのキャラクター（背景除去） | `Asset/キャラクター/ししまめ・背景除去` |
| `founder.jpg` | 代表写真（固定ページのアイキャッチ画像があればそちらを優先） | `代表写真 / 差し替え待ち` |
| `icon-line.svg` | LINEアイコン。公式素材に差し替え推奨 | `Icon/LINE/公式` |

## WordPressへの反映時

1. 子テーマの変更ファイルと `img/recruit/` を反映する。
2. 固定ページ「採用サイト」をスラッグ `recruit` で作成し、テンプレート「採用サイト」を選択する。
3. 上記の写真を `img/recruit/` に配置する。
4. LINEのリンク先は `https://lin.ee/UN2CkFl`（テンプレート内 `$line_url`）。
5. Figmaの `確認用プレビュー` バー・ヘッダーナビ・`Who we are looking for` は非表示レイヤーのため実装していない。

## ローカル検証

PHP 8.3で構文チェック、Sassビルド、1440px / 390px でChromiumによる表示確認を実施。
Q&Aは `<details>` によるアコーディオン、「仕事を知る」ボタンはページ内スクロール。
