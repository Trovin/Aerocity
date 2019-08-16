<?php
/*
 * Template Name: City flyers template
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

    <div data-aos="zoom-in" data-aos-offset="400" data-aos-delay="0">
        <?php get_template_part('template-parts/sections/common-info'); ?>
    </div>

    <!-- section-school -->
    <div class="section-school">
        <div class="section-school__inner" style="background-image: url(<?php the_field('section_school_background_image'); ?>">
            <div class="page-container">

                <div class="headline headline_small">
                    <span class="headline-decoration"></span>
                    <h2 class="headline-content"><?php the_field('section_school_headline'); ?></h2>
                </div>

                <div class="variation-content__items-wrapper">
                    <?php
                    if( have_rows('section_school_items') ):
                        while ( have_rows('section_school_items') ) : the_row(); ?>
                            <?php
                            $link = get_sub_field('section_school_item_link');
                            if( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                            <?php endif; ?>

                            <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="variation-content__item" data-aos="zoom-in" data-aos-offset="400" data-aos-delay="0">
                               <span class="variation-content__image-wrapper">
                                    <span class="variation-content__image" style="background-image: url(<?php the_sub_field('section_school_item_image'); ?>"></span>
                               </span>

                                <span class="variation-content__item-content">
                                    <span class="variation-content__content-inner">
                                        <span class="variation-content__item-label"><?php the_sub_field('section_school_item_label'); ?></span>
                                        <span class="variation-content__item-headline"><?php the_sub_field('section_school_item_headline'); ?></span>
                                        <span class="variation-content__item-description"><?php the_sub_field('section_school_item_description'); ?></span>
                                        <button class="btn btn_variation"><?php echo esc_html($link_title); ?></button>
                                    </span>
                                </span>
                            </a>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>

</main>

<?php get_footer(); ?>


