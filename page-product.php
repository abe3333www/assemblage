<?php
/*
Template Name:　PRODUCTテンプレート
*/
get_header(); ?>
    <!-- CONTAINER -->
    <main id="MAIN" class="">
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; ?>
        <?php else : ?>

        <div class="article__ttl ffEn">
            <h1>記事が見つかりませんでした。</h1>
        <h2 class="archive__noText"></h2>
        <?php endif; ?>
    </main>
    <!-- /CONTAINER -->
<?php get_footer(); ?>