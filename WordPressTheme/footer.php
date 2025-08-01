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

      <!-- Contact -->
      <?php if ( !is_page(array('contact', 'thanks')) && !is_404() ) : ?>
        <section class="layout-contact<?php
          if ( !is_front_page() && !is_page(array('sitemap', 'privacy-policy', 'terms-of-service')) ) {
            echo ' layout-contact--sub-page';
          } elseif ( is_page('sitemap')) {
            echo ' layout-contact--site-map-page';
          } elseif ( is_page('privacy-policy')) {
            echo ' layout-contact--privacy-page';
          } elseif ( is_page('terms-of-service')) {
            echo ' layout-contact--terms-page';
          } ?> contact">
          <div class="contact__inner inner">
            <div class="contact__wrapper">
              <div class="contact__info">
                <div class="contact__logo">
                  <a href="<?php echo $home; ?>" class="contact__logo-link"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/contact-logo.svg" loading="lazy" alt="Bodyguard">
                  </a>
                </div>
                <div class="contact__access">
                  <div class="contact__access-details access-details">
                    <ul class="access-details__items text">
                      <li class="access-details__item">静岡県静岡市1-2</li>
                      <li class="access-details__item">TEL:0120-111-2222</li>
                      <li class="access-details__item">営業時間:8:00-20:00</li>
                      <li class="access-details__item">定休日:隔週月曜日</li>
                    </ul>
                  </div>
                  <div class="contact__access-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1634.336472844601!2d138.39825558658367!3d34.98985601764226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601a35f7f7a116cb%3A0xaae88637161587ae!2z44CSNDIwLTA4MDMg6Z2Z5bKh55yM6Z2Z5bKh5biC6JG15Yy65Y2D5Luj55Sw77yR5LiB55uu77yS!5e0!3m2!1sja!2sjp!4v1730137137161!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
                </div>
              </div>
              <div class="contact__inquiry">
                <hgroup class="contact__title section-header">
                  <p class="section-header__engtitle section-header__engtitle--large">Contact</p>
                  <h2 class="section-header__jatitle">お問い合わせ</h2>
                </hgroup>
                <p class="contact__text">お気軽にご相談ください</p>
                <div class="contact__btn">
                  <a href="<?php echo $contact; ?>" class="button" role="button"><span class="button__text">Contact&nbsp;us</span></a>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php endif; ?>

      <!-- ページトップへ戻るボタン -->
      <?php if ( !is_404() ) : ?>
        <div class="to-top js-to-top">
          <a href="#top" class="to-top__link" aria-label="ページトップへ戻る"></a>
        </div>
      <?php endif; ?>
    </main>

    <!-- フッター -->
    <footer class="layout-footer<?php
      if ( is_404() ) {
        echo ' layout-footer--404-page';
      } elseif ( is_page('contact') ) {
        echo ' layout-footer--contact-page';
      } elseif ( is_page('thanks') ) {
        echo ' layout-footer--thanks-page';
      } ?> footer js-footer">
      <div class="footer__inner inner">
        <div class="footer__img">
          <div class="footer__logo">
            <a href="<?php echo $home; ?>" class="footer__logo-link">
              <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/hf-logo.svg" loading="lazy" alt="Bodyguard">
            </a>
          </div>
          <div class="footer__sns">
            <a href="https://www.facebook.com/" class="footer__sns-link" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/facebook-logo.svg" loading="lazy" alt="Facebook">
            </a>
            <a href="https://www.instagram.com/" class="footer__sns-link" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/instagram-logo.svg" loading="lazy" alt="Instagram">
            </a>
          </div>
        </div>
        <nav class="footer__nav footer-nav" aria-label="フッターナビゲーション">
          <div class="footer-nav__left-content">
            <ul class="footer-nav__left-items">
              <li class="footer-nav__left-item">
                <a href="<?php echo $plans; ?>" class="footer-nav__left-link">ご提供プラン</a>
                <ul class="footer-nav__left-detail-items">
                  <li class="footer-nav__left-detail-item">
                    <a href="<?php echo $plans_fun_diving; ?>" class="footer-nav__left-detail-link">エントリーガード</a>
                  </li>
                  <li class="footer-nav__left-detail-item">
                    <a href="<?php echo $plans_license; ?>" class="footer-nav__left-detail-link">セーフセキュリティ</a>
                  </li>
                  <li class="footer-nav__left-detail-item">
                    <a href="<?php echo $plans_experience_diving; ?>" class="footer-nav__left-detail-link">プロテクトプラス</a>
                  </li>
                </ul>
              </li>
              <li class="footer-nav__left-item">
                <a href="<?php echo $about; ?>" class="footer-nav__left-link">私たちについて</a>
              </li>
            </ul>
            <ul class="footer-nav__left-items">
              <li class="footer-nav__left-item">
                <a href="<?php echo $information; ?>" class="footer-nav__left-link">身辺警護についての<br class="u-mobile">情報</a>
                <ul class="footer-nav__left-detail-items">
                  <li class="footer-nav__left-detail-item">
                    <a href="<?php echo $information; ?>#tab1" class="footer-nav__left-detail-link">身体を守る防護壁</a>
                  </li>
                  <li class="footer-nav__left-detail-item">
                    <a href="<?php echo $information; ?>#tab2" class="footer-nav__left-detail-link">安心感のサポート</a>
                  </li>
                  <li class="footer-nav__left-detail-item">
                    <a href="<?php echo $information; ?>#tab3" class="footer-nav__left-detail-link">危険察知と回避</a>
                  </li>
                </ul>
              </li>
              <li class="footer-nav__left-item">
                <a href="<?php echo $blog; ?>" class="footer-nav__left-link">ブログ</a>
              </li>
            </ul>
          </div>
          <div class="footer-nav__right-content">
            <ul class="footer-nav__right-items">
              <li class="footer-nav__right-item">
                <a href="<?php echo $voice; ?>" class="footer-nav__right-link">お客様の声</a>
              </li>
              <li class="footer-nav__right-item">
                <a href="<?php echo $amount; ?>" class="footer-nav__right-link">料金一覧</a>
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
            <ul class="footer-nav__right-items">
              <li class="footer-nav__right-item">
                <a href="<?php echo $faq; ?>" class="footer-nav__right-link">よくある質問</a>
              </li>
              <li class="footer-nav__right-item">
                <a href="<?php echo $privacy; ?>" class="footer-nav__right-link">プライバシー<br class="u-mobile">ポリシー</a>
              </li>
              <li class="footer-nav__right-item">
                <a href="<?php echo $terms; ?>" class="footer-nav__right-link">利用規約</a>
              </li>
              <li class="footer-nav__right-item">
                <a href="<?php echo $contact; ?>" class="footer-nav__right-link">お問い合わせ</a>
              </li>
              <li class="footer-nav__right-item">
                <a href="<?php echo $sitemap; ?>" class="footer-nav__right-link">サイトマップ</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="footer__copyright">
          <small>&copy;&nbsp;2021&nbsp;-&nbsp;2024&nbsp;Bodyguard&nbsp;LLC.</small>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>

</html>
