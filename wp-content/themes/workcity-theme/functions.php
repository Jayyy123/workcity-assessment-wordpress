<?php
/**
 * WorkCity Theme functions and definitions
 */

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function workcity_theme_setup()
{
    load_theme_textdomain(
        'workcity-theme',
        get_template_directory() . '/languages'
    );

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'menu-1' => esc_html__('Primary', 'workcity-theme'),
    ]);

    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    add_theme_support(
        'custom-background',
        apply_filters('workcity_theme_custom_background_args', [
            'default-color' => 'ffffff',
            'default-image' => '',
        ])
    );

    add_theme_support('customize-selective-refresh-widgets');

    add_theme_support('custom-logo', [
        'height' => 250,
        'width' => 250,
        'flex-width' => true,
        'flex-height' => true,
    ]);
}
add_action('after_setup_theme', 'workcity_theme_setup');

/**
 * Set the content width in pixels
 */
function workcity_theme_content_width()
{
    $GLOBALS['content_width'] = apply_filters(
        'workcity_theme_content_width',
        640
    );
}
add_action('after_setup_theme', 'workcity_theme_content_width', 0);

/**
 * Register widget area.
 */
function workcity_theme_widgets_init()
{
    register_sidebar([
        'name' => esc_html__('Sidebar', 'workcity-theme'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'workcity-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]);
}
add_action('widgets_init', 'workcity_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function workcity_theme_scripts()
{
    wp_enqueue_style(
        'workcity-theme-style',
        get_stylesheet_uri(),
        [],
        _S_VERSION
    );
    wp_style_add_data('workcity-theme-style', 'rtl', 'replace');

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'workcity_theme_scripts');
