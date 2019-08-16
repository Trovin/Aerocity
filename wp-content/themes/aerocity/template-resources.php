<?php
/*
 * Template Name: Resource template
 */
?>

<?php get_header(); ?>

<main id="main" class="page-main" role="main">
    <?php while ( have_posts() ) : the_post(); ?>

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
        <?php get_template_part('template-parts/sections/resources--section-hero'); ?>
    </div>

    <div class="resources-items">
        <div class="resources-items__inner" style="background-image: url(<?php the_field('resources_items_section_background_image'); ?>">
            <div class="page-container">
                <div class="variation-content__items-wrapper">
                    <?php
                    if( have_rows('resources_items_loop') ):
                        while ( have_rows('resources_items_loop') ) : the_row(); ?>

                            <a href="<?php the_sub_field('resources_item_link'); ?>" target="_blank" class="variation-content__item">
                                <span class="variation-content__image-wrapper">
                                    <span class="variation-content__image" style="background-image: url(<?php the_sub_field('resources_item_image'); ?>"></span>
                                </span>

                                <span class="variation-content__item-content">
                                    <span class="variation-content__content-inner">
                                        <span class="variation-content__item-label"><?php the_sub_field('resources_item_sub-title'); ?></span>
                                        <span class="variation-content__item-headline"><?php the_sub_field('resources_item_title'); ?></span>
                                    </span>
                                </span>
                            </a>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
