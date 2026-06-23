<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="layout-sub-mv sub-mv sub-mv--information js-mv">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">Information</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part( 'parts/breadcrumbs' ); ?>

  <!-- 身辺警護についての情報 -->
  <section class="layout-lower-head page-information">
    <div class="page-information__inner inner">
      <div class="page-information__heading lower-heading">
        <h2 class="lower-heading__text" id="information-tab-title">身辺警護についての情報</h2>
      </div>
      <div class="page-information__container tab js-tab">
        <div class="tab__list" role="tablist" aria-labelledby="information-tab-title">
          <button
            class="tab__button js-tab-button"
            id="tab-1"
            type="button"
            data-target="panel-1"
            role="tab"
            aria-controls="panel-1"
            aria-selected="true"
          >
            <span>身体を守る<br class="u-mobile">防護壁</span>
          </button>
          <button
            class="tab__button js-tab-button"
            id="tab-2"
            type="button"
            data-target="panel-2"
            role="tab"
            aria-controls="panel-2"
            aria-selected="false"
          >
            <span>安心感の<br class="u-mobile">サポート</span>
          </button>
          <button
            class="tab__button js-tab-button"
            id="tab-3"
            type="button"
            data-target="panel-3"
            role="tab"
            aria-controls="panel-3"
            aria-selected="false"
          >
            <span>危険察知と<br class="u-mobile">回避</span>
          </button>
        </div>
        <div class="tab__cards information-cards">
          <div
            class="information-cards__item information-card js-tab-content"
            id="panel-1"
            role="tabpanel"
            aria-labelledby="tab-1"
          >
            <div class="information-card__content">
              <div class="information-card__body">
                <h3 class="information-card__title">身体を守る防護壁</h3>
                <p class="information-card__text">これは、実際に危険な状況から体を守るための警護です。たとえば、誰かが襲ってきたり、危険な場所に行く必要があるとき、警護員がその人を物理的に守ります。警備員は訓練を受けているので、危険が迫っているときに素早く対応し、安全な場所に移動させたり、危険を未然に防いでくれます。<br>例: 有名な人がファンに囲まれたとき、警備員が間に入ってその人を守る。</p>
              </div>
              <picture class="information-card__img colorbox js-colorbox">
                <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/info-body.webp" type="image/webp">
                <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/info-body.jpg" loading="lazy" alt="">
              </picture>
            </div>
          </div>
          <div
            class="information-cards__item information-card js-tab-content"
            id="panel-2"
            role="tabpanel"
            aria-labelledby="tab-2"
            hidden
          >
            <div class="information-card__content">
              <div class="information-card__body">
                <h3 class="information-card__title">安心感のサポート</h3>
                <p class="information-card__text">これは、危険がないときでも「守られている」と感じられるようにするための警護です。常に警備員がそばにいることで、安心して生活や仕事ができるようになります。特に、ストーカーや脅迫を受けている人にとって、警備員がそばにいると気持ちが楽になり、安心して過ごせるようになります。<br>例: 警備員が付き添っていることで、怖い思いをせずに買い物に行ける。</p>
              </div>
              <picture class="information-card__img colorbox js-colorbox">
                <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/info-support.webp" type="image/webp">
                <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/info-support.jpg" loading="lazy" alt="">
              </picture>
            </div>
          </div>
          <div
            class="information-cards__item information-card js-tab-content"
            id="panel-3"
            role="tabpanel"
            aria-labelledby="tab-3"
            hidden
          >
            <div class="information-card__content">
              <div class="information-card__body">
                <h3 class="information-card__title">危険察知と回避</h3>
                <p class="information-card__text">これは、危険が起きる前にそれを見つけて防ぐための警護です。警備員は周囲の状況を常にチェックし、怪しい動きや不審な人物がいないかを確認します。もし危険がありそうだと感じたら、すぐに行動を起こして、危険が大きくなる前に対処します。たとえば、警備員が事前に場所をチェックして安全を確認したり、日常生活の中でのリスクを減らすためのアドバイスをしてくれます。<br>例: イベント前に警備員が会場を確認し、安全対策を整える。</p>
              </div>
              <picture class="information-card__img colorbox js-colorbox">
                <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/info-dager.webp" type="image/webp">
                <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/info-dager.jpg" loading="lazy" alt="">
              </picture>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
