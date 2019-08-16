<!-- section-hero -->
<?php
    $gallery = get_field('product_gallery_images', $id);
    $size = 'full';
    $image = get_the_post_thumbnail_url();
    if(!$image) {
        $image = get_template_directory_uri().'/src/assets/images/hero-image.jpg';
    } ?>

<section class="section-hero section-hero_single-trips" style="background-image: url(<?php echo $image; ?>)">
    <?php
    $opacity = get_field('trip_hero_section_shadow_gradient_opacity');
    if($opacity < 0 || strlen($opacity) < 0 || $opacity == NULL) {
        $opacity = 0.95;
    }
    if($opacity > 1) {
        $opacity = 1;
    } ?>
    <div class="section-hero__decoration-start" style="opacity: <?php echo $opacity; ?>"></div>
    <div class="section-hero__decoration-end" style="opacity: <?php echo $opacity; ?>"></div>

    <div class="hero-content hero-content_sales">
        <div class="hero-content__info-header" data-aos="fade-up">
            <div class="hero-content__info-headline"><?php the_title(); ?></div>
            <a href="<?php echo get_site_url().'/trips'; ?>" class="link"><?php the_field('link_to_trips_archives_text', 'options'); ?></a>
        </div>

        <div class="hero-content__info-footer">
            <div class="share-social share-social_single-post">
                <span class="share-social_label">Share trip</span>
                <?php echo do_shortcode('[Sassy_Social_Share]'); ?>
            </div>
        </div>
    </div>
</section>



