<?php
/**
 * Union Arquitetura Theme Functions
 *
 * @package Union_Arquitetura
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function union_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('customize-selective-refresh-widgets');

    // Register navigation menus
    register_nav_menus(array(
        'primary'   => __('Menu Principal', 'union-arquitetura'),
        'footer'    => __('Menu do Rodapé', 'union-arquitetura'),
    ));

    // Set content width
    if (!isset($content_width)) {
        $content_width = 1200;
    }
}
add_action('after_setup_theme', 'union_theme_setup');

/**
 * Enqueue Scripts and Styles
 */
function union_enqueue_scripts() {
    // Main stylesheet
    wp_enqueue_style(
        'union-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );

    // Google Fonts (optional - system fonts are used by default)
    // wp_enqueue_style(
    //     'union-fonts',
    //     'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap',
    //     array(),
    //     null
    // );

    // Main JavaScript
    wp_enqueue_script(
        'union-scripts',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('wp_enqueue_scripts', 'union_enqueue_scripts');

/**
 * Register Custom Post Types
 */
function union_register_post_types() {
    // Projects Custom Post Type
    register_post_type('projeto', array(
        'labels' => array(
            'name'               => __('Projetos', 'union-arquitetura'),
            'singular_name'      => __('Projeto', 'union-arquitetura'),
            'add_new'            => __('Adicionar Novo', 'union-arquitetura'),
            'add_new_item'       => __('Adicionar Novo Projeto', 'union-arquitetura'),
            'edit_item'          => __('Editar Projeto', 'union-arquitetura'),
            'new_item'           => __('Novo Projeto', 'union-arquitetura'),
            'view_item'          => __('Ver Projeto', 'union-arquitetura'),
            'search_items'       => __('Buscar Projetos', 'union-arquitetura'),
            'not_found'          => __('Nenhum projeto encontrado', 'union-arquitetura'),
            'not_found_in_trash' => __('Nenhum projeto na lixeira', 'union-arquitetura'),
        ),
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => array('slug' => 'projetos'),
        'menu_icon'     => 'dashicons-building',
        'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'  => true,
    ));

    // Project Categories
    register_taxonomy('categoria_projeto', 'projeto', array(
        'labels' => array(
            'name'              => __('Categorias de Projeto', 'union-arquitetura'),
            'singular_name'     => __('Categoria de Projeto', 'union-arquitetura'),
            'search_items'      => __('Buscar Categorias', 'union-arquitetura'),
            'all_items'         => __('Todas as Categorias', 'union-arquitetura'),
            'edit_item'         => __('Editar Categoria', 'union-arquitetura'),
            'update_item'       => __('Atualizar Categoria', 'union-arquitetura'),
            'add_new_item'      => __('Adicionar Nova Categoria', 'union-arquitetura'),
            'new_item_name'     => __('Nome da Nova Categoria', 'union-arquitetura'),
        ),
        'hierarchical'  => true,
        'rewrite'       => array('slug' => 'categoria-projeto'),
        'show_in_rest'  => true,
    ));

    // Services Custom Post Type
    register_post_type('servico', array(
        'labels' => array(
            'name'               => __('Serviços', 'union-arquitetura'),
            'singular_name'      => __('Serviço', 'union-arquitetura'),
            'add_new'            => __('Adicionar Novo', 'union-arquitetura'),
            'add_new_item'       => __('Adicionar Novo Serviço', 'union-arquitetura'),
            'edit_item'          => __('Editar Serviço', 'union-arquitetura'),
            'new_item'           => __('Novo Serviço', 'union-arquitetura'),
            'view_item'          => __('Ver Serviço', 'union-arquitetura'),
            'search_items'       => __('Buscar Serviços', 'union-arquitetura'),
            'not_found'          => __('Nenhum serviço encontrado', 'union-arquitetura'),
        ),
        'public'        => true,
        'has_archive'   => false,
        'rewrite'       => array('slug' => 'servicos'),
        'menu_icon'     => 'dashicons-hammer',
        'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
        'show_in_rest'  => true,
    ));
}
add_action('init', 'union_register_post_types');

/**
 * Register Widget Areas
 */
function union_widgets_init() {
    register_sidebar(array(
        'name'          => __('Rodapé 1', 'union-arquitetura'),
        'id'            => 'footer-1',
        'description'   => __('Widgets do rodapé coluna 1', 'union-arquitetura'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Rodapé 2', 'union-arquitetura'),
        'id'            => 'footer-2',
        'description'   => __('Widgets do rodapé coluna 2', 'union-arquitetura'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'union_widgets_init');

/**
 * Customizer Settings
 */
function union_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('union_hero', array(
        'title'    => __('Seção Hero', 'union-arquitetura'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('hero_title', array(
        'default'           => 'ARQUITETURA & ENGENHARIA',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label'   => __('Título do Hero', 'union-arquitetura'),
        'section' => 'union_hero',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'Criando espaços que inspiram através de design inteligente e qualidade incomparável',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_subtitle', array(
        'label'   => __('Subtítulo do Hero', 'union-arquitetura'),
        'section' => 'union_hero',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('hero_background', array(
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background', array(
        'label'   => __('Imagem de Fundo do Hero', 'union-arquitetura'),
        'section' => 'union_hero',
    )));

    // Contact Information
    $wp_customize->add_section('union_contact', array(
        'title'    => __('Informações de Contato', 'union-arquitetura'),
        'priority' => 35,
    ));

    $wp_customize->add_setting('contact_email', array(
        'default'           => 'contato@unionarq.com.br',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('contact_email', array(
        'label'   => __('E-mail', 'union-arquitetura'),
        'section' => 'union_contact',
        'type'    => 'email',
    ));

    $wp_customize->add_setting('contact_phone', array(
        'default'           => '+55 (11) 99999-9999',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_phone', array(
        'label'   => __('Telefone', 'union-arquitetura'),
        'section' => 'union_contact',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('contact_address', array(
        'default'           => 'Av. Paulista, 1234, São Paulo, SP',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_address', array(
        'label'   => __('Endereço', 'union-arquitetura'),
        'section' => 'union_contact',
        'type'    => 'textarea',
    ));

    // Social Links
    $wp_customize->add_section('union_social', array(
        'title'    => __('Redes Sociais', 'union-arquitetura'),
        'priority' => 40,
    ));

    $social_networks = array('instagram', 'linkedin', 'behance', 'facebook');
    
    foreach ($social_networks as $network) {
        $wp_customize->add_setting("social_{$network}", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control("social_{$network}", array(
            'label'   => ucfirst($network),
            'section' => 'union_social',
            'type'    => 'url',
        ));
    }
}
add_action('customize_register', 'union_customize_register');

/**
 * Helper function to get social links
 */
function union_get_social_links() {
    $networks = array('instagram', 'linkedin', 'behance', 'facebook');
    $links = array();
    
    foreach ($networks as $network) {
        $url = get_theme_mod("social_{$network}");
        if ($url) {
            $links[$network] = $url;
        }
    }
    
    return $links;
}

/**
 * Custom excerpt length
 */
function union_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'union_excerpt_length');

/**
 * Custom excerpt more
 */
function union_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'union_excerpt_more');

/**
 * Add custom image sizes
 */
function union_add_image_sizes() {
    add_image_size('portfolio-thumb', 600, 400, true);
    add_image_size('portfolio-large', 1200, 800, true);
    add_image_size('hero-image', 1920, 1080, true);
}
add_action('after_setup_theme', 'union_add_image_sizes');

/**
 * Disable Gutenberg for specific post types (optional)
 */
// function union_disable_gutenberg($current_status, $post_type) {
//     if ($post_type === 'servico') return false;
//     return $current_status;
// }
// add_filter('use_block_editor_for_post_type', 'union_disable_gutenberg', 10, 2);
