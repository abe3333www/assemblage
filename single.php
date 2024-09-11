<?php
get_header();
if (have_posts()): while (have_posts()): the_post();
?>
    <!-- CONTAINER -->
    <main class="article"><!-- 最大幅 -->
      <div class="article__ttl ffEn">
        <p>News</p>
      </div>
      <section id="ARCHIVE-NEWS" class="archiveNews  inrWidth mincho">
        <div class="archiveNews__head ">
          <h1 class="archiveNews__head--ttl"><?php the_title(); ?></h1>
          <p class="archiveNews__head--date"><time><?php the_modified_date('Y.m.d'); ?></time></p>
          <?php if (has_post_thumbnail()): ?>
            <div class="archiveNews__head--thm">
            </div>
          <?php else: ?>
          <?php endif; ?>
        </div>
        <article class="archiveNews__article">
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
            <a class="pager__links--top" href="<?php echo site_url(); ?>/news/">記事一覧</a>
            <?php if ($next_post): ?>
              <p class="pager__links--next"><?php next_post_link('%link', '新しい記事'); ?></p>
            <?php endif; ?>
          </div>
        </nav>
      </section>
      </div>
    </main>
    <!-- //CONTAINER -->

<?php
  endwhile;
endif;
get_footer();
?>