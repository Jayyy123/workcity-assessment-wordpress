<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>

<div class="container">
    <div class="site-content">
        <main id="main" class="site-main content-area">
            <?php while (have_posts()):
                the_post(); ?>
                
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>

                    <div class="entry-content post-content">
                        <?php
                        the_content();

                        wp_link_pages([
                            'before' =>
                                '<div class="page-links">' .
                                esc_html__('Pages:', 'workcity-theme'),
                            'after' => '</div>',
                        ]);
                        ?>
                    </div>

                    <?php if (get_edit_post_link()): ?>
                        <footer class="entry-footer">
                            <?php edit_post_link(
                                sprintf(
                                    wp_kses(
                                        __(
                                            'Edit <span class="screen-reader-text">%s</span>',
                                            'workcity-theme'
                                        ),
                                        [
                                            'span' => [
                                                'class' => [],
                                            ],
                                        ]
                                    ),
                                    wp_kses_post(get_the_title())
                                ),
                                '<span class="edit-link">',
                                '</span>'
                            ); ?>
                        </footer>
                    <?php endif; ?>
                </article>

                <?php if (comments_open() || get_comments_number()):
                    comments_template();
                endif;
            endwhile; ?>
        </main>

        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?> 