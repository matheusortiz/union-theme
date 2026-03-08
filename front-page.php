<?php
/**
 * Front Page Template
 *
 * @package Union_Arquitetura
 */

get_header();

$hero_title = get_theme_mod('hero_title', 'ARQUITETURA & ENGENHARIA');
$hero_subtitle = get_theme_mod('hero_subtitle', 'Criando espaços que inspiram através de design inteligente e qualidade incomparável');
$hero_bg = get_theme_mod('hero_background');
?>

<!-- Hero Section -->
<section class="hero-section">
    <?php if ($hero_bg) : ?>
        <div class="hero-background" style="background-image: url('<?php echo esc_url($hero_bg); ?>')"></div>
    <?php else : ?>
        <div class="hero-background" style="background-color: #1a1a1a;"></div>
    <?php endif; ?>
    
    <div class="hero-overlay"></div>
    
    <div class="hero-content">
        <h1 class="hero-title reveal">
            <?php echo nl2br(esc_html($hero_title)); ?>
        </h1>
        <p class="hero-subtitle reveal-delayed">
            <?php echo esc_html($hero_subtitle); ?>
        </p>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="scroll-indicator reveal-delayed">
        <div class="scroll-line"></div>
        <span class="scroll-text">SCROLL</span>
    </div>
</section>

