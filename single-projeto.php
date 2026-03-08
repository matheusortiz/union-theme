<?php
/**
 * Single Project Template
 *
 * @package Union_Arquitetura
 */

get_header();
?>

<?php while (have_posts()) : the_post(); 
    $categories = get_the_terms(get_the_ID(), 'categoria_projeto');
    $category_name = $categories ? $categories[0]->name : '';
?>

<article <?php post_class(); ?>>
    <!-- Hero -->
    <header class="project-hero" style="position: relative; height: 80vh; display: flex; align-items: flex-end; overflow: hidden;">
        <?php if (has_post_thumbnail()) : ?>
            <div style="position: absolute; inset: 0;">
                <?php the_post_thumbnail('hero-image', array('style' => 'width: 100%; height: 100%; object-fit: cover;')); ?>
            </div>
        <?php endif; ?>
        
        <div class="hero-overlay"></div>
        
        <div class="container" style="position: relative; z-index: 10; padding-bottom: 4rem;">
            <?php if ($category_name) : ?>
                <p style="font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.7); margin-bottom: 1rem;">
                    <?php echo esc_html($category_name); ?>
                </p>
            <?php endif; ?>
            
            <h1 style="font-size: clamp(2.5rem, 6vw, 5rem); font-weight: 300; color: #fff; letter-spacing: -0.02em; line-height: 1.1;">
                <?php the_title(); ?>
            </h1>
        </div>
    </header>
    
    <!-- Project Info -->
    <section class="project-info" style="padding: 4rem 0; border-bottom: 1px solid var(--border);">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 2rem;">
                <?php
                // You can use ACF or custom meta fields for these
                $project_info = array(
                    'CLIENTE' => get_post_meta(get_the_ID(), 'cliente', true) ?: 'Cliente Privado',
                    'LOCALIZAÇÃO' => get_post_meta(get_the_ID(), 'localizacao', true) ?: 'São Paulo, Brasil',
                    'ANO' => get_post_meta(get_the_ID(), 'ano', true) ?: get_the_date('Y'),
                    'ÁREA' => get_post_meta(get_the_ID(), 'area', true) ?: '500m²',
                );
                
                foreach ($project_info as $label => $value) :
                ?>
                    <div>
                        <p style="font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--muted-foreground); margin-bottom: 0.5rem;">
                            <?php echo esc_html($label); ?>
                        </p>
                        <p style="font-size: 1.125rem;">
                            <?php echo esc_html($value); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    
    <!-- Project Content -->
    <section class="project-content" style="padding: 6rem 0;">
        <div class="container">
            <div style="max-width: 48rem; margin: 0 auto 4rem; font-size: 1.25rem; line-height: 1.8; color: var(--muted-foreground);">
                <?php the_excerpt(); ?>
            </div>
            
            <div style="font-size: 1.125rem; line-height: 1.8;">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
    
    <!-- Project Gallery -->
    <?php
    $gallery = get_post_gallery(get_the_ID(), false);
    if ($gallery) :
        $gallery_ids = explode(',', $gallery['ids']);
    ?>
    <section class="project-gallery" style="padding: 4rem 0; background: var(--muted);">
        <div class="container">
            <div class="section-header">
                <p class="section-label">GALERIA</p>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem;">
                <?php foreach ($gallery_ids as $id) : ?>
                    <div>
                        <?php echo wp_get_attachment_image($id, 'portfolio-large', false, array('style' => 'width: 100%; height: auto;')); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    
    <!-- Project Navigation -->
    <section class="project-navigation" style="padding: 4rem 0; border-top: 1px solid var(--border);">
        <div class="container">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <?php
                $prev_project = get_adjacent_post(false, '', true, 'categoria_projeto');
                $next_project = get_adjacent_post(false, '', false, 'categoria_projeto');
                ?>
                
                <div>
                    <?php if ($prev_project) : ?>
                        <a href="<?php echo get_permalink($prev_project); ?>" style="text-decoration: none; color: var(--foreground);">
                            <p style="font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--muted-foreground); margin-bottom: 0.5rem;">
                                ← PROJETO ANTERIOR
                            </p>
                            <p style="font-size: 1.25rem;">
                                <?php echo esc_html($prev_project->post_title); ?>
                            </p>
                        </a>
                    <?php endif; ?>
                </div>
                
                <a href="<?php echo get_post_type_archive_link('projeto'); ?>" class="btn">
                    TODOS OS PROJETOS
                </a>
                
                <div style="text-align: right;">
                    <?php if ($next_project) : ?>
                        <a href="<?php echo get_permalink($next_project); ?>" style="text-decoration: none; color: var(--foreground);">
                            <p style="font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--muted-foreground); margin-bottom: 0.5rem;">
                                PRÓXIMO PROJETO →
                            </p>
                            <p style="font-size: 1.25rem;">
                                <?php echo esc_html($next_project->post_title); ?>
                            </p>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</article>

<?php endwhile; ?>

<?php get_footer(); ?>
