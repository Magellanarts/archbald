<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>  
    <ul class="ba-home-post-list">
        <li class="ba-post-list-item">
            <div class="ba-post-list-wrapper">

                <div class="ba-post-list-content ba-single-content ba-<?php echo $post_type; ?>">
                    <div class="ba-post-list-description ba-page-content ba-container">
                        <h1 class="ba-post-list-title"><?php the_title(); ?></h1>
                        
                        <div class="ba-post-content"><?php the_content(); ?></div>

                        <?php 
                        if(get_field('questions')) { ?>
                        <ul class="ba-accordion-list">
                        <?php   
                            while(has_sub_field('questions')){ ?>
                            <li>
                                <div class="ba-accordion-list-question" data-class="ba-accordion-list-question"><?php the_sub_field('question'); ?></div>
                                <div class="ba-accordion-list-answer" data-class="ba-accordion-list-answer"><?php the_sub_field('answer'); ?></div>
                            </li>
                        <?php
                            }   
                        ?>
                        </ul>
                        <?php
                        }
                        

                        ?>
                        


                        <?php 
                        if(get_field('subsections')) { ?>
                        
                        <?php   
                            while(has_sub_field('subsections')){ ?>
                            <div class="ba-sub-section" id="<?php the_sub_field('heading'); ?>">
                                <h3 class="ba-sub-section-heading"><?php the_sub_field('heading'); ?></h3>

                                <ul class="ba-sub-section-member-list">
                                <?php   
                                while(has_sub_field('members')){ ?>
                                    <li>
                                        <div class="ba-sub-section-member-title"><?php the_sub_field('position'); ?></div>
                                        <span class="ba-sub-section-member-detail"><?php the_sub_field('name'); ?></span>
                                        <?php 
                                        if(get_sub_field('phone')){ ?>
                                            <span class="ba-sub-section-member-detail"><?php the_sub_field('phone'); ?></span>
                                        <?php
                                        }
                                        ?>

                                        <?php 
                                        if(get_sub_field('email')){ ?>
                                            <a class="ba-sub-section-member-detail" href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a>
                                        <?php
                                        }
                                        ?>

                                        <?php 
                                        if(get_sub_field('committee')){ ?>
                                            <span class="ba-sub-section-member-detail"><?php the_sub_field('committee'); ?></span>
                                        <?php
                                        }
                                        ?>
                                    </li>
                                <?php 
                                }
                                ?>
                                </ul>
                            </div>
                        <?php
                            }   
                        }
                        


                        if(get_field('gallery')) { 
                $gallery =  get_field('gallery');
                            ?>
                        <div style="height: <?php echo $gallery[0]['image']['height']; ?>px" class="ba-page-gallery-wrap">
                            <div class="ba-page-gallery" data-class="ba-page-gallery">
                            <?php   
                                while(has_sub_field('gallery')){ 
                                    $image = get_sub_field('image'); 
                                   // print_r($image); ?>

                                <img height="<?php echo $image['height']; ?>" style="display:block;" src="<?php echo $image['url']; ?>" />
                            <?php 
                                }
                                ?>
                           
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <?php  }
                            ?>

                    </div>
                    <div class="ba-page-content-aside ba-container">
                        <h4>Skip Ahead</h4>

                        <?php 
                        if(get_field('subsections')) { ?>
                        <ul class="page-subsection-list" data-class="page-subsection-list">
                        <?php   
                            while(has_sub_field('subsections')){ ?>
                                <li><a data-class="page-subsection-list-link" href="#<?php the_sub_field('heading'); ?>" class="ba-sub-section-heading"><?php the_sub_field('heading'); ?></a></li>

                        <?php
                            }
                        } ?>
                        </ul>
                    </div>
                </div>       
            </div> 
        </li>
    </ul>
    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>