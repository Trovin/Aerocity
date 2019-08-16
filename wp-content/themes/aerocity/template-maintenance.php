<?php
/*
 * Template Name: Maintenance template
 */
?>

<?php get_header(); ?>

<main id="main" class="page-main" role="main">

    <div class="hero-justify">
        <?php get_template_part('template-parts/sections/section-hero'); ?>
    </div>

    <div class="maintenance-common_info" data-aos="zoom-in" data-aos-offset="400" data-aos-delay="0">
        <?php get_template_part('template-parts/sections/common-info'); ?>
    </div>

    <div class="section__maintenance-expertise">
        <div class="maintenance-expertise__inner" style="background-image: url(<?php the_field('section_expertise_background_image'); ?>)">
            <div class="page-container page-container__expertise">
                <div class="expertise-slider" id="expertise-slider">
                    <?php
                    if( have_rows('section_expertise_slider_items') ):
                        while ( have_rows('section_expertise_slider_items') ) : the_row(); ?>
                            <div class="expertise-slider__item" data-title="<?php the_sub_field('expertise_slider_item_title'); ?>">
                                <div class="expertise-slider__item-content">
                                    <div class="expertise-quote">
                                        <div class="expertise-quote__content"><?php the_field('section_expertise_quote'); ?></div>
                                        <div class="expertise-quote__author"><?php the_field('section_expertise_quote_autor'); ?></div>
                                    </div>

                                    <div class="expertise-info">
                                        <div class="expertise-item__label"><?php the_field('section_expertise_items_label'); ?></div>
                                        <div class="expertise-item__name"><?php the_sub_field('expertise_slider_item_title'); ?></div>
                                        <div class="expertise-item__description"><?php the_sub_field('expertise_slider_item_description'); ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>

                <div class="expertise-slider__control-wrapper">
                    <div class="slider-control__control-nav expertise-slider__control-prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="slider-control__control-nav expertise-slider__control-next"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php get_footer(); ?>