<!-- Services Section -->
<section class="section section-services">
    <div class="container">
        <div class="section-header">
            <p class="section-label">SERVIÇOS</p>
            <h2 class="section-title">O Que Fazemos</h2>
        </div>
        
        <div class="services-grid">
            <?php
            $services = new WP_Query(array(
                'post_type'      => 'servico',
                'posts_per_page' => 4,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ));
            
            if ($services->have_posts()) :
                $count = 1;
                while ($services->have_posts()) : $services->the_post();
            ?>
                <div class="service-item">
                    <span class="service-number"><?php echo str_pad($count, 2, '0', STR_PAD_LEFT); ?></span>
                    <div class="service-content">
                        <h3 class="service-title"><?php the_title(); ?></h3>
                        <p class="service-description"><?php echo get_the_excerpt(); ?></p>
                    </div>
                </div>
            <?php
                $count++;
                endwhile;
                wp_reset_postdata();
            else :
                // Fallback services
                $default_services = array(
                    array('title' => 'RESIDENCIAL', 'desc' => 'Criamos lares que refletem estilos de vida individuais, mantendo a integridade arquitetônica'),
                    array('title' => 'COMERCIAL', 'desc' => 'Projetamos espaços funcionais que aprimoram ambientes empresariais e experiências dos usuários'),
                    array('title' => 'REFORMAS', 'desc' => 'Transformamos estruturas existentes com sensibilidades contemporâneas e práticas sustentáveis'),
                    array('title' => 'CONSULTORIA', 'desc' => 'Oferecemos orientação especializada em direção de design, planejamento e soluções arquitetônicas'),
                );
                foreach ($default_services as $index => $service) :
            ?>
                <div class="service-item">
                    <span class="service-number"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></span>
                    <div class="service-content">
                        <h3 class="service-title"><?php echo esc_html($service['title']); ?></h3>
                        <p class="service-description"><?php echo esc_html($service['desc']); ?></p>
                    </div>
                </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section class="section section-portfolio" style="background-color: var(--muted);">
    <div class="container">
        <div class="section-header">
            <p class="section-label">PORTFÓLIO</p>
            <h2 class="section-title">Projetos Selecionados</h2>
        </div>
        
        <div class="portfolio-grid">
            <?php
            $projects = new WP_Query(array(
                'post_type'      => 'projeto',
                'posts_per_page' => 6,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ));
            
            if ($projects->have_posts()) :
                while ($projects->have_posts()) : $projects->the_post();
                    $categories = get_the_terms(get_the_ID(), 'categoria_projeto');
                    $category_name = $categories ? $categories[0]->name : '';
            ?>
                <a href="<?php the_permalink(); ?>" class="portfolio-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('portfolio-thumb', array('class' => 'portfolio-image')); ?>
                    <?php else : ?>
                        <div class="portfolio-image" style="background-color: #ccc;"></div>
                    <?php endif; ?>
                    
                    <div class="portfolio-overlay">
                        <div class="portfolio-info">
                            <h3 class="portfolio-title"><?php the_title(); ?></h3>
                            <?php if ($category_name) : ?>
                                <span class="portfolio-category"><?php echo esc_html($category_name); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <p class="no-projects"><?php _e('Nenhum projeto encontrado.', 'union-arquitetura'); ?></p>
            <?php endif; ?>
        </div>
        
        <div style="display: flex; justify-content: center; margin-top: 4rem;">
            <a href="<?php echo esc_url(get_post_type_archive_link('projeto')); ?>" class="btn">
                CONHEÇA OUTROS PROJETOS
            </a>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="section section-about">
    <div class="container">
        <div class="contact-grid">
            <div>
                <p class="section-label">SOBRE</p>
                <h2 class="section-title" style="margin-bottom: 3rem;">Filosofia de Design</h2>
                
                <p style="font-size: 1.125rem; color: var(--muted-foreground); line-height: 1.8; margin-bottom: 2rem;">
                    Acreditamos que a arquitetura deve melhorar a experiência humana enquanto respeita 
                    o ambiente natural. Nossa prática foca em criar espaços que são 
                    funcionais e poéticos.
                </p>
                
                <p style="font-size: 1.125rem; color: var(--muted-foreground); line-height: 1.8;">
                    Fundada em 2015, a Union completou mais de 200 projetos nos setores 
                    residencial, comercial e cultural. Cada projeto começa com 
                    escuta atenta e termina com execução cuidadosa.
                </p>
            </div>
            
            <div>
                <p class="section-label" style="margin-bottom: 1.5rem;">ABORDAGEM</p>
                
                <div style="margin-bottom: 1.5rem; padding-left: 1.5rem; border-left: 2px solid var(--foreground);">
                    <h4 style="font-size: 1.125rem; font-weight: 500; margin-bottom: 0.5rem;">Pesquisa</h4>
                    <p style="color: var(--muted-foreground);">Compreensão profunda de contexto, cultura e clima</p>
                </div>
                
                <div style="margin-bottom: 1.5rem; padding-left: 1.5rem; border-left: 2px solid var(--foreground);">
                    <h4 style="font-size: 1.125rem; font-weight: 500; margin-bottom: 0.5rem;">Colaboração</h4>
                    <p style="color: var(--muted-foreground);">Parceria próxima com clientes, engenheiros e artesãos</p>
                </div>
                
                <div style="padding-left: 1.5rem; border-left: 2px solid var(--foreground);">
                    <h4 style="font-size: 1.125rem; font-weight: 500; margin-bottom: 0.5rem;">Inovação</h4>
                    <p style="color: var(--muted-foreground);">Materiais sustentáveis e soluções de design inovadoras</p>
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--border);">
                    <div>
                        <p class="section-label">FUNDAÇÃO</p>
                        <p style="font-size: 1.25rem;">2015</p>
                    </div>
                    <div>
                        <p class="section-label">PROJETOS</p>
                        <p style="font-size: 1.25rem;">200+</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="section section-contact" style="background-color: var(--muted);">
    <div class="container">
        <div class="contact-grid">
            <div>
                <p class="section-label">ENTRE EM CONTATO</p>
                <h2 class="section-title" style="margin-bottom: 3rem;">
                    Vamos Criar Algo<br>Extraordinário
                </h2>
                
                <div class="contact-info">
                    <p class="contact-label">E-MAIL</p>
                    <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'eng.luana@unionengenharia.com')); ?>" class="contact-value">
                        <?php echo esc_html(get_theme_mod('contact_email', 'eng.luana@unionengenharia.com')); ?>
                    </a>
                </div>
                
                <div class="contact-info">
                    <p class="contact-label">TELEFONE</p>
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('contact_phone', '+5542999003021'))); ?>" class="contact-value">
                        <?php echo esc_html(get_theme_mod('contact_phone', '(42) 99900-3021')); ?>
                    </a>
                </div>
                
                <div class="contact-info">
                    <p class="contact-label">ESCRITÓRIO</p>
                    <address class="contact-value" style="font-style: normal;">
                        <?php echo nl2br(esc_html(get_theme_mod('contact_address', "Rua 294, 157, Sala 01\nMeia Praia - Itapema/SC"))); ?>
                    </address>
                </div>
            </div>
            
            <div>
                <p class="section-label" style="margin-bottom: 1.5rem;">SIGA-NOS</p>
                <div style="margin-bottom: 3rem;">
                    <a href="#" style="display: block; font-size: 1.25rem; color: var(--foreground); text-decoration: none; margin-bottom: 1rem;">Instagram</a>
                </div>

                <div style="margin-bottom: 3rem;">
                    <p class="section-label" style="margin-bottom: 1rem;">WHATSAPP</p>
                    <a href="https://wa.me/5542999003021" target="_blank" rel="noopener noreferrer" class="btn">
                        FALE CONOSCO
                    </a>
                </div>
                
                <div style="padding-top: 3rem; border-top: 1px solid var(--border);">
                    <p style="color: var(--muted-foreground); line-height: 1.8;">
                        Abordamos cada projeto com curiosidade, rigor e compromisso com a excelência. 
                        Nosso processo começa com a escuta, entendendo sua visão, e traduzindo-a 
                        em espaços que superam expectativas.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
