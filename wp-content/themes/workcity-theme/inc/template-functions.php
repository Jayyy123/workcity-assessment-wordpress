<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 */

/**
 * Adds custom classes to the array of body classes.
 */
function workcity_theme_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'workcity_theme_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function workcity_theme_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf(
            '<link rel="pingback" href="%s">',
            esc_url(get_bloginfo('pingback_url'))
        );
    }
}
add_action('wp_head', 'workcity_theme_pingback_header');

/**
 * Custom excerpt length
 */
function workcity_theme_excerpt_length($length)
{
    return 25;
}
add_filter('excerpt_length', 'workcity_theme_excerpt_length');

/**
 * Custom excerpt more
 */
function workcity_theme_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'workcity_theme_excerpt_more');
