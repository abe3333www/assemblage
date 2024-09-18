<?php get_header(); ?>
<?php
$address = get_post_meta(get_the_ID(), '_shop_address', true);
$tel = get_post_meta(get_the_ID(), '_shop_tel', true);
$fax = get_post_meta(get_the_ID(), '_shop_fax', true);
$hours = get_post_meta(get_the_ID(), '_shop_hours', true);
$closed = get_post_meta(get_the_ID(), '_shop_closed', true);
$website = get_post_meta(get_the_ID(), '_shop_website', true);
?>

<!-- CONTAINER -->
<main id="SINGLE"><!-- 最大幅 -->
  <div class="article__ttl ffEn">
    <p>取り扱い店舗様</p>
  </div>
  <section id="SINGLE-NEWS" class="singleShop">
    <div class="inrWidth singleShop__wrap">
      <div class="singleShop__map">
      <?php
        // Google Mapsのiframeを表示
        display_shop_google_map_without_api();
      ?>
      </div>
      <h1 class="singleShop__name"><?php the_title(); ?></h1>
      <div class="singleShop__txt singleShop__txtTop">
        <?php if ($address) : ?><p><?php echo $address ?></p><?php endif; ?>
        <?php if ($tel) : ?><p>TEL : <?php echo $tel ?></p><?php endif; ?>
        <?php if ($fax) : ?><p>FAX : <?php echo $fax ?></p><?php endif; ?>
      </div>
      <div class="singleShop__txt singleShop__txtBtm">
        <?php if ($hours) : ?><p>営業時間 : <?php echo $hours ?></p><?php endif; ?>
        <?php if ($closed) : ?><p>定休日 : <?php echo $closed ?></p><?php endif; ?>
        <?php if ($website) : ?><p>HP : <a href="<?php echo $website ?>" target="_blank"><?php echo $website ?></a></p><?php endif; ?>
      </div>
    </div>

    <nav class="navigation pager" role="navigation">
        <div class="pager__links">
          <a class="pager__links--top" href="<?php echo home_url('shoplist'); ?>">一覧へ戻る</a>
        </div>
      </nav>
  </section>
</main>

<?php get_footer(); ?>