<?php
/**
 * The main template file
 */

get_header(); ?>

<div class="container">
    <div class="site-content">
        <main id="main" class="site-main content-area">
            
            <!-- Dashboard Header -->
            <div class="dashboard-header">
                <h1>Welcome to WorkCity</h1>
                <p>Manage your projects and clients efficiently with our powerful dashboard</p>
            </div>

            <!-- Stats Grid -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">12</div>
                    <div class="stat-label">Active Projects</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">8</div>
                    <div class="stat-label">Total Clients</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">95%</div>
                    <div class="stat-label">Completion Rate</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">$45K</div>
                    <div class="stat-label">Revenue This Month</div>
                </div>
            </div>

            <!-- Action Cards -->
            <div class="action-grid">
                <div class="action-card">
                    <div class="action-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3>Manage Projects</h3>
                    <p>Create, track, and manage all your projects in one place. Monitor progress and deadlines efficiently.</p>
                    <a href="#" class="btn btn-primary">View Projects</a>
                </div>
                
                <div class="action-card">
                    <div class="action-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89317 18.7122 8.75608 18.1676 9.45768C17.623 10.1593 16.8604 10.6597 16 10.88" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3>Manage Clients</h3>
                    <p>Keep track of all your clients, their contact information, and project history in one organized system.</p>
                    <a href="#" class="btn btn-primary">View Clients</a>
                </div>
            </div>

            <!-- Recent Activity Section -->
            <div class="recent-activity">
                <h2>Recent Activity</h2>
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
                                                    in <?php the_category(
                                                        ', '
                                                    ); ?>
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
            </div>
        </main>

        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?> 