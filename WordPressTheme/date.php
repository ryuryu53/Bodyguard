<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="layout-sub-mv sub-mv sub-mv--blog js-mv-height">
    <div class="sub-mv__header">
      <!-- 日付アーカイブのタイトルを表示 -->
      <h1 class="sub-mv__title sub-mv__title--date"><?php the_archive_title(); ?></h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part( 'parts/breadcrumbs' ); ?>

  <!-- ブログ一覧 -->
  <div class="layout-lower-head two-column">
    <div class="two-column__inner inner">
      <div class="two-column__article column-article">
        <?php if ( have_posts() ) : ?>
          <div class="column-article__items blog-cards blog-cards--2col">
            <?php while ( have_posts() ) : the_post(); ?>
              <article class="blog-cards__item blog-card">
                <a href="<?php the_permalink(); ?>" class="blog-card__link">
                  <picture class="blog-card__img">
                    <?php if ( get_the_post_thumbnail() ) : ?>
                      <source srcset="<?php the_post_thumbnail_url( 'full' ); ?>">
                      <img src="<?php the_post_thumbnail_url( 'full'); ?>" class="blog-card__image" loading="lazy" alt="">
                    <?php else : ?>
                      <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/noimage.png" loading="lazy" alt="noimage">
                    <?php endif; ?>
                  </picture>
                  <div class="blog-card__body">
                    <time datetime="<?php the_time( 'c' ); ?>" class="blog-card__date"><?php the_time( 'Y.m.d' ); ?></time>
                    <h3 class="blog-card__title text--medium"><?php the_title(); ?></h3>
                    <p class="blog-card__text text--black-pc">
                      <?php
                      // 投稿本文を取得
                      $content = get_the_content();

                      // コメントや不要なタグを削除
                      $content = strip_tags( $content, '<br>' );  // 改行するときは「Shift+Enter」を押して改行

                      // 文字数を制限
                      if ( mb_strlen( $content, 'UTF-8' ) > 85 ) :
                        // 85文字で切り取る
                        $content = mb_substr( $content, 0, 85, 'UTF-8' ) . '...';
                      endif;

                      // 整形したコンテンツを出力
                      echo wp_kses_post( $content );
                      ?>
                    </p>
                  </div>
                </a>
              </article>
            <?php endwhile; ?>
          </div>
        <?php else : ?>
          <p>現在、投稿はありません。</p>
        <?php endif; ?>

        <!-- ページナビゲーション -->
        <div class="column-article__wp-pagenavi">
          <?php wp_pagenavi(); ?>
        </div>
      </div>

      <!-- サイドバー -->
      <aside class="two-column__aside">
        <?php get_sidebar(); ?>
      </aside>
    </div>
  </div>

<?php get_footer(); ?>
