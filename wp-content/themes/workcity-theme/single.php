<?php
/**
 * The template for displaying all single posts
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
                        <?php
                        the_content(
                            sprintf(
                                wp_kses(
                                    __(
                                        'Continue reading<span class="screen-reader-text"> "%s"</span>',
                                        'workcity-theme'
                                    ),
                                    [
                                        'span' => [
                                            'class' => [],
                                        ],
                                    ]
                                ),
                                wp_kses_post(get_the_title())
                            )
                        );

                        wp_link_pages([
                            'before' =>
                                '<div class="page-links">' .
                                esc_html__('Pages:', 'workcity-theme'),
                            'after' => '</div>',
                        ]);
                        ?>
                    </div>

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
                </article>

                <?php
                if (comments_open() || get_comments_number()):
                    comments_template();
                endif;

                the_post_navigation([
                    'prev_text' =>
                        '<span class="nav-subtitle">' .
                        esc_html__('Previous:', 'workcity-theme') .
                        '</span> <span class="nav-title">%title</span>',
                    'next_text' =>
                        '<span class="nav-subtitle">' .
                        esc_html__('Next:', 'workcity-theme') .
                        '</span> <span class="nav-title">%title</span>',
                ]);

            endwhile; ?>
        </main>

        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?> 