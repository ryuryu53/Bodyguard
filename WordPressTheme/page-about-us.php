<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="layout-sub-mv sub-mv sub-mv--about-us js-mv-height">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">About&nbsp;us</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumbs'); ?>

  <!-- 私たちについて -->
  <section class="layout-page-about page-about">
    <div class="page-about__inner inner">
      <div class="page-about__img-box">
        <picture class="page-about__img-left colorbox-about js-colorbox">
          <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/about_1.webp" type="image/webp">
          <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/about_1.jpg" loading="lazy" alt="">
        </picture>
        <picture class="page-about__img-right colorbox js-colorbox">
          <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/about_2.webp" type="image/webp">
          <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/about_2.jpg" loading="lazy" alt="">
        </picture>
      </div>
      <div class="page-about__text-body">
        <h3 class="page-about__subtitle"><span>Your&nbsp;Safety,<br>Our&nbsp;Priority</span></h3>
        <div class="page-about__text-block">
          <p class="page-about__text text--white-pc">
          「株式会社Bodyguard」は、身辺警護に特化した警備会社です。私たちの使命は、お客様の安全を第一に考え、どんな状況でも確実に守ることです。<br>経験豊富なスタッフが、あらゆるリスクに備え、安心して日常を過ごせる環境を提供します。
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ギャラリー -->
  <?php
    // SCFから「gallery」グループ内の繰り返しフィールドを取得（現在の投稿IDに紐付いたデータ）
    // 「gallery」というグループ名で繰り返しフィールドのデータを取得
    $gallery_images = SCF::get('gallery', get_the_ID());

    // 画像が1枚以上あるかどうかを確認するためのフラグ
    $has_image = false;

    // 繰り返しフィールドが空でないかをチェック
    if ( !empty($gallery_images) ) {
      // 各ギャラリー画像のフィールドを確認し、画像があるかをチェック
      foreach ( $gallery_images as $image ) {
        if ( !empty($image['image']) ) {
          $has_image = true;
          break; // 1つでも画像があればループを終了
        }
      }
    }

    // 画像がある場合のみセクションを表示
    if ( $has_image ) :
  ?>
    <section class="layout-gallery gallery">
      <div class="gallery__inner inner">
        <hgroup class="gallery__title section-header">
          <p class="section-header__engtitle"> Gallery</p>
          <h2 class="section-header__jatitle">活躍するボディーガードたち</h2>
        </hgroup>
        <div class="gallery__items-wrap">
          <div class="gallery__items gallery-photo">
          <?php
            // 画像が登録されている場合にループで表示
            foreach ( $gallery_images as $image ) :

              // 画像URLとalt属性を取得
              // wp_get_attachment_image_src()：画像に関する情報を配列で返す
              // false (デフォルト)は「アイコンを使わない」という意味、[0]：url（画像のurl）
              // $image_url_webp = wp_get_attachment_image_src($image['image_webp'], 'full', false)[0];
              $image_url = wp_get_attachment_image_src($image['image'], 'full')[0];
              // get_post_meta()：特定の投稿（ポスト）やメディアに付属する追加情報（メタデータ）を取得する関数
              // $image['image']は画像のIDを返す  _wp_attachment_image_alt：画像のaltテキストを表す特別なキー(メタデータキー)
              // true：一つの値だけが返される（falseだと複数の値が配列として返される）
              $image_alt = get_post_meta($image['image'], '_wp_attachment_image_alt', true); // 画像のalt属性
            ?>
            <div class="gallery-photo__item">
              <picture class="gallery-photo__img js-modal-open">
                <!-- WebP画像 -->
                <!-- <source srcset="<?php echo esc_url($image_url_webp); ?>" type="image/webp"> -->
                <!-- 通常のJPG画像 → webpまたはjpgと分けなくてよい、1種類でOK -->
                <img src="<?php echo esc_url($image_url); ?>" loading="lazy" alt="<?php echo esc_attr($image_alt); ?>">
              </picture>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <!-- モーダル -->
      <div class="gallery__modal modal js-modal">
        <div class="modal__img">
          <img src="" loading="lazy" alt="モーダル画像">
        </div>
      </div>
    </section>
  <?php endif; ?>

<?php get_footer(); ?>
