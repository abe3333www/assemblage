<?php get_header(); ?>

<!-- CONTAINER -->
<main id="ARTICLE">
  <div class="article__ttl ffEn">
    <h1>News</h1>
  </div>
  <section id="ARCHIVE-NEWS" class="archiveNews">
    <ul class="catList">
      <li class="cat-item <?php if (is_home() || is_post_type_archive('news')) echo 'current-cat'; ?> js-catItem1">
        <a href="<?php echo esc_url(home_url('news')); ?>">All</a>
      </li>
      <?php
      $categories = get_terms(array(
        'taxonomy' => 'category',
        'orderby' => 'ID',
        'hide_empty' => false,
      ));

      $current_category = get_queried_object(); // 現在のカテゴリを取得

      foreach ($categories as $category) {
        $category_count = $category->count;
        $is_current_cat = ($current_category && $current_category->term_id == $category->term_id) ? 'current-cat' : '';
        
        if ($category_count > 0) {
          echo '<li class="cat-item ' . $is_current_cat . '"><a href="' . get_term_link($category) . '">' . $category->name . '</a></li>';
        } else {
          echo '<li class="cat-item ' . $is_current_cat . '">' . $category->name . '</li>';
        }
      }
      ?>
    </ul>

    <div class="inrWidth archiveNews__wrap">
      <?php
      // 現在表示しているカテゴリの情報を取得
      $current_category_id = $current_category ? $current_category->term_id : '';

      // カスタムクエリを作成
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(
        'post_type' => 'news',
        'posts_per_page' => 6,
        'paged' => $paged,
        'tax_query' => array(
          array(
            'taxonomy' => 'category',  // カテゴリのタクソノミー
            'field'    => 'term_id',       // タームIDでフィルタリング
            'terms'    => $current_category_id,  // 現在表示しているカテゴリ
          ),
        ),
      );

      $magazine_query = new WP_Query($args);

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

      wp_reset_postdata();
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
