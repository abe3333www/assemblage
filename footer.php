<?php if (!is_page('tob')) : ?>
  <!-- FOOTER -->
  <footer class="ft">
    <div class="ft_cnt">
      <div class="ft_cnt-logo">
        <a href="<?php echo esc_html(home_url()); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo_ft.png" alt="Assemblage Club"></a>
      </div>
      <div class="ft_cnt-ma">
        <div class="ft_cnt-ma-lft">
          <div class="ft_cnt-ma-lft-blk">
            <p class="ft_cnt-ma-lft-blk-ttl">商品のご注文</p>
            <div class="ft_cnt-ma-lft-blk-bArea">
              <a href="" target="_blank">個人のお客様</a>
              <a href="" target="_blank">飲食店関係者の皆様</a>
            </div>
          </div>
          <div class="ft_cnt-ma-lft-blk">
            <p class="ft_cnt-ma-lft-blk-ttl -en">News Letter</p>
            <div class="ft_cnt-ma-lft-blk-bArea fCol">
              <a class="lineBtn pc">Assemblage Club LINE公式アカウントはこちら</a>
              <a class="lineBtn sp">Assemblage Club公式LINE@はこちら</a>
              <a class="mlmgBtn" href="" target="_blank">メールマガジン</a>
            </div>
          </div>
        </div>
        <nav class="ft_cnt-ma-rgt">
          <ul class="ft_cnt-ma-rgt-list">
            <li><a href="<?php echo esc_url(home_url()); ?>">Top</a></li>
            <li><a href="<?php echo esc_url(home_url()); ?>/magazine/">Magazine</a></li>
            <li><a href="<?php echo esc_url(home_url()); ?>/news/">News</a></li>
          </ul>
          <ul class="ft_cnt-ma-rgt-list">
            <li><a href="<?php echo esc_url(home_url()); ?>/cooperation/">協力酒造</a></li>
            <li><a href="<?php echo esc_url(home_url()); ?>/faq/">FAQ</a></li>
            <li><a href="<?php echo esc_url(home_url()); ?>/contact/">Contact</a></li>
          </ul>
        </nav>
        <!-- totop -->
        <div class="ft_cnt-ma-totop sp js-totop">
          <a href="#">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/totop.svg" alt="PAGE TOP" width="25" height="84">
          </a>
        </div>
      </div>
      <div class="ft_cnt-btm">
        <div class="ft_cnt-btm-flex">
          <div class="ft_cnt-btm-flex-logo">
            <a href="https://sakeworld.jp/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/ft_logo1.svg" alt="Sake-world"></a>
            <a href="https://nft.sakeworld.jp/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/ft_logo2.svg" alt="Sake-world NFT"></a>
          </div>
          <ul class="ft_cnt-btm-flex-link">
            <li><a href="https://assemblageclub.stores.jp/tokushoho" target="_blank">特定商法取引法に基づく表記</a></li>
            <li><a href="https://assemblageclub.stores.jp/privacy_policy" target="_blank">プライバシーポリシー</a></li>
            <li><a href="https://assemblageclub.stores.jp/terms" target="_blank">利⽤規約</a></li>
            <li><a href="https://leafkyoto.co.jp/" target="_blank">会社概要</a></li>
          </ul>
        </div>
        <div class="ft_cnt-btm-sns">
          <p class="ft_cnt-btm-sns-ttl">Share</p>
          <ul class="ft_cnt-btm-sns-list">
            <li><a href="" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/ft_icon_x.svg" alt="X"></a></li>
            <li><a href="" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/ft_icon_insta.svg" alt="Instagram"></a></li>
            <li><a href="" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/ft_icon_facebook.svg" alt="facebook"></a></li>
          </ul>
        </div>
        <div class="ft_cnt-btm-tArea">
          <div class="ft_cnt-btm-tArea-com">
            <p class="ft_cnt-btm-tArea-com-ttl">株式会社リーフ・パブリケーションズ</p>
            <p class="ft_cnt-btm-tArea-com-info">＜取材に関するお問い合わせ＞<a href="mailto:info@sakeworld.jp">info@sakeworld.jp</a></p>
          </div>
          <div class="ft_cnt-btm-tArea-att">
            <p class="ft_cnt-btm-tArea-att-txt">未成年の飲酒は法律で禁止されています。未成年への酒類の販売はいたしません。</p>
            <p class="ft_cnt-btm-tArea-att-txt">令和４年度⽇本産酒類海外展開⽀援事業費補助⾦<br class="sp">(ブランド化・酒蔵ツーリズム補助⾦) (取得⽇：令和4年9⽉28⽇)</p>
          </div>
        </div>
      </div>
    </div>

  </footer>













  <!-- <footer class="ft" style="display: none;">
    <div class="ft__wrap">
      <div class="ft__lft">
        <a class="ft__lft--logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo_ft.png" alt="Assemblage Club"></a>
        <ul class="ft__lft--ul">
          <li class="ft__lft--li"><a class="ft__lft--li--blank" href="https://assemblageclub.stores.jp/terms" target="_blank">利⽤規約</a></li>
          <li class="ft__lft--li"><a class="ft__lft--li--blank" href="https://assemblageclub.stores.jp/tokushoho" target="_blank">特定商法取引表記</a></li>
          <li class="ft__lft--li"><a class="ft__lft--li--blank" href="https://assemblageclub.stores.jp/privacy_policy" target="_blank">プライバシーポリシー</a></li>
        </ul>
        <p class="ft__lft--note pc">20歳未満の飲酒は法律で禁止されています。20歳未満への酒類の販売はいたしません。</p>
        <p class="ft__lft--note pc" style="margin-top: 0">令和４年度⽇本産酒類海外展開⽀援事業費補助⾦（ブランド化・酒蔵ツーリズム補助⾦）（取得⽇：令和4年9⽉28⽇）</p>
      </div>
      <div class="ft__rgt">
        <a class="ft__rgt--totop" href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/btn_totop.svg" alt="to top"></a>
        <a class="ft__rgt--contact" href="<?php echo site_url(); ?>/contact/">お問い合わせはこちら</a>
        <div class="ft__rgt--txt">
          <p class="ft__rgt--txt--name">株式会社リーフ・パブリケーションズ</p>
          <p class="ft__rgt--txt--mail">&lt;取材に関するお問い合わせ&gt; <a href="mailto:info@sakeworld.jp">info@sakeworld.jp</a></p>
        </div>
        <p class="ft__rgt--note sp">未成年の飲酒は法律で禁止されています。未成年への酒類の販売はいたしません。</p>
        <p class="ft__rgt--note sp" style="margin-top: 0">令和４年度⽇本産酒類海外展開⽀援事業費補助⾦（ブランド化・酒蔵ツーリズム補助⾦）（取得⽇：令和4年9⽉28⽇）</p>

      </div>
    </div>
  </footer> -->
<?php endif; ?>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/protonet-jquery.inview/1.1.2/jquery.inview.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/common.js" charset="utf-8"></script>

<?php if (is_page('tob')) : ?>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/tob.js" charset="utf-8"></script>
<?php endif; ?>
<?php if (is_page('toc')) : ?>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/toc.js" charset="utf-8"></script>
<?php endif; ?>

<?php if (is_post_type_archive('magazine')) : ?>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/archive.js" charset="utf-8"></script>
<?php endif; ?>
<?php if (is_archive()) : ?>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/archive.js" charset="utf-8"></script>
<?php endif; ?>

<!-- //FOOTER -->
<?php wp_footer(); ?>
</body>

</html>