<?php
/**
 * Header Template
 *
 * @package Union_Arquitetura
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <!-- Logo -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <span class="site-title"><?php bloginfo('name'); ?></span>
            <?php endif; ?>
        </a>
        
        <!-- Navigation -->
        <nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Menu Principal', 'union-arquitetura'); ?>">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class'     => 'nav-menu',
                'container'      => false,
                'fallback_cb'    => 'union_fallback_menu',
            ));
            ?>
        </nav>

        <!-- Mobile Menu Button -->
        <button class="mobile-menu-toggle" aria-label="<?php esc_attr_e('Abrir menu', 'union-arquitetura'); ?>">
            <span class="hamburger"></span>
        </button>
    </div>
</header>

<!-- Mobile Navigation -->
<nav class="mobile-navigation" id="mobile-nav" aria-hidden="true">
    <div class="container">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class'     => 'mobile-nav-menu',
            'container'      => false,
        ));
        ?>
    </div>
</nav>

<main id="main-content" class="site-main">
