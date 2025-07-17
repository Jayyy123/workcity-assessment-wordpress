<?php
/**
 * The main template file
 */

get_header(); ?>

<div class="container">
    <div class="site-content">
        <main id="main" class="site-main content-area">
            <?php if (have_posts()): ?>
                
                <header class="page-header">
                    <?php if (is_home() && !is_front_page()): ?>
                        <h1 class="page-title"><?php single_post_title(); ?></h1>
                    <?php endif; ?>
                </header>

                <?php while (have_posts()):
                    the_post(); ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php if (is_singular()): ?>
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                            <?php else: ?>
                                <h2 class="entry-title post-title">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                </h2>
                            <?php endif; ?>

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
                            <?php if (is_singular()) {
                                the_content();
                            } else {
                                the_excerpt(); ?>
                                <p><a href="<?php the_permalink(); ?>" class="read-more">Read More &raquo;</a></p>
                                <?php
                            } ?>
                        </div>
                    </article>

                <?php
                endwhile; ?>

                <?php the_posts_navigation(); ?>

            <?php else: ?>
                
                <article class="no-results not-found">
                    <header class="page-header">
                        <h1 class="page-title">Nothing Found</h1>
                    </header>

                    <div class="page-content">
                        <?php if (is_search()): ?>
                            <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
                            <?php get_search_form(); ?>
                        <?php else: ?>
                            <p>It seems we can't find what you're looking for. Perhaps searching can help.</p>
                            <?php get_search_form(); ?>
                        <?php endif; ?>
                    </div>
                </article>

            <?php endif; ?>
        </main>

        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?> 