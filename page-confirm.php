<div class="tobWrap">
    <?php get_header(); ?>
    <main id="MAIN" class="tobConfirm">

        <div class="tob__area">
            <section id="sec06" class="tob__area--ctt">
                <h3 class="tobSecTtl">
                    <span class="tobSecTtl__en">Contact</span>
                    <span class="tobSecTtl__ja">お問い合わせ</span>
                </h3>
                <div class="tob__area--ctt--box">
                    <div class="tob__area--ctt--cnt tobCnt js-bgSec">
                    <?php the_content();?>
                    </div>
                </div>
            </section>
        </div>

        <div class="tob__area--ft">
            <div class="tob__area--ft--cnt tobCnt">
                <div class="tob__area--ft--cnt--flex">
                    <a href="<?php echo esc_url(site_url()); ?>" class="logo"><img class="treat1" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/tob/logo_ft.svg" alt="Assemblage Club"></a>
                    <div class="info">
                        <p class="info__name">株式会社リーフ・パブリケーションズ</p>
                        <div class="info__address">
                            <p>〒607-8067</p>
                            <p>京都府京都市山科区音羽前田町43<br class="sp">ヤマシナアーバンコテージ1F・B1F</p>
                            <p><a href="https://maps.app.goo.gl/RVnRfJPzGTkmzKdo9" target="_blank">[Googleマップ]</a></p>
                            <p class="tel"><a href="tel:075-632-9453">TEL／075-632-9453</a></p>
                            <p>FAX／075-632-9458</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- /CONTAINER -->
    <?php get_footer(); ?>
</div>