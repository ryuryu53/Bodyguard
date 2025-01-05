<?php get_header(); ?>

<!-- 下層ページのメインビュー -->
  <section class="plans-mv sub-mv js-mv-height">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">Plans</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumbs'); ?>

  <!-- ご提供プラン -->
  <section class="top-page-plans page-plans">
    <div class="page-plans__inner inner">
      <div class="page-plans__category plans-category">
        <!-- タクソノミーのタブを生成 -->
        <!-- get_post_type_archive_link('plans') →「キャンペーン」というカスタム投稿タイプのアーカイブページ（一覧ページ）のリンクを取得 -->
        <a href="<?php echo esc_url(get_post_type_archive_link('plans')); ?>" class="plans-category__link">All</a>
        <?php
          $terms = get_terms(array( // get_terms：特定のタクソノミー（plans_category）のカテゴリ情報を取得する関数
            'taxonomy' => 'plans_category',
            'hide_empty' => true, // 投稿が1つもないカテゴリを表示しないようにする
          ));

          if ( !empty($terms) ) :
            foreach ($terms as $term) :
              $term_link = get_term_link($term);  // 各カテゴリ（タクソノミー）のリンク先URLを取得
              // is_tax('plans_category', $term->slug)：「今表示しているページが、このループで処理しているカテゴリ（$term->slug）かどうか？」を判定
        ?>
        <a href="<?php echo esc_url($term_link); ?>" class="plans-category__link <?php echo (is_tax('plans_category', $term->slug) ? 'is-active' : ''); ?>">
          <?php echo esc_html($term->name); ?>
        </a>
        <?php endforeach; endif; ?>
      </div>
      <ul class="page-plans__items plans-list">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <li class="plans-list__item plans-card">
            <div class="plans-card__link">
              <picture class="plans-card__img plans-card__img--sub-page">
                <?php if ( (get_the_post_thumbnail()) ) : ?>
                  <source srcset="<?php the_post_thumbnail_url('full'); ?>" type="image/webp">
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="">
                <?php else : ?>
                  <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/noimage.png" alt="noimage">
                <?php endif; ?>
              </picture>
              <div class="plans-card__body plans-card__body--sub-page">
                <!-- get_the_terms()：投稿に関連するタクソノミー（分類）を取得するための関数、get_the_ID()：現在表示されている投稿のID（個別の識別番号）を取得 -->
                <?php
                  // カスタムタクソノミー「plans_category」の取得
                  $terms = get_the_terms(get_the_ID(), 'plans_category');
                  if ( $terms && !is_wp_error($terms) ) :
                ?>
                  <p class="plans-card__category"><?php echo esc_html($terms[0]->name); ?></p>
                <?php endif; ?>
                <h3 class="plans-card__title plans-card__title--sub-page text--medium-large"><?php the_title(); ?></h3>
                <p class="plans-card__text plans-card__text--sub-page text--small-sp">お一人様</p>
                <!-- ご提供プランの価格 -->
                <div class="plans-card__price plans-card__price--sub-page">
                <?php
                  $plans_price = get_field('plans_price');  // グループフィールドからデータを取得
                  $price_before = $plans_price['plans_1'];  // サブフィールドから通常価格を取得
                  $price_after = $plans_price['plans_2']; // サブフィールドから割引価格を取得
                ?>
                  <?php if ( $price_before ) : ?>
                    <!-- number_formatだけだと非推奨の警告、intvalで数値として扱う -->
                    <span class="plans-card__price-before plans-card__price-before--sub-page">&yen;<?php echo esc_html(number_format(intval($price_before))); ?></span>
                  <?php endif; ?>
                  <?php if ( $price_after ) : ?>
                    <span class="plans-card__price-after plans-card__price-after--sub-page">&yen;<?php echo esc_html(number_format(intval($price_after))); ?></span>
                  <?php endif; ?>
                </div>
                <div class="plans-card__information">
                  <?php if ( get_field('plans_3') ) : ?>
                    <p class="plans-card__information-text"><?php the_field('plans_3'); ?></p>
                  <?php endif; ?>
                  <!-- キャンペーン期間 -->
                  <div class="plans-card__information-period">
                    <?php
                      $plans_period = get_field('plans_period');  // グループフィールドからデータを取得
                      $start_date = $plans_period['plans_4']; // 開始日(フォーマット済み: Y/n/j)を取得
                      $end_date = $plans_period['plans_5']; // 終了日(フォーマット済み: Y/n/j)を取得
                      // 開始日と終了日の年を抽出
                      $start_year = substr($start_date, 0, 4); // 先頭4文字を取得して年を抽出
                      $end_year = substr($end_date, 0, 4);     // 同じく終了日の年を抽出
                    ?>
                    <?php if ( $start_date ) : ?>
                      <time datetime="<?php echo esc_attr($start_date); ?>">
                        <?php echo esc_html($start_date); ?>
                      </time>
                    <?php endif; ?>
                    <?php if ( $end_date ) : ?>
                      <?php if ( $start_date ) : ?>
                      -
                      <?php endif; ?>
                      <time datetime="<?php echo esc_attr($end_date); ?>">
                        <?php
                          // 開始日と終了日の年が同じ場合は終了日の年を省略
                          if ( $start_year === $end_year ) {
                            echo esc_html(substr($end_date, 5)); // 「Y/n/j」の先頭5文字を飛ばして「n/j」を表示
                          } else {
                            echo esc_html($end_date); // 年が異なる場合はフルの日付「Y/n/j」を表示
                          }
                        ?>
                      </time>
                    <?php endif; ?>
                  </div>
                  <p class="plans-card__information-inquiry">ご予約・お問い合わせはコチラ</p>
                  <div class="plans-card__btn plans-card__btn--sub-page u-desktop">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="button"><span class="button__text">View&nbsp;more</span></a>
                  </div>
                </div>
              </div>
            </div>
          </li>
        <?php endwhile; endif; ?>
      </ul>
    </div>
  </section>

  <div class="top-pagenavi">
    <?php wp_pagenavi(); ?>
  </div>

<?php get_footer(); ?>
