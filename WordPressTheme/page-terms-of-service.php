<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="layout-sub-mv sub-mv sub-mv--terms-of-service js-mv-height">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">Terms&nbsp;of&nbsp;Service</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part( 'parts/breadcrumbs' ); ?>

  <!-- 利用規約 -->
  <section class="layout-lower-head page-terms-of-service">
    <div class="page-terms-of-service__inner inner">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h2 class="page-terms-of-service__title"><?php the_title(); ?></h2>
        <div class="page-terms-of-service__content">
          <?php the_content(); ?>
        </div>
      <?php endwhile; endif; ?>
    </div>
  </section>

<?php get_footer(); ?>
