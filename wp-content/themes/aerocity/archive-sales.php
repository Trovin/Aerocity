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
        <?php get_template_part('template-parts/sections/archive-section-hero'); ?>
    </div>

    <!-- page-sales__section-info -->
    <div class="page-sales__section-info">
        <div class="page-container">
            <div class="page-sales__info-content">
                <?php the_field('page_sales_info_content', 'options'); ?>
            </div>
        </div>
    </div>

    <!-- page-sales__section-items -->
    <div class="page-sales__section-items">
        <div class="section-items__inner" style="background-image: url(<?php the_field('page_sales_section_items_background_image', 'options'); ?>">
            <div class="page-container">
                <?php
                $posts = get_field('page_sales_items', 'options');
                if( $posts ): ?>
                    <div class="page-sales__items-container">
                        <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                            <?php setup_postdata($post); ?>
                            <?php
                            $image = get_the_post_thumbnail_url();
                            if(!$image) {
                                $image = get_template_directory_uri().'/src/assets/images/archive-product-temp.jpg';
                            } ?>
                            <a class="page-content__item page-sales__item" href="<?php the_permalink(); ?>" style="background-image: url(<?php echo $image; ?>">
                                <span class="page-content__item-inner">
                                    <span class="page-sales__item-year"><?php the_field('product_year'); ?></span>
                                    <span class="page-sales__item-title"><?php the_field('product_title'); ?></span>
                                </span>

                                <?php get_template_part('template-parts/sections/template-elements/nav-action'); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
