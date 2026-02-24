# Bodyguard サイト全体像ドキュメント

> 株式会社Bodyguard（身辺警護会社）のWordPressカスタムテーマの全体構成をまとめたリファレンスです。
> 最終更新: 2026-02-19

---

## 目次

1. [サイト概要](#1-サイト概要)
2. [ページ構成とテンプレート対応表](#2-ページ構成とテンプレート対応表)
3. [カスタム投稿タイプ](#3-カスタム投稿タイプ)
4. [カスタムタクソノミー（分類）](#4-カスタムタクソノミー分類)
5. [カスタムフィールド（ACF / SCF）](#5-カスタムフィールドacf--scf)
6. [インストール済みプラグイン](#6-インストール済みプラグイン)
7. [フロントエンド構成（CSS/JS）](#7-フロントエンド構成cssjs)
8. [管理画面カスタマイズ](#8-管理画面カスタマイズ)
9. [固定ページのID一覧](#9-固定ページのid一覧)
10. [運用保守の注意点](#10-運用保守の注意点)

---

## 1. サイト概要

| 項目 | 内容 |
|---|---|
| サイト名 | 株式会社Bodyguard |
| 業種 | 身辺警護会社 |
| テーマ名 | WordPressTheme（オリジナルカスタムテーマ） |
| テーマフォルダ | `wp-content/themes/WordPressTheme/` |
| 本番URL | `https://ryuryu53.cloudfree.jp/se/` |
| Google Tag Manager | GTM-K4H6P2QP（本番環境のみ読み込み） |

---

## 2. ページ構成とテンプレート対応表

| ページ名 | URL | テンプレートファイル | 備考 |
|---|---|---|---|
| トップページ | `/` | `front-page.php` | SCFのカスタムフィールドあり |
| ご提供プラン一覧 | `/plans/` | `archive-plans.php` | カスタム投稿アーカイブ |
| プランカテゴリー | `/plans_category/{slug}/` | `taxonomy-plans_category.php` | カスタムタクソノミーアーカイブ |
| 私たちについて | `/about-us/` | `page-about-us.php` | SCFギャラリーフィールドあり |
| 身辺警護についての情報 | `/information/` | `page-information.php` | タブUI（3タブ固定） |
| ブログ一覧 | `/blog/` | `home.php` | サイドバーあり |
| ブログ詳細 | `/blog/{slug}/` | `single.php` | サイドバーあり・閲覧数カウント |
| お客様の声一覧 | `/voice/` | `archive-voice.php` | カスタム投稿アーカイブ |
| お客様の声カテゴリー | `/voice_category/{slug}/` | `taxonomy-voice_category.php` | カスタムタクソノミーアーカイブ |
| 料金一覧 | `/price/` | `page-price.php` | SCFカスタムフィールドあり（ID:35） |
| よくある質問 | `/faq/` | `page-faq.php` | SCFカスタムフィールドあり（ID:31） |
| お問い合わせ | `/contact/` | `page-contact.php` | Contact Form 7使用 |
| サンクスページ | `/thanks/` | `page-thanks.php` | フォーム送信後のリダイレクト先 |
| サイトマップ | `/sitemap/` | `page-sitemap.php` | - |
| プライバシーポリシー | `/privacy-policy/` | `page-privacy-policy.php` | ブロックエディタ有効 |
| 利用規約 | `/terms-of-service/` | `page-terms-of-service.php` | ブロックエディタ有効 |
| ブログ日付アーカイブ | `/YYYY/MM/DD/` | `date.php` | 年月日アーカイブ |
| 404ページ | - | `404.php` | - |

### 共通パーツ

| ファイル | 用途 |
|---|---|
| `header.php` | ヘッダー（ロゴ・ナビ・ハンバーガー） |
| `footer.php` | フッター（ナビ・住所・SNS・コンタクトCTA） |
| `sidebar.php` | サイドバー（人気記事・口コミ・プラン・アーカイブ） |
| `parts/breadcrumbs.php` | パンくずリスト（Breadcrumb NavXTプラグインを使用） |

---

## 3. カスタム投稿タイプ

### 3-1. plans（ご提供プラン）

| 項目 | 内容 |
|---|---|
| 投稿タイプスラッグ | `plans` |
| アーカイブURL | `/plans/` |
| 詳細ページ | **なし**（リライトルールを空にしているため） |
| 一覧表示件数 | 4件/ページ |
| アイキャッチ | あり |
| エディタ | **無効化**（WYSIWYGなし、ACFフィールドのみ） |
| 管理画面表示名 | 「plans」のまま |
| タクソノミー | `plans_category` |

**リンクの挙動:** 各プランカードをクリックすると、その投稿が属するカテゴリーのアーカイブページ（`/plans_category/{slug}/`）へ遷移する。

---

### 3-2. voice（お客様の声）

| 項目 | 内容 |
|---|---|
| 投稿タイプスラッグ | `voice` |
| アーカイブURL | `/voice/` |
| 詳細ページ | **なし**（リライトルールを空にしているため） |
| 一覧表示件数 | 6件/ページ |
| アイキャッチ | あり |
| エディタ | **無効化**（WYSIWYGなし、ACFフィールドのみ） |
| タクソノミー | `voice_category` |

**リンクの挙動:** 各voiceカードをクリックすると、その投稿が属するカテゴリーのアーカイブページへ遷移する。

---

### 3-3. post（ブログ）

| 項目 | 内容 |
|---|---|
| 投稿タイプ | WordPressデフォルトの `post` |
| 管理画面での表示名 | 「**ブログ**」に改名済み（functions.php） |
| 一覧URL | `/blog/` |
| 詳細URL | `/blog/{slug}/` |
| 閲覧数カウント | あり（カスタムフィールド `post_views_count` に保存） |
| エディタ | ブロックエディタ（デフォルト） |

---

## 4. カスタムタクソノミー（分類）

### 4-1. plans_category（プランカテゴリー）

| スラッグ | 表示名 | アーカイブURL |
|---|---|---|
| `entry-guard` | エントリーガード | `/plans_category/entry-guard/` |
| `safe-security` | セーフセキュリティ | `/plans_category/safe-security/` |
| `protect-plus` | プロテクトプラス | `/plans_category/protect-plus/` |

---

### 4-2. voice_category（お客様の声カテゴリー）

スラッグ・カテゴリー名はWordPress管理画面で管理。アーカイブURL: `/voice_category/{slug}/`

---

## 5. カスタムフィールド（ACF / SCF）

> **ACF** = Advanced Custom Fields（カスタム投稿タイプで使用）
> **SCF** = Smart Custom Fields（固定ページで使用）

---

### 5-1. plansカスタム投稿 ← ACF使用

| フィールド名（ACF） | 種類 | 内容 |
|---|---|---|
| `plans_price` | グループ | 価格情報をまとめたグループ |
| └ `plans_1` | テキスト | 日契約の価格（数値） |
| └ `plans_2` | テキスト | 月契約の価格（数値） |
| `plans_3` | テキストエリア | プランの内容・説明文 |
| `plans_period` | グループ | 適用期間をまとめたグループ |
| └ `plans_4` | 日付 | 開始日（形式: Y/n/j） |
| └ `plans_5` | 日付 | 終了日（形式: Y/n/j） |

**表示箇所:** トップページ・プラン一覧（archive-plans.php）・サイドバー
**ACFグループID:** `acf-group_671d0c79e28ca`（管理画面にサンプル画像表示あり）

---

### 5-2. voiceカスタム投稿 ← ACF使用

| フィールド名（ACF） | 種類 | 内容 |
|---|---|---|
| `voice_age_and_gender` | グループ | 年代・性別をまとめたグループ |
| └ `voice_1` | テキスト | 年代（例: 30代） |
| └ `voice_2` | テキスト | 性別（例: 男性） |
| `voice_3` | テキストエリア | 口コミコメント本文 |

**表示箇所:** トップページ・声一覧（archive-voice.php）・サイドバー
**ACFグループID:** `acf-group_671e7d31a1c41`（管理画面にサンプル画像表示あり）

---

### 5-3. トップページ（固定ページID: 7） ← SCF使用

| フィールド名（SCF） | 種類 | 内容 |
|---|---|---|
| `mainview` | 繰り返しグループ | メインビュースライダーの画像一覧 |
| └ `image_sp` | 画像ID | SP用スライダー画像 |
| └ `image_pc` | 画像ID | PC用スライダー画像 |

---

### 5-4. 料金一覧ページ（固定ページID: 35） ← SCF使用

料金テーブルは最大4つまで登録可能。各テーブルに複数のコース（行）が設定できる繰り返しフィールド構造。

| フィールド名（SCF） | 種類 | 内容 |
|---|---|---|
| `table_title1` 〜 `table_title4` | テキスト | 各料金テーブルの見出しタイトル |
| `table_prices1` 〜 `table_prices4` | 繰り返しグループ | 各テーブルの料金行 |
| └ `course_name1` / `course_name2` / ... | テキスト | コース名（番号はテーブル番号に対応） |
| └ `course_price1` / `course_price2` / ... | テキスト | コース価格（数値） |

**表示箇所:** トップページ（Price セクション）・料金一覧ページ（page-price.php）

---

### 5-5. よくある質問ページ（固定ページID: 31） ← SCF使用

| フィールド名（SCF） | 種類 | 内容 |
|---|---|---|
| `q_and_a` | 繰り返しグループ | Q&Aのリスト |
| └ `question` | テキスト | 質問文 |
| └ `answer` | テキストエリア | 回答文 |

---

### 5-6. 私たちについてページ（page-about-us.php） ← SCF使用

| フィールド名（SCF） | 種類 | 内容 |
|---|---|---|
| `gallery` | 繰り返しグループ | ギャラリー画像一覧 |
| └ `image` | 画像ID | ギャラリーに表示する画像 |

---

## 6. インストール済みプラグイン

| プラグイン名 | 用途 | 使用箇所 |
|---|---|---|
| **Advanced Custom Fields (ACF)** | カスタムフィールド管理 | plans・voice カスタム投稿タイプ |
| **Smart Custom Fields (SCF)** | カスタムフィールド管理 | 固定ページ（トップ・料金・FAQ・About） |
| **Contact Form 7** | お問い合わせフォーム | /contact/ ページ |
| **Breadcrumb NavXT** | パンくずリスト生成 | 全下層ページ（parts/breadcrumbs.php） |
| **WP-PageNavi** | ページネーション | ブログ・プラン・声 一覧ページ |
| **Duplicate Post** | 投稿の複製 | 管理画面（投稿複製用） |
| **SEO Simple Pack** | SEO（メタタグ・OGP） | サイト全体 |

> **Contact Form 7 の注意点:**
> - 自動挿入のp/brタグを無効化済み（`wpcf7_autop_or_not`フィルター）
> - フォーム送信後に `/thanks/` ページへリダイレクト
> - セレクトボックス（`menu-544`）はURLパラメータ `?select_plan=` でデフォルト値を制御（プラン一覧の「このプランを予約」ボタンから連携）

---

## 7. フロントエンド構成（CSS/JS）

### 読み込み順（functions.phpで管理）

| 種別 | ファイル/URL | 役割 |
|---|---|---|
| CSS | Google Fonts（Gotu / Lato / Noto Sans JP） | フォント |
| CSS | Swiper v8 CDN | スライダースタイル |
| CSS | `/assets/css/style.css` | テーマメインCSS |
| JS | jQuery 3.7.1 CDN | jQueryライブラリ |
| JS | `/assets/js/jquery.inview.min.js` | スクロールアニメーション |
| JS | Swiper v8 CDN | スライダーJS |
| JS | `/assets/js/script.js` | テーマメインJS |

### Sass/Gulp構成

| フォルダ | 内容 |
|---|---|
| `src/sass/` | Sassソースファイル |
| `src/sass/global/` | 変数・関数・ブレークポイント定義 |
| `src/sass/module/` | 各コンポーネントのスタイル |
| `_gulp/` | Gulpビルド設定（node_modules含む） |
| `assets/css/style.css` | Gulpでコンパイルされた出力CSS |

### スライダー（Swiper）使用箇所

| 箇所 | クラス名 | 補足 |
|---|---|---|
| トップMV | `js-mv-swiper` | 画像スライダー |
| ご提供プラン | `js-plans-swiper` | プランカードのスライダー |

---

## 8. 管理画面カスタマイズ

| カスタマイズ内容 | 詳細 |
|---|---|
| 「投稿」→「ブログ」に改名 | メニュー・ラベル全て変更済み |
| ブログ一覧に「閲覧数」カラム追加 | `post_views_count` カスタムフィールドで管理・並び替え可能 |
| ブログ一覧に「アイキャッチ」カラム追加 | サムネイル100×100で表示 |
| plans/voice一覧に「アイキャッチ」カラム追加 | サムネイル100×100で表示 |
| ダッシュボードに固定ページリンクを追加 | トップ/ギャラリー/料金一覧/FAQ への編集リンク |
| plans/voiceのWYSIWYGエディタを無効化 | ACFフィールドのみで管理 |
| ブロックエディタの制御 | price/faq/privacy-policy/terms-of-service のみブロックエディタ有効、他の固定ページは無効 |
| ログイン画面のカスタマイズ | ロゴをサイトロゴに変更、背景にMV画像4枚（時計回りアニメーション） |
| ACFフィールドの説明文スタイル | plansの「手順」欄の説明文を赤字表示 |
| SCFフィールドの説明文スタイル | 固定ページの繰り返しフィールド説明文を赤字表示 |
| 管理者ログイン時のURL自動付与 | 管理者ログイン中は `?internal=internal` パラメータを自動付与 |

---

## 9. 固定ページのID一覧

| ページ名 | ID | 用途 |
|---|---|---|
| トップページ | `7` | SCFのmainviewフィールド（MV画像） |
| 料金一覧 | `35` | SCFの料金テーブルフィールド |
| よくある質問 | `31` | SCFのQ&Aフィールド |
| ギャラリー | `38` | ダッシュボードリンクのみ（About内に組み込み？） |

> **注意:** IDはローカル環境と本番環境で異なる場合があります。`get_edit_post_link(ID)` をコード内で使用しているため、ページIDが変わると管理画面のダッシュボードリンクが壊れます。

---

## 10. 運用保守の注意点

### WordPress/プラグイン更新時

| 項目 | 注意点 |
|---|---|
| **ACFの更新** | plansとvoiceのカスタムフィールドに影響。更新後はフィールドが正常に表示されているか確認 |
| **SCFの更新** | トップ・料金・FAQ・Aboutページのフィールドに影響。更新後に各ページを確認 |
| **Contact Form 7の更新** | `wpcf7_form_tag`フィルターのフックが変わる可能性あり。フォームの動作確認必須 |
| **Swiper v8の更新** | CDN読み込みのためバージョン固定（`@8`）。大きなバージョンアップ時はJSの動作確認が必要 |
| **WP-PageNaviの更新** | ページネーションの表示崩れがないか確認 |
| **Breadcrumb NavXTの更新** | パンくずの表示が正常か確認 |

### コンテンツ更新時

| 操作 | 担当フィールド | 注意点 |
|---|---|---|
| MV画像の変更 | SCF `mainview`（トップページID:7） | SP/PC両方の画像を登録すること |
| プランの追加/編集 | カスタム投稿「plans」 + ACFフィールド | カテゴリーを必ず設定すること（ないとリンクが生成されない） |
| 料金表の変更 | SCF 料金テーブル（料金一覧ID:35） | 最大4テーブルまで。トップページにも同じデータが反映される |
| FAQ追加 | SCF `q_and_a`（FAQ ID:31） | ブロックエディタで直接管理 |
| お客様の声の追加 | カスタム投稿「voice」 + ACFフィールド | カテゴリーを必ず設定すること |
| ギャラリー画像の追加 | SCF `gallery`（About内） | Aboutページの編集画面から追加 |

### コード改修時

| 項目 | 注意点 |
|---|---|
| `functions.php` | 1ファイルに全設定を集約。PHPエラーが起きるとサイト全体が落ちる |
| 固定ページID | ID参照箇所: `functions.php`（ダッシュボードリンク）、`front-page.php`（料金表取得） |
| plans/voiceのリライトルール | 詳細ページを意図的に無効化中。`register_post_type`を変更する際は要注意 |
| `?internal=internal` パラメータ | 管理者ログイン中に自動付与される。テスト時に意図しないリダイレクトが起きることがある |
| SCF::get() | 料金テーブルはトップページとpriceページ両方で使用。キーのサフィックス番号（1〜4）に注意 |
