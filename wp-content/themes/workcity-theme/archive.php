<?php
/**
 * The template for displaying archive pages
 */

get_header(); ?>

<div class="container">
    <div class="site-content">
        <main id="main" class="site-main content-area">
            
            <!-- Archive Header -->
            <div class="dashboard-header">
                <h1>
                    <?php if (is_category()) {
                        single_cat_title();
                    } elseif (is_tag()) {
                        single_tag_title();
                    } elseif (is_author()) {
                        the_author();
                    } elseif (is_date()) {
                        echo get_the_date();
                    } else {
                        esc_html_e('Archives', 'workcity-theme');
                    } ?>
                </h1>
                <p>
                    <?php if (is_category()) {
                        echo category_description();
                    } elseif (is_tag()) {
                        echo tag_description();
                    } elseif (is_author()) {
                        echo get_the_author_meta('description');
                    } else {
                        esc_html_e(
                            'Browse through our collection of posts and articles.',
                            'workcity-theme'
                        );
                    } ?>
                </p>
            </div>

            <?php if (have_posts()): ?>
                
                <div class="activity-grid">
                    <?php while (have_posts()):
                        the_post(); ?>
                        
                        <article id="post-<?php the_ID(); ?>" <?php post_class(
    'post'
); ?>>
                            <header class="entry-header">
                                <h3 class="entry-title post-title">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                </h3>

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
                </div>

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
                            'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.',
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