<?php get_header();?>

  <!-- CONTAINER -->
  <main class="article"><!-- 最大幅 -->
    <div class="article__ttl ffEn">
      <h1>News</h1>
    </div>
    <section id="ARCHIVE-NEWS" class="archiveNews">
      <div class="inrWidth archiveNews__wrap">
        <dl class="archiveNews__blk">
          <?php if(have_posts()):?>
          <?php while(have_posts()):the_post();?>
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
          'prev_text' => __( 'Previous page', '＜' ),
          'next_text' => __( '＞' ),
        ) ); ?>
        
        <div class="ffEn">
          <nav class="navigation pagination" role="navigation">
            <h2 class="screen-reader-text">投稿ナビゲーション</h2>
            <div class="nav-links">
              <a class="prev page-numbers" href="">＜</a>
              <a class="page-numbers" href="">1</a>
              <span class="page-numbers current">2</span>
              <a class="page-numbers" href="">3</a>
              <span class="page-numbers dots">…</span>
              <a class="page-numbers" href="">99</a>
              <a class="next page-numbers" href="">＞</a>
            </div>
          </nav>
        </div>

      </div>
    </section>

  </main>
  <!-- //CONTAINER -->

    <?php get_footer(); ?>
    