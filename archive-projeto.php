<?php
/**
 * Projects Archive Template
 *
 * @package Union_Arquitetura
 */

get_header();
?>

<section class="section" style="padding-top: 10rem;">
    <div class="container">
        <div class="section-header">
            <p class="section-label">PORTFÓLIO</p>
            <h1 class="section-title">Nossos Projetos</h1>
            <p style="max-width: 48rem; margin-top: 2rem; font-size: 1.25rem; color: var(--muted-foreground); line-height: 1.8;">
                Cada projeto conta uma história única de colaboração, inovação e atenção 
                meticulosa aos detalhes. Explore nosso portfólio de trabalhos selecionados.
            </p>
        </div>
        
        <!-- Category Filter -->
        <?php
        $categories = get_terms(array(
            'taxonomy'   => 'categoria_projeto',
            'hide_empty' => true,
        ));
        
        if (!empty($categories) && !is_wp_error($categories)) :
        ?>
        <div class="category-filter" style="margin-bottom: 4rem;">
            <div style="display: flex; flex-wrap: wrap; gap: 2rem; justify-content: center;">
                <a href="<?php echo get_post_type_archive_link('projeto'); ?>" 
                   class="filter-link <?php echo !is_tax() ? 'active' : ''; ?>"
                   style="font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase; text-decoration: none; color: <?php echo !is_tax() ? 'var(--foreground)' : 'var(--muted-foreground)'; ?>; border-bottom: <?php echo !is_tax() ? '1px solid var(--foreground)' : 'none'; ?>; padding-bottom: 0.25rem;">
                    TODOS
                </a>
                
                <?php foreach ($categories as $category) : ?>
                    <a href="<?php echo get_term_link($category); ?>" 
                       class="filter-link <?php echo is_tax('categoria_projeto', $category->slug) ? 'active' : ''; ?>"
                       style="font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase; text-decoration: none; color: <?php echo is_tax('categoria_projeto', $category->slug) ? 'var(--foreground)' : 'var(--muted-foreground)'; ?>; border-bottom: <?php echo is_tax('categoria_projeto', $category->slug) ? '1px solid var(--foreground)' : 'none'; ?>; padding-bottom: 0.25rem;">
                        <?php echo esc_html($category->name); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- Projects Grid -->
        <?php if (have_posts()) : ?>
            <div class="portfolio-grid">
                <?php while (have_posts()) : the_post(); 
                    $categories = get_the_terms(get_the_ID(), 'categoria_projeto');
                    $category_name = $categories ? $categories[0]->name : '';
                ?>
                    <a href="<?php the_permalink(); ?>" class="portfolio-item">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('portfolio-thumb', array('class' => 'portfolio-image')); ?>
                        <?php else : ?>
                            <div class="portfolio-image" style="background-color: #e5e5e5; height: 24rem;"></div>
                        <?php endif; ?>
                        
                        <div class="portfolio-overlay">
                            <div class="portfolio-info">
                                <h2 class="portfolio-title"><?php the_title(); ?></h2>
                                <?php if ($category_name) : ?>
                                    <span class="portfolio-category"><?php echo esc_html($category_name); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
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
            <p style="text-align: center; color: var(--muted-foreground);">
                <?php _e('Nenhum projeto encontrado.', 'union-arquitetura'); ?>
            </p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
