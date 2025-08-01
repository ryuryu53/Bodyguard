<!DOCTYPE html>
<?php if ( is_page('about-us') ) : ?>
  <html class="html1" lang="ja">
<?php else : ?>
  <html lang="ja">
<?php endif; ?>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <!-- ↓ 管理画面でnoindexの設定するためコメントアウト -->
    <!-- <meta name="robots" content="noindex" /> -->
    <?php wp_head(); ?>
  </head>

  <?php
    $home = esc_url( home_url('/') );
    $plans = esc_url( home_url('/plans/') );
    $plans_fun_diving = esc_url( home_url('/plans_category/entry-guard/') );
    $plans_license = esc_url( home_url('/plans_category/safe-security/') );
    $plans_experience_diving = esc_url( home_url('/plans_category/protect-plus/') );
    $about = esc_url( home_url('/about-us/') );
    $information = esc_url( home_url('/information/') );
    $blog = esc_url( home_url('/blog/') );
    $voice = esc_url( home_url('/voice/') );
    $amount = esc_url( home_url('/price/') );
    $faq = esc_url( home_url('/faq/') );
    $contact = esc_url( home_url('/contact/') );
    $sitemap = esc_url( home_url('/sitemap/') );
    $privacy = esc_url( home_url('/privacy-policy/') );
    $terms = esc_url( home_url('/terms-of-service/') );
  ?>

  <body>
    <!-- ヘッダー -->
    <header class="layout-header header js-header">
      <div class="header__inner">
        <?php
        // トップページかどうかを判定し、タグを決定
        $tag = ( is_front_page() ) ? 'h1' : 'div';
        ?>
        <<?php echo $tag; ?> class="header__logo">
          <a href="<?php echo $home; ?>" class="header__logo-link">
            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/hf-logo.svg" alt="Bodyguard">
          </a>
        </<?php echo $tag; ?>>
        <button class="header__drawer hamburger js-hamburger" aria-label="メニューを開く">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <nav class="header__pc-nav pc-nav" aria-label="ヘッダーナビゲーション">
          <ul class="pc-nav__items">
            <li class="pc-nav__item">
              <a href="<?php echo $plans; ?>" class="pc-nav__link">
                <span class="pc-nav__engtext">Plans</span>
                <span class="pc-nav__jatext">ご提供プラン</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="<?php echo $about; ?>" class="pc-nav__link">
                <span class="pc-nav__engtext">About&nbsp;us</span>
                <span class="pc-nav__jatext">私たちについて</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="<?php echo $information; ?>" class="pc-nav__link">
                <span class="pc-nav__engtext">Information</span>
                <span class="pc-nav__jatext">身辺警護についての情報</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="<?php echo $blog; ?>" class="pc-nav__link">
                <span class="pc-nav__engtext">Blog</span>
                <span class="pc-nav__jatext">ブログ</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="<?php echo $voice; ?>" class="pc-nav__link">
                <span class="pc-nav__engtext">Voice</span>
                <span class="pc-nav__jatext">お客様の声</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="<?php echo $amount; ?>" class="pc-nav__link">
                <span class="pc-nav__engtext">Price</span>
                <span class="pc-nav__jatext">料金一覧</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="<?php echo $faq; ?>" class="pc-nav__link">
                <span class="pc-nav__engtext">FAQ</span>
                <span class="pc-nav__jatext">よくある質問</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="<?php echo $contact; ?>" class="pc-nav__link">
                <span class="pc-nav__engtext">Contact</span>
                <span class="pc-nav__jatext">お問い合わせ</span>
              </a>
            </li>
          </ul>
        </nav>
        <nav class="header__sp-nav sp-nav js-sp-nav" aria-label="モバイル版ヘッダーナビゲーション">
          <div class="sp-nav__inner">
            <ul class="sp-nav__items">
              <li class="sp-nav__item">
                <a href="<?php echo $plans; ?>" class="sp-nav__link">ご提供プラン</a>
              </li>
              <li class="sp-nav__item">
                <a href="<?php echo $about; ?>" class="sp-nav__link">私たちについて</a>
              </li>
              <li class="sp-nav__item">
                <a href="<?php echo $information; ?>" class="sp-nav__link">身辺警護についての情報</a>
              </li>
              <li class="sp-nav__item">
                <a href="<?php echo $blog; ?>" class="sp-nav__link">ブログ</a>
              </li>
              <li class="sp-nav__item">
                <a href="<?php echo $voice; ?>" class="sp-nav__link">お客様の声</a>
              </li>
              <li class="sp-nav__item">
                <a href="<?php echo $amount; ?>" class="sp-nav__link">料金一覧</a>
              </li>
              <li class="sp-nav__item">
                <a href="<?php echo $faq; ?>" class="sp-nav__link">よくある質問</a>
              </li>
              <li class="sp-nav__item">
                <a href="<?php echo $privacy; ?>" class="sp-nav__link">プライバシーポリシー</a>
              </li>
              <li class="sp-nav__item">
                <a href="<?php echo $terms; ?>" class="sp-nav__link">利用規約</a>
              </li>
              <li class="sp-nav__item">
                <a href="<?php echo $contact; ?>" class="sp-nav__link">お問い合わせ</a>
              </li>
              <li class="sp-nav__item">
                <a href="<?php echo $sitemap; ?>" class="sp-nav__link">サイトマップ</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <main>