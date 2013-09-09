<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>  
    <ul class="ba-home-post-list">
        <li class="ba-post-list-item">
            <header class="ba-post-list-header">
                <?php
                switch ($post_type) {
                    case 'news': ?>
                        <div class="ba-post-list-header-category ba-news">News & Notices</div>
                        <?php 
                        break;

                    case 'event': ?>
                        <div class="ba-post-list-header-category ba-event">Upcoming Event</div>
                        <?php 
                        break;

                    case 'gallery': ?>
                        <div class="ba-post-list-header-category ba-gallery">Gallery</div>
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

            <div class="ba-post-list-content ba-<?php echo $post_type; ?>" <?php if($post_type === 'gallery') { ?> style="background: url(<?php the_field('featured_image'); ?>) no-repeat right top;"  <?php } ?>>
                <?php 
                if($post_type === 'event') { ?>
                <div class="ba-post-list-content-event-information">
                    <div class="ba-post-list-content-event-information-label">When:</div>
                    <div class="ba-post-list-content-event-information-specifics">
                        <span class="ba-post-list-content-event-information-specifics-day"><?php the_field('day'); ?>,</span>
                        <span class="ba-post-list-content-event-information-specifics-date"><?php the_field('date'); ?></span>
                        <span class="ba-post-list-content-event-information-specifics-time"><?php the_field('time'); ?></span>
                    </div>
                    <div class="ba-post-list-content-event-information-label">Where:</div>
                    <div class="ba-post-list-content-event-information-specifics"><?php the_field('where'); ?></div>
                </div>
                <?php
                }
                ?>

                <h3 class="ba-post-list-title"><?php the_title(); ?></h3>
                <div class="ba-post-list-description">
                    <?php echo substr( get_field('description'), 0, 180); ?>
                    <a class="ba-post-list-read-more-link" href="<?php the_permalink(); ?>">Read More</a>
                </div>
            </div>
            <div style="clear: both;"></div>
        </li>
    </ul>
    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>