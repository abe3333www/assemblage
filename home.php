<?php get_header(); ?>

<!-- CONTAINER -->
<main id="ARTICLE"><!-- 最大幅 -->
  <div class="article__ttl ffEn">
    <h1>News</h1>
  </div>
  <section id="ARCHIVE-NEWS" class="archiveNews">
    <ul class="catList">
      <li class="cat-item current-cat js-catItem1">
        <a href="<?php echo esc_url(home_url('news')); ?>">All</a>
      </li>
      <?php
      $categories = get_terms(array(
        'taxonomy' => 'category',
        'orderby' => 'ID',
        'hide_empty' => false, // 記事のないカテゴリも表示する
      ));

      foreach ($categories as $category) {
        $category_count = $category->count;
        if ($category_count > 0) {
          echo '<li class="cat-item"><a href="' . get_term_link($category) . '">' . $category->name . '</a></li>';
        } else {
          echo '<li class="cat-item">' . $category->name . '</li>';
        }
      }
      ?>

    </ul>
    <div class="inrWidth archiveNews__wrap">
      <?php
      // カスタムクエリを作成
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // ページネーションを取得
      $args = array(
        'post_type' => 'news', // カスタム投稿タイプ 'magazine'
        'posts_per_page' => 6,     // 1ページに表示する記事数を6に設定
        'paged' => $paged          // ページ番号
      );

      $magazine_query = new WP_Query($args); // クエリを作成

      // 記事が存在する場合は表示
      if (have_posts()) :
        while (have_posts()) : the_post();
      ?>
          <div class="blk">
            <a href="<?php the_permalink(); ?>">
              <div class="thumb">
                <?php if (has_post_thumbnail()) {
                  the_post_thumbnail('full', ['alt' => get_the_title()]);
                } else {
                  echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/img/common/noimg.jpg') . '">';
                } ?>
                <div class="cat">
                  <?php
                  // カテゴリ表示
                  $categories = get_the_terms(get_the_ID(), 'category');
                  if (!empty($categories)) :
                    foreach ($categories as $category) :
                      echo '<span class="ffEn ' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</span>';
                    endforeach;
                  endif;
                  ?>
                </div>
              </div>
              <p class="ttl"><?php the_title(); ?></p>
              <p class="date"><?php the_time('Y.m.d'); ?></p>
            </a>
          </div>
      <?php
        endwhile;
      else :
        echo '<p>記事がありません。</p>';
      endif;

      wp_reset_postdata(); // クエリをリセット
      ?>

    </div>

    <?php the_posts_pagination(array(
      'prev_text' => __('Previous page', '＜'),
      'next_text' => __('＞'),
    )); ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>