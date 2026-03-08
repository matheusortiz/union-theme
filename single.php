<?php
/**
 * Single Post Template
 *
 * @package Union_Arquitetura
 */

get_header();
?>

<?php while (have_posts()) : the_post(); ?>

<article <?php post_class(); ?>>
    <!-- Hero -->
    <header class="post-hero" style="padding-top: 8rem; padding-bottom: 4rem;">
        <div class="container">
            <div style="max-width: 48rem; margin: 0 auto;">
                <!-- Categories -->
                <?php
                $categories = get_the_category();
                if ($categories) :
                ?>
                    <div style="margin-bottom: 1.5rem;">
                        <?php foreach ($categories as $category) : ?>
                            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" 
                               style="display: inline-block; background: var(--muted); padding: 0.5rem 1rem; font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase; text-decoration: none; color: var(--foreground); margin-right: 0.5rem;">
                                <?php echo esc_html($category->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <h1 style="font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 300; letter-spacing: -0.02em; line-height: 1.2; margin-bottom: 2rem;">
                    <?php the_title(); ?>
                </h1>
                
                <div style="display: flex; align-items: center; gap: 1rem; color: var(--muted-foreground); font-size: 0.875rem;">
                    <span><?php echo get_the_date('d M Y'); ?></span>
                    <span>•</span>
                    <span><?php echo union_reading_time(); ?></span>
                    <span>•</span>
                    <span><?php the_author(); ?></span>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Featured Image -->
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-featured-image" style="margin-bottom: 4rem;">
            <div class="container">
                <?php the_post_thumbnail('hero-image', array('style' => 'width: 100%; height: auto; max-height: 70vh; object-fit: cover;')); ?>
            </div>
        </div>
    <?php endif; ?>
    
    <!-- Content -->
    <div class="post-content" style="padding-bottom: 4rem;">
        <div class="container">
            <div style="max-width: 48rem; margin: 0 auto; font-size: 1.125rem; line-height: 1.8; color: var(--muted-foreground);">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    
    <!-- Tags -->
    <?php
    $tags = get_the_tags();
    if ($tags) :
    ?>
        <div class="post-tags" style="padding-bottom: 4rem;">
            <div class="container">
                <div style="max-width: 48rem; margin: 0 auto; display: flex; flex-wrap: wrap; gap: 0.5rem;">
                    <?php foreach ($tags as $tag) : ?>
                        <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" 
                           style="display: inline-block; border: 1px solid var(--border); padding: 0.5rem 1rem; font-size: 0.75rem; text-decoration: none; color: var(--muted-foreground); transition: var(--transition-fast);">
                            #<?php echo esc_html($tag->name); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
    <!-- Author Bio -->
    <div class="post-author" style="padding: 4rem 0; background: var(--muted);">
        <div class="container">
            <div style="max-width: 48rem; margin: 0 auto; display: flex; gap: 2rem; align-items: center;">
                <?php echo get_avatar(get_the_author_meta('ID'), 80, '', '', array('style' => 'border-radius: 50%;')); ?>
                <div>
                    <p style="font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--muted-foreground); margin-bottom: 0.5rem;">
                        ESCRITO POR
                    </p>
                    <h3 style="font-size: 1.25rem; font-weight: 500; margin-bottom: 0.5rem;">
                        <?php the_author(); ?>
                    </h3>
                    <?php if (get_the_author_meta('description')) : ?>
                        <p style="color: var(--muted-foreground); line-height: 1.6;">
                            <?php echo esc_html(get_the_author_meta('description')); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Post Navigation -->
    <div class="post-navigation" style="padding: 4rem 0; border-top: 1px solid var(--border);">
        <div class="container">
            <div style="max-width: 48rem; margin: 0 auto; display: flex; justify-content: space-between;">
                <?php
                $prev_post = get_previous_post();
                $next_post = get_next_post();
                ?>
                
                <div>
                    <?php if ($prev_post) : ?>
                        <p style="font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--muted-foreground); margin-bottom: 0.5rem;">
                            ← ANTERIOR
                        </p>
                        <a href="<?php echo get_permalink($prev_post); ?>" style="font-size: 1.125rem; text-decoration: none; color: var(--foreground);">
                            <?php echo esc_html($prev_post->post_title); ?>
                        </a>
                    <?php endif; ?>
                </div>
                
                <div style="text-align: right;">
                    <?php if ($next_post) : ?>
                        <p style="font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--muted-foreground); margin-bottom: 0.5rem;">
                            PRÓXIMO →
                        </p>
                        <a href="<?php echo get_permalink($next_post); ?>" style="font-size: 1.125rem; text-decoration: none; color: var(--foreground);">
                            <?php echo esc_html($next_post->post_title); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</article>

<!-- Related Posts -->
<?php
$related_posts = new WP_Query(array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post__not_in'   => array(get_the_ID()),
    'orderby'        => 'rand',
));

if ($related_posts->have_posts()) :
?>
<section class="section" style="background: var(--muted);">
    <div class="container">
        <div class="section-header">
            <p class="section-label">LEIA TAMBÉM</p>
            <h2 class="section-title">Posts Relacionados</h2>
        </div>
        
        <div class="blog-grid">
            <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                <article class="blog-card">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('portfolio-thumb', array('class' => 'blog-image')); ?>
                        <?php endif; ?>
                        
                        <div class="blog-meta">
                            <span><?php echo get_the_date('d M Y'); ?></span>
                        </div>
                        
                        <h3 class="blog-title"><?php the_title(); ?></h3>
                    </a>
                </article>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php 
wp_reset_postdata();
endif;
?>

<?php endwhile; ?>

<?php get_footer(); ?>
