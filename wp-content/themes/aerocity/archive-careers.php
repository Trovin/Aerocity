<?php get_header(); ?>

<main id="main" class="page-main" role="main">

    <div class="hero-justify">
        <?php get_template_part('template-parts/sections/careers--section-hero'); ?>
    </div>

    <div class="careers-items" style="background-image: url(<?php the_field('careers_section_items_background_image', 'options'); ?>">
        <div class="page-container">

            <div class="headline headline_small">
                <span class="headline-decoration"></span>
                <h2 class="headline-content"><?php the_field('careers_section_items_headline', 'options'); ?></h2>
            </div>

            <?php
            $args = array(
                'post_type' => 'careers',
                'post_status' => 'publish',
                'posts_per_page' => '-1'
            );
            $start_posts = new WP_Query( $args ); ?>

            <div class="variation-content__items-wrapper">
                <?php while ( $start_posts->have_posts() ) : $start_posts->the_post(); ?>
                    <?php setup_postdata($post);

                    $image = get_the_post_thumbnail_url();
                    if(!$image) {
                        $image = get_template_directory_uri().'/src/assets/images/archive-product-temp.jpg';
                    } ?>

                    <?php
                    $content = get_the_content();
                    $small_content = content_excerpt( array('maxchar'=>220, 'text'=>$content) );
                    ?>

                    <a href="<?php the_permalink(); ?>" class="variation-content__item" data-aos="fade-up" data-aos-duration="800">
                        <span class="variation-content__content-inner">
                            <span class="variation-content__item-label"><?php the_field('careers_item_sub-title', 'options'); ?></span>
                            <span class="variation-content__item-headline"><?php the_title(); ?></span>
                            <span class="variation-content__item-description"><?php echo $small_content; ?></span>
                            <button class="btn btn_variation"><?php the_field('careers_item_button_inner_text', 'options'); ?></button>
                        </span>
                    </a>
                <?php endwhile; ?>
            </div>

            <a class="careers-form__wrapper" href="mailto:<?php the_field('careers_form_email', 'options'); ?>" target="_blank">
                <div class="careers-form__wrapper-info">
                    <span class="careers-form__sub-title"><?php the_field('careers_form_sub_title', 'options'); ?></span>
                    <span class="careers-form__title"><?php the_field('careers_form_title', 'options'); ?></span>
                </div>

                <div>
                    <button class="btn btn_email"><?php the_field('careers_form_button_inner_text', 'options'); ?></button>
                </div>
            </a>
        </div>
    </div>

</main>

<?php get_footer(); ?>
