<?php get_header(); ?>

<main class="fullWidth">
<nav class="breadcrumb"><a href="<?php echo esc_url( home_url('/') ); ?>">HOME</a><span><?php the_title(); ?></span></nav>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; ?>
<?php else : ?>
<h2 class="archive__noText">記事が見つかりませんでした。</h2>
<?php endif; ?>
</main>
<?php get_footer(); ?>