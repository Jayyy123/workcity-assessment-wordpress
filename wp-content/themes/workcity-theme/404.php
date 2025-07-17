<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

<div class="container">
    <div class="site-content">
        <main id="main" class="site-main content-area">
            <article class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e(
                        'Oops! That page can&rsquo;t be found.',
                        'workcity-theme'
                    ); ?></h1>
                </header>

                <div class="page-content">
                    <div class="error-404-content">
                        <div class="error-404-icon">
                            <svg width="120" height="120" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" fill="currentColor"/>
                            </svg>
                        </div>
                        
                        <p><?php esc_html_e(
                            'It looks like nothing was found at this location. Maybe try a search?',
                            'workcity-theme'
                        ); ?></p>
                        
                        <div class="error-404-actions">
                            <?php get_search_form(); ?>
                            
                            <div class="error-404-links">
                                <a href="<?php echo esc_url(
                                    home_url('/')
                                ); ?>" class="btn-primary">
                                    <?php esc_html_e(
                                        'Go to Homepage',
                                        'workcity-theme'
                                    ); ?>
                                </a>
                                
                                <a href="<?php echo esc_url(
                                    home_url('/blog/')
                                ); ?>" class="btn-secondary">
                                    <?php esc_html_e(
                                        'Browse Blog',
                                        'workcity-theme'
                                    ); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </main>

        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?> 