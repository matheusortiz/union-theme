<?php
/**
 * Main Index Template
 *
 * @package Union_Arquitetura
 */

get_header();
?>

<section class="section" style="padding-top: 10rem;">
    <div class="container">
        <div class="section-header">
            <p class="section-label">BLOG</p>
            <h1 class="section-title">Insights</h1>
        </div>
        
        <?php if (have_posts()) : ?>
            <div class="blog-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article <?php post_class('blog-card'); ?>>
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('portfolio-thumb', array('class' => 'blog-image')); ?>
                            <?php else : ?>
                                <div class="blog-image" style="background-color: #e5e5e5;"></div>
                            <?php endif; ?>
                            
                            <div class="blog-meta">
                                <span><?php echo get_the_date('d M Y'); ?></span>
                                <span> • </span>
                                <span><?php echo union_reading_time(); ?></span>
                            </div>
                            
                            <h2 class="blog-title"><?php the_title(); ?></h2>
                            
                            <p class="blog-excerpt"><?php echo get_the_excerpt(); ?></p>
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <!-- Pagination -->
            <div class="pagination" style="margin-top: 4rem; text-align: center;">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '← Anterior',
                    'next_text' => 'Próximo →',
                ));
                ?>
            </div>
            
        <?php else : ?>
            <p><?php _e('Nenhum post encontrado.', 'union-arquitetura'); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>

<?php
/**
 * Calculate reading time
 */
function union_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    
    if ($reading_time == 1) {
        return '1 min de leitura';
    } else {
        return $reading_time . ' min de leitura';
    }
}
?>
