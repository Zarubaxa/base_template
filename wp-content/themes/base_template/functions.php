<?php


function create_recipes_posttype() {
    register_post_type( 'recipes',
        array(
            'labels' => array(
                'name' => __( 'Рецепты' ),
                'singular_name' => __( 'Рецепт' )
            ),
            'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', ),
            'public' => true,
            'taxonomies' => array( 'recipes' ),
            'has_archive' => true,
            'rewrite' => array('slug' => 'recipes'),
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
        )
    );
}
add_action( 'init', 'create_recipes_posttype' );

register_nav_menus(
    array(
        'head_menu' => 'Шапка', // id области => Название области
    )
);

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
function theme_name_scripts() {
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false );
    wp_enqueue_script( 'bootstrap-scripts', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), false, true );
    wp_enqueue_script( 'my-scripts', get_template_directory_uri() . '/js/main.js', array('jquery'), false, true );
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('style', get_stylesheet_uri());
}

// disable gutenberg frontend styles @ https://m0n.co/15
function disable_gutenberg_wp_enqueue_scripts() {

    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');

    wp_dequeue_style('wc-block-style'); // disable woocommerce frontend block styles
    wp_dequeue_style('storefront-gutenberg-blocks'); // disable storefront frontend block styles

}
add_filter('wp_enqueue_scripts', 'disable_gutenberg_wp_enqueue_scripts', 100);
add_theme_support( 'post-thumbnails' );
