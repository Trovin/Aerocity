<?php
/*
 * Template Name: About template
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

    <div class="hero-justify section-hero__about">
        <?php get_template_part('template-parts/sections/section-hero'); ?>
    </div>

    <!-- section-anchor -->
    <div class="section-anchor" id="section-anchor">
        <div class="page-container page-container_anchor">
            <a class="anchor-link anchor-component__link" href="#section-history"><?php the_field('anchor_link_title'); ?></a>
            <a class="anchor-link anchor-component__link" href="#section-timeline"><?php the_field('anchor_link-2_title'); ?></a>
            <a class="anchor-link anchor-component__link" href="#about-team"><?php the_field('anchor_link-3_title'); ?></a>
            <a class="anchor-link anchor-component__link" href="#section-awards"><?php the_field('anchor_link-4_title'); ?></a>
        </div>
    </div>

    <!-- section-history -->
    <div class="section-history" id="section-history">
        <div class="page-container">
            <?php $counter = 0; ?>
            <?php if( have_rows('history_items') ): ?>
                <div class="history-items__container">
                    <?php while ( have_rows('history_items') ) : the_row(); ?>
                        <?php
                        $counter++;
                        $animation_name = 'fade-right';
                        ?>

                        <?php if($counter % 2 == 0) {
                            $animation_name = 'fade-left';
                        } ?>

                        <div class="history-item" data-aos="<?php echo $animation_name; ?>">
                            <img src="<?php the_sub_field('history_item_image'); ?>" class="history-item__image" alt="history-image">
                            <div class="history-item__content">
                                <?php $headline = get_sub_field('history_item_headline');
                                if($headline) : ?>
                                <div class="headline headline_history">
                                    <span class="headline-decoration"></span>
                                    <h2 class="headline-content"><?php the_sub_field('history_item_headline'); ?></h2>
                                </div>
                                <?php endif; ?>
                                <div class="history-item__description"><?php the_sub_field('history_item_description'); ?></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- section-timeline -->
    <div class="section-timeline" id="section-timeline" style="background-image: url(<?php the_field('section_timeline_background_image'); ?>)">
        <h2 class="section-timeline__headline"><?php the_field('section_timeline_headline'); ?></h2>

        <div class="timeline-wrapper">
            <div class="timeline-slider" id="timeline-slider">
                <?php
                if( have_rows('section_timeline_items') ):
                    while ( have_rows('section_timeline_items') ) : the_row(); ?>
                        <div class="timeline-item">
                            <div class="timeline-item__inner">
                                <?php
                                $height = get_sub_field('section_timeline_item_height');
                                $user_height = ($height * 4) + 90; ?>

                                <div class="timeline-item__inner-info" style="min-height: <?php echo $user_height.'px'; ?>">
                                    <div class="timeline-item__height" style="min-height: <?php echo $user_height.'px'; ?>"></div>

                                    <div class="timeline-item__date"><?php the_sub_field('section_timeline_item_date'); ?></div>
                                    <div class="timeline-item__description"><?php the_sub_field('section_timeline_item_description'); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>

            <div class="timeline-slider__control-wrapper">
                <div class="slider-control__control-nav timeline-slider__control-prev"><i class="fas fa-chevron-left"></i></div>
                <div class="slider-control__control-nav timeline-slider__control-next"><i class="fas fa-chevron-right"></i></div>
            </div>
        </div>
    </div>

    <!-- about-team -->
    <div class="about-team" id="about-team">
        <div class="about-team__inner" style="background-image: url(<?php the_field('about_team_background_image'); ?>)">
            <div class="page-container">
                <div class="headline headline_team">
                    <span class="headline-decoration"></span>
                    <h2 class="headline-content"><?php the_field('about_team_headline'); ?></h2>
                </div>

                <div class="about-team__wrapper">
                    <?php
                    $i;
                    if( have_rows('about_team_items') ):
                        while ( have_rows('about_team_items') ) : the_row();
                            $i++; ?>
                            <div class="about-team__item" data-team-modal="<?php echo $i; ?>">
                                <div class="about-team__person">
                                    <img src="<?php the_sub_field('about_team_person_photo'); ?>" class="about-team__person-photo" alt="teammate-photo">
                                    <div class="about-team__decoration"></div>
                                    <div class="about-team__person-info">
                                        <div class="about-team__person-name"><?php the_sub_field('about_team_person_name'); ?></div>
                                        <div class="about-team__person-position"><?php the_sub_field('about_team_person_position'); ?></div>
                                    </div>
                                </div>

                                <!-- modal block -->
                                <div class="modal modal-team modal-team_<?php echo $i++; ?>">
                                    <div class="modal-flex">
                                        <div class="modal-flex__inner">
                                            <div class="modal-team__inner">
                                                <img src="<?php the_sub_field('about_team_person_photo'); ?>" class="modal-team__person-photo" alt="teammate-photo">
                                                <div class="modal-team__person-info">
                                                    <div class="modal-item__nav team-item__nav-close">
                                                        <div class="modal-item__close-inner">
                                                            <span class="modal-item__nav-decoration"></span>
                                                            <span class="modal-item__nav-decoration"></span>
                                                        </div>
                                                    </div>

                                                    <div class="modal-team__person-name"><?php the_sub_field('about_team_person_name'); ?></div>
                                                    <div class="modal-team__person-position"><?php the_sub_field('about_team_person_position'); ?></div>
                                                    <div class="modal-team__person-description"><?php the_sub_field('about_team_person_info'); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- section-awards -->
    <div class="section-awards parallax-js--image2" id="section-awards" style="background-image: url(<?php the_field('section_awards_background_image'); ?>)">
        <div class="page-container page-container_awards">
            <div class="headline headline_awards">
                <span class="headline-decoration"></span>
                <h2 class="headline-content"><?php the_field('section_awards_headline'); ?></h2>
            </div>

            <div class="awards-wrapper">
                <?php
                if( have_rows('section_awards_items') ):
                    while ( have_rows('section_awards_items') ) : the_row(); ?>
                        <div class="awards-item">
                            <img src="<?php the_sub_field('section_awards_item_logo'); ?>" class="awards-logo" alt="awards-logo">
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>

