<!DOCTYPE html>
<!-- <html lang="ja"> -->
<html>

<head prefix="og: http://ogp.me/ns# website: http://ogp.me/ns/website#">
  <!-- <head prefix="og: http://ogp.me/ns# article: http://ogp.me/ns/article#"> -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/common/favicon.ico">
  <link rel="stylesheet" type="text/css" media="all" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">

  <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/assets/css/common.css">
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">

  <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet"> -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Noto+Serif+JP:wght@200..900&display=swap" rel="stylesheet">
  <?php wp_head(); ?>

  <?php if (is_page('tob') || is_page('confirm') || is_page('complete')) : ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-1051779664"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'AW-1051779664');
    </script>
  <?php endif; ?>
  <?php if (is_page('complete')) : ?>
    <!-- Event snippet for 購入（shopify） conversion page -->
    <script>
      gtag('event', 'conversion', {
        'send_to': 'AW-1051779664/5bt9CK-m6pMYENDEw_UD',
        'transaction_id': ''
      });
    </script>
  <?php endif; ?>
</head>

<?php if (is_front_page()) : ?>

  <body class="withMV">
  <?php elseif (is_page('product') || page_is_ancestor_of('product')) : ?>

    <body class="withMVwht">
    <?php else : ?>

      <body class="">
      <?php endif; ?>

      <!-- デフォルトのヘッダーは、toBページでは表示しない -->
      <?php if (!is_page('tob')) : ?>
        <div class="addLine lineBtn">
          <a href="https://line.me/R/ti/p/@872qnsdk#~" target="_blank">Assemblage Club LINE公式アカウントはこちら</a>
        </div>
        <!-- HEADER -->
        <header class="hd ffEn">
          <?php if (!is_page('toc')) : ?>
            <div class="hd__wrap">
              <a class="hd__logo hdTc__logo js-logo" href="<?php echo site_url(); ?>">
                <p class="hd__logo--icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo_hd_blk.png" alt="Assemblage Club"></p>
              </a>
              <div class="humBtn"><span></span></div>
              <nav class="hd__nav">
                <ul class="hd__nav--ul">
                  <li class="hd__nav--li"><a class="hd__nav--li--link" href="<?php echo site_url(); ?>/">Top</a></li>
                  <li class="hd__nav--li"><a class="hd__nav--li--link" href="<?php echo site_url(); ?>/toc" target="_blank">Magazine</a></li>
                  <li class="hd__nav--li"><a class="hd__nav--li--link" href="<?php echo site_url(); ?>/news/">About</a></li>
                  <li class="hd__nav--li"><a class="hd__nav--li--link" href="<?php echo site_url(); ?>/faq/">Products</a></li>
                  <li class="hd__nav--li"><a class="hd__nav--li--link" href="<?php echo site_url(); ?>/cooperation/">News</a></li>
                  <li class="hd__nav--li"><a class="hd__nav--li--link" href="<?php echo site_url(); ?>/cooperation/">History</a></li>
                  <li class="hd__nav--li"><a class="hd__nav--li--link" href="<?php echo site_url(); ?>/cooperation/">Shop list</a></li>
                  <li class="hd__nav--li"><a class="hd__nav--li--link" href="<?php echo site_url(); ?>/cooperation/">FAQ</a></li>
                </ul>
                <p class="hd__nav--line sp"><a class="hd__nav--line--link mincho" href="" target="_blank">Assemblage Club 公式LINE@</a></p>
                <p class="hd__nav--copy sp mincho">M KYOTO Online Store</p>
              </nav>
            </div>
          <?php endif; ?>
        </header>
        <?php if (!is_page('toc')) : ?>
          <!-- //HEADER -->
          <div id="language-switcher" class="language-switcher"><?php echo do_shortcode('[language-switcher]'); ?></div>

          <div class="fixedShop js-fixProducts"> <a href="#">Products</a></div>
        <?php endif; ?>

      <?php endif; ?>
      <section id="LINE-ADD" class="lineAdd">
        <div class="lineAdd__wrap">
          <div class="lineAdd__blk">
            <p class="lineAdd__blk--icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo_hd_blk.png" alt=""></p>
            <p class="lineAdd__blk--logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/mv_logo.svg" alt="Assemblage Club"></p>
            <p class="lineAdd__blk--lead">さあ、世界の美⾷が貴方を待っています<br>ともに⼤航海をはじめましょう</p>
            <a class="lineAdd__blk--qr" href="https://line.me/R/ti/p/@872qnsdk#~" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/qrcord.png" alt=""></a>
            <p class="lineAdd__blk--txt">QRコードをスキャンすると<br>LINEの友だちに追加されます</p>
          </div>
          <div class="lineAdd__close">CLOSE<span class="lineAdd__close--box"></span></div>
        </div>
        <div class="lineAdd__bg"></div>
      </section>


      <!-- toBページの場合、このヘッダーを表示 -->
      <?php if (is_page('tob') || is_page('confirm') || is_page('complete')) : ?>
        <!-- HEADER -->
        <header class="hdTb">
          <div class="hdTb__wrap">
            <button type="button" class="hdTb__wrap--hb sp js-hb" aria-label="メニューを開く">
              <span></span>
              <span></span>
              <span></span>
            </button>
            <a class="hdTb__logo" href="<?php echo site_url(); ?>/tob/">
              <img class="pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/tob/logo.svg" alt="Assemblage Club">
              <img class="sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/tob/logo_sp.svg" alt="Assemblage Club">
            </a>
            <div class="hdTb__link pc">
              <div class="hdTb__link--item lineBtn">
                <a href="https://line.me/R/ti/p/@872qnsdk#~" target="_blank">公式LINEアカウント</a>
              </div>
              <div class="hdTb__link--item">
                <a href="#sec06">お問い合わせ</a>
              </div>
            </div>
          </div>
        </header>
        <div class="hdTb__nav js-nav sp">
          <div class="hdTb__nav--cl js-close">
            <span></span>
            <span></span>
          </div>
          <ul>
            <li><a href="#sec01"><span class="en">Assemblage</span><span class="ja">Assemblageとは</span></a></li>
            <li><a href="#sec02"><span class="en">Past Requests</span><span class="ja">ご依頼例</span></a></li>
            <li><a href="#sec03"><span class="en">About us</span><span class="ja">私たちについて</span></a></li>
            <li><a href="#sec04"><span class="en">Schedule</span><span class="ja">サービスの流れ</span></a></li>
            <li><a href="#sec05"><span class="en">FAQ</span><span class="ja">よくある質問</span></a></li>
            <li><a href="#sec06"><span class="en">Contact</span><span class="ja">お問い合わせ</span></a></li>
            <li id="language-switcher" class="hdTb__nav--swLi"><?php echo do_shortcode('[language-switcher]'); ?></li>
          </ul>
          <img class="hdTb__nav--treat" src="<?php echo get_template_directory_uri(); ?>/assets/img/tob/nav_treat.png">
        </div>
      <?php endif; ?>


      <!-- toCページの場合、このヘッダーを表示 -->
      <?php if (is_page('toc')) : ?>
        <!-- HEADER -->
        <header class="hdTc js-nav">
          <nav class="">
            <div class="hdTc__close js-close">
              <span></span>
              <span></span>
            </div>
            <ul>
              <li id="language-switcher" class="liSw pc"><?php echo do_shortcode('[language-switcher]'); ?></li>
              <li class="on"><a href="#TOP">Top</a></li>
              <li><a href="#ABOUT">About</a></li>
              <li><a href="#AWARDS">Awards & Biography</a></li>
              <li><a href="#PRODUCTS">Products</a></li>
              <li><a href="#TASTING">Tasting Notes</a></li>
              <li><a href="#REVIEW">Review</a></li>
              <li id="language-switcher" class="liSw sp"><?php echo do_shortcode('[language-switcher]'); ?></li>
            </ul>
          </nav>
        </header>
        <div class="hdTc__hb js-hb">
          <span></span>
          <span></span>
          <span></span>
        </div>
      <?php endif; ?>