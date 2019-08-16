<?php
/*
 * Template Name: City jets template
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

    <div class="hero-justify">
        <?php get_template_part('template-parts/sections/section-hero'); ?>
    </div>

    <!-- section-anchor -->
    <div class="section-anchor" id="section-anchor">
        <div class="page-container page-container_anchor">
            <a class="anchor-link anchor-component__link" href="#section-benefits"><?php the_field('anchor_link_title'); ?></a>
            <a class="anchor-link anchor-component__link" href="#section-map"><?php the_field('anchor_link-2_title'); ?></a>
            <a class="anchor-link anchor-component__link" href="#section-books"><?php the_field('anchor_link-3_title'); ?></a>
            <a class="anchor-link anchor-component__link" href="#section-quotes"><?php the_field('anchor_link-4_title'); ?></a>
        </div>
    </div>

    <!-- section-benefits -->
    <div class="section-benefits" id="section-benefits">
        <div class="section-benefits__flex">

            <div class="headline headline_small">
                <span class="headline-decoration"></span>
                <h2 class="headline-content"><?php the_field('section_benefits_headline'); ?></h2>
            </div>

            <div class="benefits-wrapper">
                <?php
                if( have_rows('section_benefits_items') ):
                    while ( have_rows('section_benefits_items') ) : the_row(); ?>
                        <div class="benefits-item">
                            <div class="benefits-item__icon-wrapper" data-aos="zoom-in" data-aos-offset="0" data-aos-delay="600">
                                <img src="<?php the_sub_field('section_benefits_item_icon'); ?>" alt="benefits-icon" class="style-svg benefits-item__icon-image">
                            </div>
                            <div class="benefits-item__info" data-aos="fade-left" data-aos-delay="200"><?php the_sub_field('section_benefits_item_info'); ?></div>
                        </div>
                    <?php endwhile;
                endif;
                ?>
            </div>

        </div>
    </div>

    <!-- section-map -->
    <div class="section-map" id="section-map">
        <div class="map-wrapper" id="map-wrapper">
            <div class="page-container">
                <div class="map-wrapper__content" data-aos="fade-right" data-aos-offset="0" data-aos-delay="600">
                    <?php the_field('map_description','347'); ?>
                </div>
            </div>
        </div>
        <?php echo do_shortcode('[devvn_ihotspot id="347"]'); ?>
    </div>

    <!-- section-courses -->
    <div class="section-courses">
        <div class="section-courses__inner" style="background-image: url(<?php the_field('section_courses_background_image'); ?>)">
            <div class="page-container">
                <div class="courses-slider" id="courses-slider">
                    <?php
                    if( have_rows('courses_items') ):
                        while ( have_rows('courses_items') ) : the_row(); ?>
                            <div class="course-slider__item" data-title="<?php the_sub_field('course_item_name'); ?>">
                                <div class="course-slider__item-inner">
                                    <div class="course-slider__image-wrapper" style="background-image: url(<?php the_sub_field('course_item_image'); ?>)"></div>

                                    <div class="course-slider__item-content">
                                        <div class="course-slider__item-label"><?php the_sub_field('course_item_label'); ?></div>
                                        <div class="course-slider__item-name"><?php the_sub_field('course_item_name'); ?></div>
                                        <div class="course-slider__item-description"><?php the_sub_field('course_item_description'); ?></div>
                                        <div class="course-slider__item-info">
                                            <div class="course-slider__item-prerequisites"><?php the_sub_field('course_item_prerequisites'); ?></div>
                                            <div class="course-slider__item-duration"><?php the_sub_field('course_item_duration'); ?></div>
                                        </div>
                                        <div class="course-slider__item-footnote"><span class="footnote-decorator">&#42;</span><?php the_sub_field('course_item_footnote'); ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>

                <div class="courses-slider__control-wrapper">
                    <div class="slider-control__control-nav courses-slider__control-prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="slider-control__control-nav courses-slider__control-next"><i class="fas fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- section-books -->
    <div class="section-books" id="section-books">
        <div class="page-container">
            <div class="headline">
                <span class="headline-decoration"></span>
                <h2 class="headline-content"><?php the_field('section_book_headline'); ?></h2>
            </div>

            <div class="section-books__wrapper">
                <?php
                if( have_rows('section_book_items') ):
                    while ( have_rows('section_book_items') ) : the_row(); ?>
                        <div class="book-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/dist/icons/book-icon.svg" class="style-svg section-books__icon-image" alt="book-icon">

                            <div class="section-books__item-headline"><?php the_sub_field('section_book_title'); ?></div>
                            <div class="section-books__item-info" data-aos="zoom-in" data-aos-offset="200" data-aos-delay="400"><?php the_sub_field('section_book_description'); ?></div>
                            <?php
                            $upload = get_sub_field('section_book_upload_file');
                            if(!$upload['caption']) {
                                $upload['caption'] = 'Download file';
                            }
                            ?>
                            <a href="<?php echo $upload['url']; ?>" download class="section-books__item-link"><?php echo $upload['caption']; ?></a>
                        </div>
                    <?php endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>

    <!-- section-quotes -->
    <div class="section-quotes" id="section-quotes">
        <div class="section-quotes__wrapper">
            <div class="section-quotes__container">

                <div class="quotes-slider__wrapper" style="background-image: url(<?php the_field('quotes_slider_background_image'); ?>)">
                    <div class="quotes-slider" id="quotes-slider">
                        <?php
                        if( have_rows('quotes_slider_items') ):
                            while ( have_rows('quotes_slider_items') ) : the_row(); ?>
                                <div class="quotes-slider__item">
                                    <div class="quotes-slider__item-content"><?php the_sub_field('quotes_slider_person_quote'); ?></div>
                                    <div class="quotes-slider__person-info">
                                        <img src="<?php the_sub_field('quotes_slider_person_photo'); ?>" class="style-svg quotes-slider__person-image" alt="person-photo">
                                        <div class="quotes-slider__person-name"><?php the_sub_field('quotes_slider_person_name'); ?></div>
                                    </div>
                                </div>
                            <?php endwhile;
                        endif; ?>
                    </div>

                    <!-- init slick arrow -->
                    <span class="slider-control slider-control__prev">
                        <i class="fas fa-chevron-left"></i>
                    </span>

                    <span class="slider-control slider-control__next">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </div>

                <?php
                $link = get_field('quotes_cta_link');
                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                <?php endif; ?>
                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="section-quotes_cta">
                    <?php echo esc_html($link_title); ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/icons/cta-arrow-icon.svg" class="quotes-slider__cta-icon" alt="cta-icon">
                </a>
            </div>
        </div>
    </div>

</main>

<?php get_footer(); ?>
