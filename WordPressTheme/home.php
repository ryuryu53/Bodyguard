<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="blog-mv sub-mv">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">Blog</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumbs'); ?>

  <!-- ブログ一覧 -->
  <div class="top-two-column two-column">
    <div class="two-column__inner inner">
      <div class="two-column__article column-article">
        <div class="column-article__items blog-cards blog-cards--2col">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article class="blog-cards__item blog-card">
              <a href="<?php the_permalink(); ?>" class="blog-card__link">
                <picture class="blog-card__img">
                  <?php if ( (get_the_post_thumbnail()) ) : ?>
                    <source srcset="<?php the_post_thumbnail_url('full'); ?>">
                    <img src="<?php the_post_thumbnail_url('full'); ?>" class="blog-card__image" alt="">
                  <?php else : ?>
                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/noimage.png" alt="noimage">
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
          <?php endwhile; endif; ?>
        </div>

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
