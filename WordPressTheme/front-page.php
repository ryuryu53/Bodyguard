<?php get_header(); ?>

  <?php
    $home = esc_url( home_url('/') );
    $plans = esc_url( home_url('/plans/') );
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

  <!-- ローディングアニメーション -->
  <div class="loading">
    <!-- 最初の白い画面 -->
    <div class="loading__white js-loading-white">
      <div class="loading__header js-loading-title">
        <div class="loading__title">stay&nbsp;safe</div>
        <div class="loading__subtitle">with&nbsp;professional&nbsp;security</div>
      </div>
    </div>
    <!-- 2つに分かれた画像 -->
    <div class="loading__images js-loading-images">
      <div class="loading__img-left js-loading-img-left"></div>
      <div class="loading__img-right js-loading-img-right"></div>
    </div>
  </div>

  <!-- メインビュー -->
  <section class="layout-mv mv js-mv-height">
    <div class="mv__inner">
      <div class="swiper mv__slider js-mv-swiper">
        <div class="swiper-wrapper">
          <?php
            // 「mainview」というグループ名で繰り返しフィールドのデータを取得
            $mv_images = SCF::get('mainview', get_the_ID());
            // 画像が登録されている場合にループで表示
          if ( $mv_images ) :
            foreach ( $mv_images as $image ) :
              // 画像URLとalt属性を取得
              // wp_get_attachment_image_src()：画像に関する情報を配列で返す
              // false (デフォルト)は「アイコンを使わない」という意味、[0]：url（画像のurl）
              $image_url_sp = wp_get_attachment_image_src($image['image_sp'], 'full')[0];
              $image_url_pc = wp_get_attachment_image_src($image['image_pc'], 'full')[0];
              // get_post_meta()：特定の投稿（ポスト）やメディアに付属する追加情報（メタデータ）を取得する関数
              // $image['image_pc']は画像のIDを返す  _wp_attachment_image_alt：画像のaltテキストを表す特別なキー(メタデータキー)
              // true：一つの値だけが返される（falseだと複数の値が配列として返される）
              $image_alt = get_post_meta($image['image_pc'], '_wp_attachment_image_alt', true);
          ?>
            <div class="swiper-slide">
              <picture class="mv__img">
                <?php if ( !empty($image['image_sp']) && !empty($image['image_pc']) ) : ?>
                  <!-- spの画像 -->
                  <source media="(max-width: 767px)" srcset="<?php echo esc_url($image_url_sp); ?>" width="375" height="667">
                  <!-- pcの画像 -->
                  <img src="<?php echo esc_url($image_url_pc); ?>" alt="<?php echo esc_attr($image_alt); ?>" width="1440" height="768">
                <?php endif; ?>
              </picture>
            </div>
          <?php
            endforeach;
          endif;
          ?>
        </div>
      </div>
      <div class="mv__header js-mv-header">
        <h2 class="mv__title">stay&nbsp;safe</h2>
        <p class="mv__subtitle">with&nbsp;professional&nbsp;security</p>
      </div>
    </div>
  </section>

  <!-- Plans -->
  <section class="layout-plans plans">
    <div class="plans__inner inner">
      <hgroup class="plans__title section-header">
        <p class="section-header__engtitle">Plans</p>
        <h2 class="section-header__jatitle">ご提供プラン</h2>
      </hgroup>
      <div class="plans__swiper">
        <div class="swiper js-plans-swiper">
          <ul class="swiper-wrapper plans__items plans-cards">
            <?php
              // 最新のカスタム投稿（plans）の8件を取得するクエリ
              $latest_plans_args = array(  // $latest_plans_args：WP_Queryに渡すための条件を設定
                'post_type' => 'plans', // カスタム投稿タイプ「plans」の指定
                'posts_per_page' => 8, // 最新の8件を表示
                'orderby' => 'date', // 日付順にソート
                'order' => 'DESC', // 新しいものを先頭に･･･降順（DESC）
                'post_status' => 'publish' // 公開済みの投稿のみ取得
              );
              // WP_Query：WordPressのクエリ機能を使って、指定した条件でデータベースからキャンペーン投稿を取得
              $latest_plans_query = new WP_Query($latest_plans_args);

              // サブループ開始   while文：投稿がある限り、このループで8件のキャンペーン情報を1件ずつ表示
              if ( $latest_plans_query->have_posts() ) : while ( $latest_plans_query->have_posts() ) : $latest_plans_query->the_post();
            ?>
              <li class="swiper-slide plans-cards__item plans-card">
                <?php
                  $terms = get_the_terms(get_the_ID(), 'plans_category'); // 現在の投稿に紐付いた'term'を取得
                  if ( $terms && !is_wp_error($terms) ) : // タームが存在し、エラーがない場合のみ処理を実行
                    foreach ($terms as $term) : // 各タームについて繰り返し処理
                      $term_link = get_term_link($term); // タームのリンクを取得
                ?>
                  <a href="<?php echo esc_url($term_link); ?>" class="plans-card__link">  <!-- 詳細投稿ページはなし → その投稿が属するカテゴリーのタブへ飛ぶ -->
                <?php endforeach; endif; ?>
                  <picture class="plans-card__img">
                    <?php if ( get_the_post_thumbnail() ) : ?>
                      <source srcset="<?php the_post_thumbnail_url('full'); ?>" type="image/webp">
                      <img src="<?php the_post_thumbnail_url('full'); ?>" loading="lazy" alt="">
                    <?php else : ?>
                      <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/noimage.png" loading="lazy" alt="noimage">
                    <?php endif; ?>
                  </picture>
                  <div class="plans-card__body">
                    <?php
                      // カスタムタクソノミー「plans_category」の取得
                      $terms = get_the_terms(get_the_ID(), 'plans_category');
                      if ( $terms && !is_wp_error($terms) ) :
                    ?>
                      <p class="plans-card__category"><?php echo esc_html($terms[0]->name); ?></p>
                    <?php endif; ?>
                    <h3 class="plans-card__title text--medium"><?php the_title(); ?></h3>
                    <p class="plans-card__text text--small-sp">お一人様</p>
                    <!-- ご提供プランの価格 -->
                    <div class="plans-card__price">
                      <?php
                        $plans_price = get_field('plans_price');  // グループフィールドからデータを取得
                        $price_before = $plans_price['plans_1'];  // サブフィールドから日契約の価格を取得
                        $price_after = $plans_price['plans_2']; // サブフィールドから月契約の価格を取得
                      ?>
                      <?php if ( $price_before ) : ?>
                        <span class="plans-card__price-before">&yen;<?php echo esc_html(number_format(intval($price_before))); ?>/日</span>
                      <?php endif; ?>
                      <?php if ( $price_after ) : ?>
                        <span class="plans-card__price-after">&yen;<?php echo esc_html(number_format(intval($price_after))); ?>/月</span>
                      <?php endif; ?>
                    </div>
                  </div>
                </a>
              </li>
            <?php endwhile; endif; wp_reset_postdata(); ?>
          </ul>
        </div>
      </div>
      <div class="plans__swiper-btn">
        <div class="swiper-button-next plans__btn-next u-desktop"></div>
        <div class="swiper-button-prev plans__btn-prev u-desktop"></div>
      </div>
      <div class="plans__btn">
        <a href="<?php echo $plans; ?>" class="button" role="button"><span class="button__text">View&nbsp;more</span></a>
      </div>
    </div>
  </section>

  <!-- About -->
  <section class="layout-about about">
    <div class="about__inner inner">
      <hgroup class="about__title section-header">
        <p class="section-header__engtitle">About&nbsp;us</p>
        <h2 class="section-header__jatitle">私たちについて</h2>
      </hgroup>
      <div class="about__img-box">
        <picture class="about__img-left colorbox-about js-colorbox">
          <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/about_1.webp" type="image/webp">
          <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/about_1.jpg" loading="lazy" alt="">
        </picture>
        <picture class="about__img-right colorbox js-colorbox">
          <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/about_2.webp" type="image/webp">
          <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/about_2.jpg" loading="lazy" alt="">
        </picture>
      </div>
      <div class="about__text-body">
        <h3 class="about__subtitle"><span>Your&nbsp;Safety,<br>Our&nbsp;Priority</span></h3>
        <div class="about__text-block">
          <p class="about__text text--white-pc">
          「株式会社Bodyguard」は、身辺警護に特化した警備会社です。私たちの使命は、お客様の安全を第一に考え、どんな状況でも確実に守ることです。<br>経験豊富なスタッフが、あらゆるリスクに備え、安心して日常を過ごせる環境を提供いたします。
          </p>
        </div>
      </div>
      <div class="about__btn">
        <a href="<?php echo $about; ?>" class="button" role="button"><span class="button__text">View&nbsp;more</span></a>
      </div>
    </div>
  </section>

  <!-- Information -->
  <section class="layout-information information">
    <div class="information__inner inner">
      <hgroup class="information__title section-header">
        <p class="section-header__engtitle">Information</p>
        <h2 class="section-header__jatitle">身辺警護についての情報</h2>
      </hgroup>
      <div class="information__content">
        <div class="colorbox js-colorbox">
          <picture class="information__img">
            <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/information.webp" type="image/webp">
            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/information.jpg" loading="lazy" alt="">
          </picture>
        </div>
        <div class="information__text-body">
          <h3 class="information__subtitle">身体を守る防護壁<br class="u-mobile">&nbsp;-&nbsp;株式会社Bodyguard</h3>
          <p class="information__text text--black-pc">株式会社Bodyguardは、実際の危険からあなたの体を守るプロフェッショナルです。万が一、誰かが襲ってきたり、危険な場所へ行かねばならないときも、訓練を受けた警護員が物理的にあなたを守ります。迫り来る危険に素早く対応し、安全な場所へ誘導しながら、安心して過ごせる環境を提供いたします。</p>
          <div class="information__btn">
            <a href="<?php echo $information; ?>" class="button" role="button"><span class="button__text">View&nbsp;more</span></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Blog -->
  <section class="layout-blog blog">
    <div class="blog__inner inner">
      <hgroup class="blog__title section-header">
        <p class="section-header__engtitle section-header__engtitle--white-pc">Blog</p>
        <h2 class="section-header__jatitle section-header__jatitle--white-pc">ブログ</h2>
      </hgroup>
      <div class="blog__items blog-cards js-blog-cards">
        <?php
          $posts_args = array(
          'post_type' => 'post',
          'posts_per_page' => 3
          );
          $posts_query = new WP_Query($posts_args);
          if ( $posts_query->have_posts() ) : while ( $posts_query->have_posts() ) : $posts_query->the_post();
        ?>
          <article class="blog-cards__item blog-card blog-card--js js-fadeInUp">
            <a href="<?php the_permalink(); ?>" class="blog-card__link">
              <picture class="blog-card__img">
                <?php if ( get_the_post_thumbnail() ) : ?>
                  <source srcset="<?php the_post_thumbnail_url('full'); ?>" type="image/webp">
                  <img src="<?php the_post_thumbnail_url('full'); ?>" loading="lazy" alt="">
                <?php else : ?>
                  <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/noimage.png" loading="lazy" alt="noimage">
                <?php endif; ?>
              </picture>
              <div class="blog-card__body">
                <time datetime="<?php the_time('c'); ?>" class="blog-card__date"><?php the_time('Y.m.d'); ?></time>
                <h3 class="blog-card__title text--medium"><?php the_title(); ?></h3>
                <p class="blog-card__text text--black-pc">
                  <?php
                    // 投稿本文を取得
                    $content = $post->post_content;

                    // 文字数を制限
                    if (mb_strlen($content, 'UTF-8') > 110) {
                      // 110文字で切り取る
                      $content = mb_substr($content, 0, 110, 'UTF-8') . '...';
                    }

                    // コメントや不要なタグを削除
                      $content = strip_tags($content);

                    // 整形したコンテンツを出力
                    echo $content;
                  ?>
                </p>
              </div>
            </a>
          </article>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
      <div class="blog__btn">
        <a href="<?php echo $blog; ?>" class="button" role="button"><span class="button__text">View&nbsp;more</span></a>
      </div>
    </div>
  </section>

  <!-- Voice -->
  <section class="layout-voice voice">
    <div class="voice__inner inner">
      <hgroup class="voice__title section-header">
        <p class="section-header__engtitle">Voice</p>
        <h2 class="section-header__jatitle">お客様の声</h2>
      </hgroup>
      <div class="voice__items voice-cards js-voice-cards">
        <?php
          // 最新のカスタム投稿（voice）の2件を取得するクエリ
          $latest_voice_args = array( // $latest_voice_args：WP_Queryに渡すための条件を設定
            'post_type' => 'voice', // カスタム投稿タイプ「voice」の指定
            'posts_per_page' => 2, // 最新の2件だけ表示
            'orderby' => 'date', // 日付順にソート
            'order' => 'DESC' // 新しいものを先頭に
          );
          // WP_Query：WordPressのクエリ機能を使って、指定した条件でデータベースから「口コミ」の投稿を取得
          $latest_voice_query = new WP_Query($latest_voice_args);

          // サブループ開始   while文：投稿がある限り、このループで1件ずつ口コミの情報を表示。今回は最新の2件なので2回だけ実行される
          if ( $latest_voice_query->have_posts() ) : while ( $latest_voice_query->have_posts() ) : $latest_voice_query->the_post();
        ?>
          <article class="voice-cards__item voice-card voice-card--js js-fadeInUp-v">
            <?php
              $terms = get_the_terms(get_the_ID(), 'voice_category'); // 現在の投稿に紐付いた'term'を取得
              if ( $terms && !is_wp_error($terms) ) : // タームが存在し、エラーがない場合のみ処理を実行
                foreach ($terms as $term) : // 各タームについて繰り返し処理
                  $term_link = get_term_link($term); // タームのリンクを取得
            ?>
              <a href="<?php echo esc_url($term_link); ?>" class="voice-card__link">  <!-- 詳細投稿ページはなし → その投稿が属するカテゴリーのタブへ飛ぶ -->
            <?php endforeach; endif; ?>
              <div class="voice-card__head">
                <div class="voice-card__meta">
                  <div class="voice-card__label">
                    <!-- 年代（性別） -->
                    <span class="voice-card__age">
                      <?php
                        $voice_age_and_gender = get_field('voice_age_and_gender');  // グループフィールドからデータを取得
                        $voice_age = $voice_age_and_gender['voice_1'];  // サブフィールドから年代を取得
                        $voice_gender = $voice_age_and_gender['voice_2']; // サブフィールドから性別を取得
                      ?>
                      <?php if ( $voice_age ) : ?>
                        <?php echo esc_html($voice_age); ?>
                      <?php endif; ?>
                      <?php if ( $voice_gender ) : ?>
                        (<?php echo esc_html($voice_gender); ?>)
                      <?php endif; ?>
                    </span>
                    <?php
                      // カスタムタクソノミー「voice_category」の取得
                      $terms = get_the_terms(get_the_ID(), 'voice_category');
                      if ( $terms && !is_wp_error($terms) ) :
                    ?>
                      <p class="voice-card__category"><?php echo esc_html($terms[0]->name); ?></p>
                    <?php endif; ?>
                  </div>
                  <h3 class="voice-card__title"><?php the_title(); ?></h3>
                </div>
                <div class="voice-card__img colorbox js-colorbox">
                  <picture>
                    <?php if ( get_the_post_thumbnail() ) : ?>
                      <source srcset="<?php the_post_thumbnail_url('full'); ?>" type="image/webp">
                      <img src="<?php the_post_thumbnail_url('full'); ?>" loading="lazy" alt="">
                    <?php else : ?>
                      <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/noimage.png" loading="lazy" alt="noimage">
                    <?php endif; ?>
                  </picture>
                </div>
              </div>
              <?php if ( get_field('voice_3') ) : ?>
                <p class="voice-card__text text--black-sp"><?php the_field('voice_3'); ?></p>
              <?php endif; ?>
            </a>
          </article>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
      <div class="voice__btn">
        <a href="<?php echo $voice; ?>" class="button" role="button"><span class="button__text">View&nbsp;more</span></a>
      </div>
    </div>
  </section>

  <!-- Price -->
  <section class="layout-price price">
    <div class="price__inner inner">
      <hgroup class="price__title section-header">
        <p class="section-header__engtitle">Price</p>
        <h2 class="section-header__jatitle">料金一覧</h2>
      </hgroup>
      <div class="price__contents">
        <div class="price__img colorbox js-colorbox">
          <picture>
            <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/price-pc.webp" type="image/webp">
            <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/price-sp.webp" type="image/webp">
            <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/price-sp.jpg">
            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/price-pc.jpg" loading="lazy" alt="">
          </picture>
        </div>
        <div class="price__table price-table">
          <?php
            // 料金表のフィールド名をリスト化
            $price_tables = [
              'table_prices1',
              'table_prices2',
              'table_prices3',
              'table_prices4'
            ];

            // コースデータの有効性をチェックする関数
            function is_valid_course($price, $key_suffix) {
              return !empty($price["course_name{$key_suffix}"]) && !empty($price["course_price{$key_suffix}"]);
          }

            // 各料金表について処理
            foreach ( $price_tables as $price_table_key ) :
              // PriceページのID
              $page_price_id = 35;
              // テーブルタイトルと料金表情報を取得
              $key_suffix = substr($price_table_key, -1); // キーの末尾番号を取得
              $table_title = SCF::get("table_title{$key_suffix}", $page_price_id);  // ここではSCF::getメソッドに$page_price_id引数が必要
              $table_prices = SCF::get($price_table_key, $page_price_id);

              // テーブルタイトルと料金表情報が存在するか確認
              if ( !empty($table_title) && !empty($table_prices) && is_array($table_prices) ) :
                // 各項目が空でないことを確認
                $has_valid_price = false;
                foreach ( $table_prices as $price ) {
                  if ( is_valid_course($price, $key_suffix) ) {
                    $has_valid_price = true;
                    break;
                  }
                }
              // 有効な料金情報が存在する場合のみ表示
              if ( $has_valid_price ) :
          ?>
              <div class="price-table__content">
                <h3 class="price-table__title text--bold"><?php echo esc_html($table_title); ?></h3>
                <dl class="price-table__items text--small-sp">
                  <?php foreach ( $table_prices as $price ) : ?>
                    <?php
                      // コース名と価格が空でないことを確認
                      if ( is_valid_course($price, $key_suffix) ) :
                    ?>
                    <div class="price-table__item">
                      <dt>
                        <?php
                          $course_name = esc_html($price["course_name{$key_suffix}"]);
                          echo $course_name;  // トップページではSP版でも改行しない、HTMLエスケープのみ
                        ?>
                      </dt>
                      <dd>&yen;<?php echo esc_html(number_format(intval($price["course_price{$key_suffix}"]))); ?></dd>
                    </div>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </dl>
              </div>
              <?php endif; ?>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="price__btn">
        <a href="<?php echo $amount; ?>" class="button" role="button"><span class="button__text">View&nbsp;more</span></a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
