<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>  
    <ul class="ba-home-post-list">
        <li class="ba-post-list-item">
            <div class="ba-post-list-wrapper">
                <header class="ba-post-list-header">

                    <?php
                    switch ($post_type) {
                        case 'news': ?>
                            <div class="ba-post-list-header-category ba-news"><span class="icon_news icon"></span>News & Notices</div>
                            <?php 
                            break;

                        case 'event': ?>
                            <div class="ba-post-list-header-category ba-event"><span class="icon_events icon"></span>Upcoming Event</div>
                            <?php 
                            break;

                        case 'gallery': ?>
                            <div class="ba-post-list-header-category ba-gallery"><span class="icon_gallery icon"></span>Gallery</div>
                            <?php 
                            break;
                        
                        default:
                            ?>
                            <div class="ba-post-list-header-category ba-<?php echo $post_type; ?>">News & Notices</div>
                            <?php 
                            break;
                    }
                    ?>

                    <div class="ba-post-list-header-date">
                        <span class="ba-post-list-header-date-month"><?php echo get_the_date('M'); ?></span>
                        <span class="ba-post-list-header-date-day"><?php echo get_the_date('j'); ?></span>
                    </div>
                </header>

                <div class="ba-post-list-content ba-single-content ba-<?php echo $post_type; ?>">
                    <div class="ba-post-list-description ba-page-content ba-container">
                        <h1 class="ba-post-list-title"><?php the_title(); ?></h1>
                        <?php the_field('description'); ?>
                    </div>
                    <div class="ba-page-content-aside ba-container">
                        <h4>Events Calendar</h4>

                        <h4>View More Posts</h4>
                        <a class="ba-post-type-link icon_news" href="<?php echo home_url(); ?>/news/">View all News</a>
                        <a class="ba-post-type-link icon_events" href="<?php echo home_url(); ?>/upcoming-event/">View all Events</a>
                        <a class="ba-post-type-link icon_gallery" href="<?php echo home_url(); ?>/gallery/">View all Galleries</a>
                    </div>
                </div>       
            </div> 
            <div class="ba-post-navigation">
                <?php
                $prev_post = get_previous_post();
                if (!empty( $prev_post )): ?>
                
                <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="ba-post-navigation-link ba-container">
                    <div class="ba-post-navigation-link-time">Older</div>
                    <div class="ba-post-navigation-link-title"><?php echo $prev_post->post_title; ?></div>
                </a>
                <?php endif; ?>
                <?php
                $next_post = get_next_post();
                if (!empty( $next_post )): ?>
                <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="ba-post-navigation-link ba-container">
                    <div class="ba-post-navigation-link-time">Newer</div>
                    <div class="ba-post-navigation-link-title"><?php echo $next_post->post_title; ?></div>
                </a>
            <?php endif; ?>
            </div>
        </li>
    </ul>
    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>