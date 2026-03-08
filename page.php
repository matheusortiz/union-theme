<?php
/**
 * Page Template
 *
 * @package Union_Arquitetura
 */

get_header();
?>

<?php while (have_posts()) : the_post(); ?>

<article <?php post_class(); ?>>
    <header class="page-header" style="padding-top: 10rem; padding-bottom: 4rem;">
        <div class="container">
            <h1 style="font-size: clamp(3rem, 8vw, 6rem); font-weight: 300; letter-spacing: -0.02em; line-height: 1.1;">
                <?php the_title(); ?>
            </h1>
        </div>
    </header>
    
    <?php if (has_post_thumbnail()) : ?>
        <div class="page-featured-image" style="margin-bottom: 4rem;">
            <div class="container">
                <?php the_post_thumbnail('hero-image', array('style' => 'width: 100%; height: auto;')); ?>
            </div>
        </div>
    <?php endif; ?>
    
    <div class="page-content" style="padding-bottom: 8rem;">
        <div class="container">
            <div style="max-width: 48rem; font-size: 1.125rem; line-height: 1.8; color: var(--muted-foreground);">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</article>

<?php endwhile; ?>

<?php get_footer(); ?>
