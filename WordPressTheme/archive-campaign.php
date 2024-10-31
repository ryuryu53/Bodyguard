<?php get_header(); ?>

<!-- 下層ページのメインビュー -->
  <section class="campaign-mv sub-mv">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">Plans</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumbs'); ?>

  <!-- ご提供プラン -->
  <section class="top-page-campaign page-campaign">
    <div class="page-campaign__inner inner">
      <div class="page-campaign__category campaign-category">
        <!-- タクソノミーのタブを生成 -->
        <!-- get_post_type_archive_link('campaign') →「キャンペーン」というカスタム投稿タイプのアーカイブページ（一覧ページ）のリンクを取得 -->
        <!-- if ( !is_tax() ) echo 'is-active' → 今表示されているページが特定のカテゴリ（タクソノミー）に属していない場合、is-activeというクラスを付与 -->
        <a href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>" class="campaign-category__link <?php if ( !is_tax() ) echo 'is-active'; ?>">All</a>
        <?php
          $terms = get_terms(array( // get_terms：特定のタクソノミー（campaign_category）のカテゴリ情報を取得する関数
            'taxonomy' => 'campaign_category',
            'hide_empty' => true, // 投稿が1つもないカテゴリを表示しないようにする
          ));

        if ( !empty($terms) ) :
          foreach ($terms as $term) :
            $term_link = get_term_link($term);  // 各カテゴリ（タクソノミー）のリンク先URLを取得
            // is_tax('campaign_category', $term->slug)：「今表示しているページが、このループで処理しているカテゴリ（$term->slug）かどうか？」を判定
        ?>
        <a href="<?php echo esc_url($term_link); ?>" class="campaign-category__link <?php echo (is_tax('campaign_category', $term->slug) ? 'is-active' : ''); ?>">
          <?php echo esc_html($term->name); ?>
        </a>
        <?php endforeach; endif; ?>
      </div>
      <ul class="page-campaign__items campaign-list">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <li class="campaign-list__item campaign-card">
            <div class="campaign-card__link">
              <picture class="campaign-card__img campaign-card__img--sub-page">
                <?php if ( (get_the_post_thumbnail()) ) : ?>
                  <source srcset="<?php the_post_thumbnail_url('full'); ?>" type="image/webp">
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                <?php else : ?>
                  <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/noimage.png" alt="noimage">
                <?php endif; ?>
              </picture>
              <div class="campaign-card__body campaign-card__body--sub-page">
                <!-- get_the_terms()：投稿に関連するタクソノミー（分類）を取得するための関数、get_the_ID()：現在表示されている投稿のID（個別の識別番号）を取得 -->
                <?php
                  // カスタムタクソノミー「campaign_category」の取得
                  $terms = get_the_terms(get_the_ID(), 'campaign_category');
                  if ( $terms && !is_wp_error($terms) ) :
                ?>
                  <p class="campaign-card__category"><?php echo esc_html($terms[0]->name); ?></p>
                <?php endif; ?>
                <h3 class="campaign-card__title text--medium-large"><?php the_title(); ?></h3>
                <p class="campaign-card__text campaign-card__text--sub-page text--small-sp">お一人様</p>
                <!-- ご提供プランの価格 -->
                <div class="campaign-card__price">
                  <?php
                    $campaign_price = get_field('campaign_price');  // グループフィールドからデータを取得
                    $price_before = $campaign_price['campaign_1'];  // サブフィールドから日契約の価格を取得
                    $price_after = $campaign_price['campaign_2']; // サブフィールドから月契約の価格を取得
                  ?>
                  <?php if ( $price_before ) : ?>
                    <!-- number_formatだけだと非推奨の警告、intvalで数値として扱う -->
                    <span class="campaign-card__price-before">&yen;<?php echo esc_html(number_format(intval($price_before))); ?>/日</span>
                  <?php endif; ?>
                  <?php if ( $price_after ) : ?>
                    <span class="campaign-card__price-after">&yen;<?php echo esc_html(number_format(intval($price_after))); ?>/月</span>
                  <?php endif; ?>
                </div>
                <div class="campaign-card__information">
                  <?php if ( get_field('campaign_3') ) : ?>
                    <p class="campaign-card__information-text"><?php the_field('campaign_3'); ?></p>
                  <?php endif; ?>
                  <!-- キャンペーン期間 -->
                  <div class="campaign-card__information-period">
                    <?php
                      $campaign_period = get_field('campaign_period');  // グループフィールドからデータを取得
                      $start_date = $campaign_period['campaign_4']; // 開始日(フォーマット済み: Y/n/j)を取得
                      $end_date = $campaign_period['campaign_5']; // 終了日(フォーマット済み: Y/n/j)を取得
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
                  <p class="campaign-card__information-inquiry">ご予約・お問い合わせはコチラ</p>
                  <div class="campaign-card__btn u-desktop">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="button"><span class="button__text">Contact&nbsp;us</span></a>
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
