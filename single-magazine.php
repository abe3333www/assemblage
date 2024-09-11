<?php get_header(); ?>

<!-- CONTAINER -->
<main id="SINGLE"><!-- 最大幅 -->
  <div class="article__ttl ffEn">
    <h1>Magazine</h1>
  </div>
  <section id="SINGLE-NEWS" class="singleNews">
    <div class="inrWidth singleNews__wrap">
      <div class="singleNews__head ">
        <div class="singleNews__head--thm">
          <?php
          if (has_post_thumbnail()) {
            // アイキャッチ画像が設定されている場合、その画像を表示
            the_post_thumbnail('full', ['alt' => get_the_title()]);
          } else {
            // アイキャッチ画像が設定されていない場合、デフォルトの画像を表示
            echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/img/common/noimg.jpg') . '">';
          }
          ?>
        </div>
        <h1 class="ttl"><?php the_title(); ?></h1>
        <p class="date"><time><?php the_modified_date('Y.m.d'); ?></time></p>
        <?php
        // カスタムタクソノミー 'magazine_cat' に関連付けられているカテゴリを取得
        $categories = get_the_terms(get_the_ID(), 'magazine_cat');

        if ($categories && ! is_wp_error($categories)) :
          echo '<ul class="magazine-categories">';
          foreach ($categories as $category) {
            // カテゴリ名をリンク付きで表示
            echo '<li><a href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a></li>';
          }
          echo '</ul>';
        endif;
        ?>

      </div>
      <article class="singleNews__article">
        <?php the_content(); ?>
      </article>
      <?php
      $previous_post = get_previous_post();
      $next_post = get_next_post();
      ?>
      <nav class="navigation pager" role="navigation">
        <div class="pager__links">
          <?php if ($previous_post): ?>
            <p class="pager__links--prev"><?php previous_post_link('%link', '古い記事'); ?></p>
          <?php endif; ?>
          <a class="pager__links--top" href="<?php echo site_url(); ?>/magazine/">記事一覧</a>
          <?php if ($next_post): ?>
            <p class="pager__links--next"><?php next_post_link('%link', '新しい記事'); ?></p>
          <?php endif; ?>
        </div>
      </nav>
      <div class="singleNews__relate">
        <h2 class="ttl">関連記事</h2>

        <?php
        if (wp_is_mobile()) {
          $num = 2;
        } else {
          $num = 3;
        }

        $categories = get_the_terms(get_the_ID(), 'magazine_cat');
        if ($categories && !is_wp_error($categories)) {
          $category_ids = wp_list_pluck($categories, 'term_id');

          $args = array(
            'post__not_in' => array($post->ID),
            'posts_per_page' => $num,
            'orderby' => 'rand',
            'tax_query' => array(
              array(
                'taxonomy' => 'magazine_cat',
                'field'    => 'term_id',
                'terms'    => $category_ids,
              ),
            ),
          );

          $query = new WP_Query($args);

          if ($query->have_posts()) : ?>
            <ul class="rList">
              <?php while ($query->have_posts()) : $query->the_post(); ?>
                <li class="rList__item">
                  <a href="<?php the_permalink(); ?>">
                    <div class="thumb">
                      <?php
                      if (has_post_thumbnail()) {
                        echo get_the_post_thumbnail();
                      } else {
                        echo '<img src="' . get_template_directory_uri() . '/assets/img/common/noimg.jpg" alt="">';
                      }
                      ?>
                    </div>
                    <div class="tArea">
                      <p class="tArea__ttl"><?php the_title(); ?></p>
                      <p class="tArea__time"><?php echo esc_html(get_post_time('Y.m.d')); ?></p>
                    </div>
                  </a>
                </li>
              <?php endwhile; ?>
            </ul>
        <?php endif;
          wp_reset_postdata();
        }
        ?>
      </div>

    </div>
  </section>
</main>

<?php get_footer(); ?>