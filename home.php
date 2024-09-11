<?php get_header();?>

  <!-- CONTAINER -->
  <main class="article"><!-- 最大幅 -->
    <div class="article__ttl ffEn">
      <h1>News</h1>
    </div>
    <section id="ARCHIVE-NEWS" class="archiveNews">
      <div class="inrWidth archiveNews__wrap">
        <?php if(have_posts()):?>
        <?php while(have_posts()):the_post();?>
        <dl class="archiveNews__blk">
          <dt class="archiveNews__blk--info"><time><?php the_time('Y.m.d'); ?></time></dt>
          <dd class="archiveNews__blk--body">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </dd>
        </dl>
        <?php endwhile;?>
        <?php else: ?>
        <div class="archive__noText">現在、公開されている記事はありません。</div>
        <?php endif;?>
        
        <?php the_posts_pagination( array(
          'prev_text' => __( '＜' ),
          'next_text' => __( '＞' ),
        ) ); ?>

      </div>
    </section>

  </main>
  <!-- //CONTAINER -->

    <?php get_footer(); ?>
    