<?php
/*
 * Template Name: Home template
 */
?>

<?php get_header(); ?>

<main id="main" class="page-main" role="main">

    <div class="page-decoration">
        <div class="page-decoration__container">
            <span class="page-decoration__line"></span>
            <span class="page-decoration__line"></span>
            <span class="page-decoration__line"></span>
            <span class="page-decoration__line"></span>
            <span class="page-decoration__line"></span>
            <span class="page-decoration__line"></span>
        </div>
    </div>

    <?php get_template_part('template-parts/sections/section-hero'); ?>

    <!-- section-providing -->
    <div class="section-providing">
        <div class="section-providing__inner parallax-js--image" style="background-image: url(<?php the_field('section_providing'); ?>)">
            <div class="page-container">
                <div class="headline">
                    <span class="headline-decoration"></span>
                    <h2 class="headline-content"><?php the_field('section_providing_headline'); ?></h2>
                </div>

                <div class="providing-container">
                    <?php
                    if( have_rows('section_providing_items') ):
                        while ( have_rows('section_providing_items') ) : the_row(); ?>
                            <div class="providing-item">
                                <div class="providing-wrapper">
                                    <img src="<?php the_sub_field('section_providing_item_icon'); ?>" alt="<?php the_sub_field('section_providing_item_icon'); ?>" class="style-svg providing-icon">
                                </div>
                                <div class="providing-headliner"><?php the_sub_field('section_providing_item_headline') ?></div>
                                <div class="providing-description"><?php the_sub_field('section_providing_item_description'); ?></div>
                            </div>
                        <?php endwhile;
                    endif;

                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- keep-exploring -->
    <div class="keep-exploring" style="background-image: url(<?php the_field('keep-exploring_background_image'); ?>">
        <div class="page-container">
            <div class="headline headline_center">
                <span class="headline-decoration"></span>
                <h2 class="headline-content"><?php the_field('keep-exploring_headline'); ?></h2>
            </div>
        </div>

        <div class="exploring-slider" id="exploring-slider" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="300" data-aos-offset="0">
            <?php
            $count = 0;
            $delay = 0;
            if( have_rows('keep-exploring_items') ):
                while ( have_rows('keep-exploring_items') ) : the_row();
                    $count++;
                    if($count <= 7) {
                        $delay = $delay + 250;
                    } else {
                        $delay = 0;
                    }
                    $link = get_sub_field('keep_exploring_item_link');
                    $image = get_sub_field('keep_exploring_item_image');
                    $headline = get_sub_field('keep_exploring_item_headline');
                    $description = get_sub_field('keep_exploring_item_description'); ?>

                    <a href="<?php echo $link; ?>" class="exploring-item" data-aos="fade-left" data-aos-delay="<?php echo $delay; ?>">
                        <div class="exploring-item__inner" style="background-image: url(<?php echo $image; ?>)">
                            <div class="exploring-item__content">
                                <h4 class="exploring-item__headline"><?php echo $headline; ?></h4>
                                <div class="exploring-item__description"><?php echo $description; ?></div>
                            </div>

                            <?php get_template_part('template-parts/sections/template-elements/nav-action'); ?>
                        </div>
                    </a>

                <?php endwhile;
            endif; ?>
        </div>
    </div>

    <!-- section-stories -->
    <div class="section-stories">
        <div class="stories-container">
            <?php
            $args = array(
                'post_type' => 'stories',
                'posts_per_page' => '5',
                'paged' => 1,
            );
            $start_posts = new WP_Query( $args ); ?>

            <div class="stories-wrapper">
                <div class="stories-wrapper__inner">

                    <?php $dots_titles = array(); ?>
                    <div class="stories-slider" id="stories-slider">
                        <?php $read_more_btn = get_field('section_stories_read_more_btn'); ?>
                        <?php while ( $start_posts->have_posts() ) : $start_posts->the_post(); ?>
                            <?php
                            $image = get_the_post_thumbnail_url();
                            if(!$image) {
                                $image = get_template_directory_uri().'/src/assets/images/stories-post-image-temp.jpg';
                            }

                            $title = get_the_title();
                            $cropp_title = content_excerpt( array('maxchar'=>50, 'text'=>$title) );
                            ?>

                            <div class="stories-item" data-title="<?php echo $cropp_title; ?>">
                                <div class="stories-item__inner" style="background-image: url(<?php echo $image; ?>)">
                                    <div class="stories-item__wrapper">
                                        <div class="stories-item__content">
                                            <h2 class="stories-item__headline">
                                                <?php echo content_excerpt( array('maxchar'=>100, 'text'=>$title) ); ?>
                                            </h2>

                                            <p class="stories-item__description">
                                                <?php
                                                    $content = get_the_content();
                                                    echo content_excerpt( array('maxchar'=>180, 'text'=>$content) );
                                                ?>
                                            </p>
                                            <a href="<?php the_permalink(); ?>" class="stories-item__link"><?php echo $read_more_btn; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $title = get_the_title();
                            array_push($dots_titles, $title);
                            ?>
                        <?php endwhile; ?>
                        <?php wp_reset_query(); ?>
                    </div>

                    <div class="slider-progress">
                        <div class="progress"></div>
                    </div>

                    <a href="<?php echo get_site_url(); ?>/stories" class="btn btn_stories"><?php the_field('section_stories_view_all_btn'); ?></a>
                </div>

                <a href="<?php echo get_site_url(); ?>/stories" class="btn btn_stories-mobile"><?php the_field('section_stories_view_all_btn'); ?></a>
            </div>
        </div>
    </div>


</main>

<?php get_footer(); ?>
