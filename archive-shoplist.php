<?php get_header(); ?>

<!-- CONTAINER -->
<main id="ARTICLE" class="shoplist"><!-- 最大幅 -->
  <div class="article__ttl">
    <h1>取り扱い店舗様</h1>
  </div>
  <section id="ARCHIVE-NEWS" class="archiveShop">
    <ul class="catList">
      <?php
      $categories = get_terms(array(
        'taxonomy' => 'shoplist_cat',
        'orderby' => 'ID',
        'hide_empty' => false, // 記事のないカテゴリも表示する
      ));
      foreach ($categories as $category) {
          echo '<li class="cat-item"><a href="#' . $category->slug . '">' . $category->name . '</a></li>';
      }
      ?>
    </ul>
    <div class="inrWidth archiveShop__wrap">
        <?php foreach ($categories as $category) : ?>
        <h2 id="<?php echo  $category->slug; ?>" class="archiveShop__region"><span><?php echo  $category->name; ?></span></h2>
        <div class="archiveShop__list">
            <?php
        // カスタムクエリを作成
        $args = array(
            'post_type' => 'shoplist', // カスタム投稿タイプ 'shoplist'
            'posts_per_page' => -1,     // 1ページに表示する記事数
            'tax_query' => array(
                array(
                    'taxonomy' => 'shoplist_cat',
                    'terms' =>  $category->slug, // カスタムタクソノミーのカテゴリー（タクソノミーターム）
                    'field' => 'slug'
                ),
            ),
        );
        $magazine_query = new WP_Query($args); // クエリを作成

        // 記事が存在する場合は表示
        if ($magazine_query->have_posts()) :
            while ($magazine_query->have_posts()) : $magazine_query->the_post();
        ?>
        <a id="shop-<?php the_ID(); ?>" href="<?php the_permalink(); ?>" class="archiveShop__shop">
            <h3 class="archiveShop__shop--name"><?php the_title(); ?></h3>
            <p class="archiveShop__shop--address">京都府京都市右京区○○町22-4</p>
            <div class="archiveShop__shop--call">
                <p class="archiveShop__shop--tel">TEL : 000-000-0000</p>
                <p class="archiveShop__shop--fax">FAX : 000-000-0000</p>
            </div>
        </a>

        <?php
            endwhile;
            else :
        ?>
        <p class="archiveShop__empty">取扱店舗がありません。</p>
        <?php
        endif;
            wp_reset_postdata();
        ?>
        </div>
        <?php endforeach ; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>