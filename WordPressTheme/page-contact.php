<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="layout-sub-mv sub-mv sub-mv--contact js-mv">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">Contact</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumbs'); ?>

  <!-- お問い合わせ -->
  <div class="layout-lower-head page-contact">
    <div class="page-contact__inner inner">
      <h2 class="page-contact__heading">お気軽にご相談ください</h2>
      <div class="page-contact__content form">
        <?php echo do_shortcode('[contact-form-7 id="3c0f69b" title="お問い合わせ"]'); ?>
      </div>
    </div>
  </div>

<?php get_footer(); ?>
