<?php get_header(); ?>

<main id="main" class="page-main" role="main">
    <div class="modal">
        <div class="modal-flex">
            <div class="modal-flex__inner modal-flex__inner-large">
                <div class="subscribe-form">
                    <?php echo do_shortcode('[gravityform id=7 title=false description=false ajax=true tabindex=49]'); ?>
                </div>
                <div class="modal__close-icon" id="close-modal"><i class="fas fa-times"></i></div>
            </div>
        </div>
    </div>

    <div class="trips-hero">
        <?php get_template_part('template-parts/sections/trips--section-hero'); ?>
    </div>

    <?php
    $per_page = 9;
    if ( empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
        return $per_page = 5;
    }
    ?>

    <div class="stories-items">
        <!-- get all custom taxonomy categories -->
        <?php if( empty( $paged ) || $paged == 0 ) $paged = 1;
        $args = array(
            'post_type' => 'trips',
            'post_status' => 'publish',
            'posts_per_page' => $per_page,
            'paged' => $paged
        );
        $start_posts = new WP_Query( $args ); ?>

        <div class="stories-items_container">
            <?php while ( $start_posts->have_posts() ) : $start_posts->the_post(); ?>
                <?php setup_postdata($post);

                $image = get_the_post_thumbnail_url();
                if(!$image) {
                    $image = get_template_directory_uri().'/src/assets/images/archive-product-temp.jpg';
                } ?>

                <a class="page-content__item page-trips__item" href="<?php the_permalink(); ?>" style="background-image: url(<?php echo $image; ?>); display: block">
                    <span class="page-stories__inner">
                        <span class="page-content__item-inner">
                            <span class="stories-item__sub-title"><?php echo get_the_content(); ?></span>
                            <span class="stories-item__title"><?php echo get_the_title(); ?></span>
                        </span>
                        <span class="nav-action">
                            <span class="nav-action__element nav-action__element_first"></span>
                            <span class="nav-action__element nav-action__element_second"></span>
                        </span>
                    </span>
                </a>
            <?php endwhile; ?>
        </div>

        <div class="archive-page__footer">
            <?php if($start_posts->max_num_pages > 1) : ?>
                <button class="load-more__item">
                    <span class="load-more__item-text">Load more</span>
                    <span class="load-more__item-icon"><i class="fas fa-arrow-down"></i></span>
                </button>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </div>
    </div>

    <?php get_template_part('template-parts/wp-ajax'); ?>
</main>

<?php get_footer(); ?>
