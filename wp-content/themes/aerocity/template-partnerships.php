<?php
/*
 * Template Name: Partnerships template
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

        <div class="hero-justify partnership-hero">
            <?php get_template_part('template-parts/sections/section-hero'); ?>
        </div>

        <div class="partnership-info" data-aos="fade-up" data-aos-duration="800">
            <?php get_template_part('template-parts/sections/common-info'); ?>
        </div>

        <!-- section-school -->
        <div class="section-partnerships">
            <div class="section-partnerships__inner" style="background-image: url(<?php the_field('section_partners_background_image'); ?>">
                <div class="page-container">

                    <div class="headline headline_small">
                        <span class="headline-decoration"></span>
                        <h2 class="headline-content"><?php the_field('section_partners_headline'); ?></h2>
                    </div>

                    <div class="partnerships-wrapper">
                        <?php $i;
                        if( have_rows('section_partners_items') ):
                            $i++;
                            while ( have_rows('section_partners_items') ) : the_row(); ?>
                                <div class="partner-item" data-partner-modal="<?php echo $i; ?>">
                                    <div class="partner-item__preview">
                                        <img src="<?php the_sub_field('section_partners_item_image'); ?>" class="partner-logo">

                                        <div class="modal-item__nav partner-item__nav partner-item__nav_animate">
                                            <img src="<?php echo get_template_directory_uri().'/dist/icons/pa-open.svg' ?>" alt="icon-open">
                                        </div>
                                    </div>

                                    <!-- modal block -->
                                    <div class="modal modal-partnership modal-partnership_<?php echo $i++; ?>">
                                        <div class="modal-flex">
                                            <div class="modal-flex__inner">

                                                <div class="modal-partnership__wrapper">
                                                    <div class="modal-item__nav modal-item__nav_close partner-item__nav_close">
                                                        <div class="modal-item__nav">
                                                            <img src="<?php echo get_template_directory_uri().'/dist/icons/pa-close.svg' ?>" alt="icon-close">
                                                        </div>
                                                    </div>

                                                    <object
                                                            type="image/svg+xml"
                                                            class="partner-logo partner-logo_prev"
                                                            data="<?php the_sub_field('section_partners_item_image'); ?>">
                                                        <img src="<?php the_sub_field('section_partners_item_image'); ?>">
                                                    </object>

                                                    <div class="partner-description">
                                                        <?php the_sub_field('section_partners_item_description'); ?>
                                                    </div>

                                                    <?php
                                                    $link = get_sub_field('section_partners_item_more_link');
                                                    if( $link ):
                                                        $link_url = $link['url'];
                                                        $link_title = $link['title'];
                                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                                        ?>
                                                    <?php endif; ?>
                                                    <a class="link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>

                                                    <?php
                                                    $link2 = get_sub_field('section_partners_item_aсtion_link');
                                                    if( $link2 ):
                                                        $link_url2 = $link2['url'];
                                                        $link_title2 = $link2['title'];
                                                        $link_target2 = $link2['target'] ? $link2['target'] : '_self';
                                                        ?>
                                                    <?php endif; ?>
                                                    <a class="btn btn_modal" href="<?php echo esc_url($link_url2); ?>" target="<?php echo esc_attr($link_target2); ?>"><?php echo esc_html($link_title2); ?></a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal block -->
                                </div>
                            <?php endwhile;
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </main>

<?php get_footer(); ?>