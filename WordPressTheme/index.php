<?php get_header(); ?>

<main>
  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; ?>
  <?php else : ?>
    <p>コンテンツが見つかりませんでした。</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
