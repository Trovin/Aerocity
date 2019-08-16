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

    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part('template-parts/sections/single-sales--section-hero'); ?>

        <!-- section-specs -->
        <div class="section-specs" id="section-specs">
            <div class="page-container">
                <div class="headline">
                    <span class="headline-decoration"></span>
                    <h2 class="headline-content"><?php the_field('post_type_sales_spec__title', 'options'); ?></h2>
                </div>

                <div class="section-specs__header">
                    <?php
                    if( have_rows('product_specs_info') ):
                        while ( have_rows('product_specs_info') ) : the_row(); ?>
                            <div class="product-specs__item">
                                <div class="post-info__title"><?php the_sub_field('product_specs_info_item_title'); ?></div>
                                <div class="post-info__description"><?php the_sub_field('product_specs_info_item_description'); ?></div>
                            </div>
                        <?php endwhile;
                    endif;
                    ?>
                </div>

                <div class="section-specs__footer">
                    <?php
                    if( have_rows('product_specs_additional_equipment') ):
                        while ( have_rows('product_specs_additional_equipment') ) : the_row(); ?>
                            <div class="product-specs__item">
                                <div class="post-info__title"><?php the_sub_field('product_specs_additional_equipment_title'); ?></div>
                                <div class="post-info__description"><?php the_sub_field('product_specs_additional_equipment_description'); ?></div>
                            </div>
                        <?php endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>

</main>

<?php get_footer(); ?>
