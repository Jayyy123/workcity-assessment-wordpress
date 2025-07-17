<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e(
        'Skip to content',
        'workcity-theme'
    ); ?></a>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="site-branding">
                <div>
                    <?php if (is_front_page() && is_home()): ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(
                                home_url('/')
                            ); ?>" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </h1>
                    <?php else: ?>
                        <p class="site-title">
                            <a href="<?php echo esc_url(
                                home_url('/')
                            ); ?>" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </p>
                    <?php endif; ?>
                    
                    <?php
                    $workcity_theme_description = get_bloginfo(
                        'description',
                        'display'
                    );
                    if (
                        $workcity_theme_description ||
                        is_customize_preview()
                    ): ?>
                        <p class="site-description"><?php echo $workcity_theme_description; ?></p>
                    <?php endif;
                    ?>
                </div>
            </div>
        </div>
    </header>

    <nav id="site-navigation" class="main-navigation">
        <div class="container">
            <?php wp_nav_menu([
                'theme_location' => 'menu-1',
                'menu_id' => 'primary-menu',
                'menu_class' => 'nav-menu',
                'fallback_cb' => 'workcity_theme_fallback_menu',
            ]); ?>
        </div>
    </nav>

<?php // Fallback menu function
function workcity_theme_fallback_menu()
{
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . home_url('/') . '">Home</a></li>';
    echo '<li><a href="' . home_url('/about/') . '">About</a></li>';
    echo '<li><a href="' . home_url('/contact/') . '">Contact</a></li>';
    echo '</ul>';
} ?> 