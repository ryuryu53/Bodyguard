<?php get_header(); ?>

  <?php
  $home = esc_url( home_url( '/' ) );
  $plans = esc_url( home_url( '/plans/' ) );
  $plans_entry_guard = esc_url( home_url( '/plans_category/entry-guard/' ) );
  $plans_safe_security = esc_url( home_url( '/plans_category/safe-security/' ) );
  $plans_protect_plus = esc_url( home_url( '/plans_category/protect-plus/' ) );
  $about = esc_url( home_url( '/about-us/' ) );
  $information = esc_url( home_url( '/information/' ) );
  $blog = esc_url( home_url( '/blog/' ) );
  $voice = esc_url( home_url( '/voice/' ) );
  $amount = esc_url( home_url( '/price/' ) );
  $faq = esc_url( home_url( '/faq/' ) );
  $contact = esc_url( home_url( '/contact/' ) );
  $sitemap = esc_url( home_url( '/sitemap/' ) );
  $privacy = esc_url( home_url( '/privacy-policy/' ) );
  $terms = esc_url( home_url( '/terms-of-service/' ) );
  ?>

  <!-- 下層ページのメインビュー -->
  <section class="layout-sub-mv sub-mv sub-mv--site-map js-mv-height">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">Site&nbsp;<span>map</span></h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part( 'parts/breadcrumbs' ); ?>

  <!-- サイトマップ -->
  <div class="layout-page-site-map page-site-map">
    <div class="page-site-map__inner inner">
      <nav class="page-site-map__nav footer-nav">
        <div class="footer-nav__left-content footer-nav__left-content--width">
          <ul class="footer-nav__left-items">
            <li class="footer-nav__left-item footer-nav__left-item--green">
              <a href="<?php echo $plans; ?>" class="footer-nav__left-link footer-nav__left-link--icon-green">ご提供プラン</a>
              <ul class="footer-nav__left-detail-items">
                <li class="footer-nav__left-detail-item">
                  <a href="<?php echo $plans_entry_guard; ?>" class="footer-nav__left-detail-link">エントリーガード</a>
                </li>
                <li class="footer-nav__left-detail-item">
                  <a href="<?php echo $plans_safe_security; ?>" class="footer-nav__left-detail-link">セーフセキュリティ</a>
                </li>
                <li class="footer-nav__left-detail-item">
                  <a href="<?php echo $plans_protect_plus; ?>" class="footer-nav__left-detail-link">プロテクトプラス</a>
                </li>
              </ul>
            </li>
            <li class="footer-nav__left-item footer-nav__left-item--green">
              <a href="<?php echo $about; ?>" class="footer-nav__left-link footer-nav__left-link--icon-green">私たちについて</a>
            </li>
          </ul>
          <ul class="footer-nav__left-items">
            <li class="footer-nav__left-item footer-nav__left-item--green">
              <a href="<?php echo $information; ?>" class="footer-nav__left-link footer-nav__left-link--icon-green">身辺警護についての<br class="u-mobile">情報</a>
              <ul class="footer-nav__left-detail-items">
                <li class="footer-nav__left-detail-item">
                  <a href="<?php echo $information; ?>?tab=tab1" class="footer-nav__left-detail-link">身体を守る防護壁</a>
                </li>
                <li class="footer-nav__left-detail-item">
                  <a href="<?php echo $information; ?>?tab=tab2" class="footer-nav__left-detail-link">安心感のサポート</a>
                </li>
                <li class="footer-nav__left-detail-item">
                  <a href="<?php echo $information; ?>?tab=tab3" class="footer-nav__left-detail-link">危険察知と回避</a>
                </li>
              </ul>
            </li>
            <li class="footer-nav__left-item footer-nav__left-item--green">
              <a href="<?php echo $blog; ?>" class="footer-nav__left-link footer-nav__left-link--icon-green">ブログ</a>
            </li>
          </ul>
        </div>
        <div class="footer-nav__right-content footer-nav__right-content--width">
          <ul class="footer-nav__right-items footer-nav__right-items--width">
            <li class="footer-nav__right-item footer-nav__right-item--green">
              <a href="<?php echo $voice; ?>" class="footer-nav__right-link footer-nav__right-link--icon-green">お客様の声</a>
            </li>
            <li class="footer-nav__right-item footer-nav__right-item--green">
              <a href="<?php echo $amount; ?>" class="footer-nav__right-link footer-nav__right-link--icon-green">料金一覧</a>
              <ul class="footer-nav__right-detail-items">
                <li class="footer-nav__right-detail-item">
                  <a href="<?php echo $amount; ?>#title1" class="footer-nav__right-detail-link">エントリーガード</a>
                </li>
                <li class="footer-nav__right-detail-item">
                  <a href="<?php echo $amount; ?>#title2" class="footer-nav__right-detail-link">セーフセキュリティ</a>
                </li>
                <li class="footer-nav__right-detail-item">
                  <a href="<?php echo $amount; ?>#title3" class="footer-nav__right-detail-link">プロテクトプラス</a>
                </li>
              </ul>
            </li>
          </ul>
          <ul class="footer-nav__right-items footer-nav__right-items--width">
            <li class="footer-nav__right-item footer-nav__right-item--green">
              <a href="<?php echo $faq; ?>" class="footer-nav__right-link footer-nav__right-link--icon-green">よくある質問</a>
            </li>
            <li class="footer-nav__right-item footer-nav__right-item--green">
              <a href="<?php echo $privacy; ?>" class="footer-nav__right-link footer-nav__right-link--icon-green">プライバシー<br class="u-mobile">ポリシー</a>
            </li>
            <li class="footer-nav__right-item footer-nav__right-item--green">
              <a href="<?php echo $terms; ?>" class="footer-nav__right-link footer-nav__right-link--icon-green">利用規約</a>
            </li>
            <li class="footer-nav__right-item footer-nav__right-item--green">
              <a href="<?php echo $contact; ?>" class="footer-nav__right-link footer-nav__right-link--icon-green">お問い合わせ</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>

<?php get_footer(); ?>
