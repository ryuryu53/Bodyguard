<?php get_header(); ?>

<!-- 下層ページのメインビュー -->
  <section class="layout-sub-mv sub-mv sub-mv--plans js-mv-height">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">Plans</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumbs'); ?>

  <!-- ご提供プラン -->
  <section class="layout-lower-head page-plans">
    <div class="page-plans__inner inner">
      <div class="page-plans__category plans-category">
        <!-- タクソノミーのタブを生成 -->
        <!-- get_post_type_archive_link('plans') →「キャンペーン」というカスタム投稿タイプのアーカイブページ（一覧ページ）のリンクを取得 -->
        <!-- if ( !is_tax() ) echo 'is-active' → 今表示されているページが特定のカテゴリ（タクソノミー）に属していない場合、is-activeというクラスを付与 -->
        <a href="<?php echo esc_url(get_post_type_archive_link('plans')); ?>" class="plans-category__link <?php if ( !is_tax() ) echo 'is-active'; ?>">All</a>
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
      <?php if ( have_posts() ) : ?>
        <ul class="page-plans__items plans-list">
          <?php while ( have_posts() ) : the_post(); ?>
            <li class="plans-list__item plans-card">
              <div class="plans-card__link">
                <picture class="plans-card__img plans-card__img--sub-page colorbox js-colorbox">
                  <?php if ( (get_the_post_thumbnail()) ) : ?>
                    <source srcset="<?php the_post_thumbnail_url('full'); ?>" type="image/webp">
                    <img src="<?php the_post_thumbnail_url('full'); ?>" loading="lazy" alt="">
                  <?php else : ?>
                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/noimage.png" loading="lazy" alt="noimage">
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
                  <h3 class="plans-card__title text--medium-large"><?php the_title(); ?></h3>
                  <p class="plans-card__text plans-card__text--sub-page text--small-sp">お一人様</p>
                  <!-- ご提供プランの価格 -->
                  <div class="plans-card__price">
                    <?php
                      $plans_price = get_field( 'plans_price' );  // グループフィールドからデータを取得
                      $price_before = $plans_price[ 'plans_1' ];  // サブフィールドから日契約の価格を取得
                      $price_after = $plans_price[ 'plans_2' ]; // サブフィールドから月契約の価格を取得
                    ?>
                    <?php if ( $price_before ) : ?>
                      <!-- number_formatだけだと非推奨の警告、intvalで数値として扱う -->
                      <span class="plans-card__price-before">&yen;<?php echo esc_html( number_format( intval( $price_before ) ) ); ?>/日</span>
                    <?php endif; ?>
                    <?php if ( $price_after ) : ?>
                      <span class="plans-card__price-after">&yen;<?php echo esc_html( number_format( intval( $price_after ) ) ); ?>/月</span>
                    <?php endif; ?>
                  </div>
                  <div class="plans-card__information u-desktop">
                    <?php if ( get_field( 'plans_3' ) ) : ?>
                      <p class="plans-card__information-text"><?php the_field( 'plans_3' ); ?></p>
                    <?php endif; ?>
                    <!-- キャンペーン期間 -->
                    <div class="plans-card__information-period">
                      <?php
                        $plans_period = get_field( 'plans_period' );  // グループフィールドからデータを取得
                        $start_date = $plans_period[ 'plans_4' ] ?? null; // 開始日(フォーマット済み: Y/n/j)を取得
                        $end_date = $plans_period[ 'plans_5' ] ?? null; // 終了日(フォーマット済み: Y/n/j)を取得
                        // ACF戻り値の形式に合わせてDateTimeオブジェクトに変換
                        $start_dt = $start_date ? DateTime::createFromFormat( 'Y/n/j', $start_date ) : false;
                        $end_dt = $end_date ? DateTime::createFromFormat( 'Y/n/j', $end_date ) : false;
                        // datetime属性用（ISO 8601形式）
                        $start_datetime_attr = $start_dt ? $start_dt->format( 'Y-m-d' ) : '';
                        $end_datetime_attr = $end_dt ? $end_dt->format( 'Y-m-d' ) : '';
                        // 年だけ取得
                        $start_year = $start_dt ? $start_dt->format( 'Y' ) : '';
                        $end_year = $end_dt ? $end_dt->format( 'Y' ) : '';
                        // 終了日の年を省略したものを取得
                        $end_day = $end_dt ? $end_dt->format( 'n/j' ) : '';
                      ?>
                      <?php if ( $start_dt ) : ?>
                        <time datetime="<?php echo esc_attr( $start_datetime_attr ); ?>">
                          <?php echo esc_html( $start_date ); ?>
                        </time>
                      <?php endif; ?>
                      <?php if ( $end_dt ) : ?>
                        <?php if ( $start_dt ) : ?>
                        -
                        <?php endif; ?>
                        <time datetime="<?php echo esc_attr( $end_datetime_attr ); ?>">
                          <?php
                            // 開始日と終了日の年が同じ場合は終了日の年を省略
                            if ( $start_year && $end_year && $start_year === $end_year ) {
                              echo esc_html( $end_day ); //「n/j」だけ表示
                            } else {
                              echo esc_html( $end_date ); // 年が異なる場合はフルの日付「Y/n/j」を表示
                            }
                          ?>
                        </time>
                      <?php endif; ?>
                    </div>
                    <div class="plans-card__btn">
                      <?php
                        // カスタムタクソノミー「plans_category」の取得
                        $terms = get_the_terms(get_the_ID(), 'plans_category');
                        $plans_category = !empty($terms) ? $terms[0]->name : ''; // 最初のカテゴリ名を取得
                        $plans_category_slug = !empty($terms) ? $terms[0]->slug : ''; // スラッグ（URLエンコード用）→ 今回は未使用
                        // ↓ urlencode($plans_category)で日本語をURLで使える形に変換（エンコード）してselect_plan というGETパラメータにセット
                      ?>
                      <a href="<?php echo esc_url( home_url( '/contact?select_plan=' . urlencode( $plans_category ) ) ); ?>" class="button button--noto-sans"><span class="button__text">このプランを予約</span></a>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php else : ?>
        <p>現在、投稿はありません。</p>
      <?php endif; ?>
    </div>
  </section>

  <div class="layout-pagenavi">
    <?php wp_pagenavi(); ?>
  </div>

<?php get_footer(); ?>
