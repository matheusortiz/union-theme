<?php
/**
 * Footer Template
 *
 * @package Union_Arquitetura
 */
?>

</main><!-- #main-content -->

<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <!-- Copyright -->
            <div class="footer-copyright">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Todos os direitos reservados.</p>
            </div>

            <!-- Social Links -->
            <?php $social_links = union_get_social_links(); ?>
            <?php if (!empty($social_links)) : ?>
                <div class="social-links">
                    <?php foreach ($social_links as $network => $url) : ?>
                        <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer">
                            <?php echo ucfirst($network); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div class="social-links">
                    <a href="#">Instagram</a>
                    <a href="#">LinkedIn</a>
                    <a href="#">Behance</a>
                </div>
            <?php endif; ?>
        </div>

        <!-- Footer Navigation (optional) -->
        <?php if (has_nav_menu('footer')) : ?>
            <nav class="footer-navigation" aria-label="<?php esc_attr_e('Menu do Rodapé', 'union-arquitetura'); ?>">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class'     => 'footer-menu',
                    'container'      => false,
                    'depth'          => 1,
                ));
                ?>
            </nav>
        <?php endif; ?>

        <!-- Footer Widgets -->
        <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2')) : ?>
            <div class="footer-widgets">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <div class="footer-widget-area">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <div class="footer-widget-area">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
