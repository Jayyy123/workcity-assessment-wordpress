<?php
/**
 * The template for displaying search results pages
 */

get_header(); ?>

<div class="container">
    <div class="site-content">
        <main id="main" class="site-main content-area">
            <?php if (have_posts()): ?>
                
                <header class="page-header">
                    <h1 class="page-title">
                        <?php printf(
                            esc_html__(
                                'Search Results for: %s',
                                'workcity-theme'
                            ),
                            '<span>' . get_search_query() . '</span>'
                        ); ?>
                    </h1>
                    <div class="search-results-count">
                        <?php
                        global $wp_query;
                        printf(
                            esc_html(
                                _n(
                                    '%s result found',
                                    '%s results found',
                                    $wp_query->found_posts,
                                    'workcity-theme'
                                )
                            ),
                            number_format_i18n($wp_query->found_posts)
                        );
                        ?>
                    </div>
                </header>

                <?php while (have_posts()):
                    the_post(); ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h2 class="entry-title post-title">
                                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                            </h2>

                            <?php if ('post' === get_post_type()): ?>
                                <div class="entry-meta post-meta">
                                    <span class="posted-on">
                                        Posted on <?php echo get_the_date(); ?>
                                    </span>
                                    <span class="byline">
                                        by <?php the_author(); ?>
                                    </span>
                                    <?php if (has_category()): ?>
                                        <span class="cat-links">
                                            in <?php the_category(', '); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </header>

                        <div class="entry-content post-content">
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="read-more">Read More &raquo;</a>
                        </div>
                    </article>

                <?php
                endwhile; ?>

                <?php the_posts_navigation(); ?>

            <?php else: ?>
                
                <article class="no-results not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php esc_html_e(
                            'Nothing Found',
                            'workcity-theme'
                        ); ?></h1>
                    </header>

                    <div class="page-content">
                        <p><?php esc_html_e(
                            'Sorry, but nothing matched your search terms. Please try again with some different keywords.',
                            'workcity-theme'
                        ); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                </article>

            <?php endif; ?>
        </main>

        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?> 