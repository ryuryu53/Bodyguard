<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="contact-mv sub-mv">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">Contact</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumbs'); ?>

  <!-- お問い合わせ -->
  <div class="top-page-contact2 page-contact">
    <div class="page-contact__inner inner">
      <div class="page-contact__content form">
        <?php echo do_shortcode('[contact-form-7 id="6e8d8bd" title="お問い合わせ"]'); ?>
      </div>
    </div>
  </div>

<?php get_footer(); ?>