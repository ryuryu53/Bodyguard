<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="layout-sub-mv sub-mv sub-mv--privacy-policy js-mv-height">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">Privacy&nbsp;Policy</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumbs'); ?>

  <!-- プライバシーポリシー -->
  <section class="layout-page-privacy-policy page-privacy-policy">
    <div class="page-privacy-policy__inner inner">
      <h2 class="page-privacy-policy__title"><?php the_title(); ?></h2>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="page-privacy-policy__content">
          <?php the_content(); ?>
        </div>
      <?php endwhile; endif; ?>
    </div>
  </section>

<?php get_footer(); ?>
