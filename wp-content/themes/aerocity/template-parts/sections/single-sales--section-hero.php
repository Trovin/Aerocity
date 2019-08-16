<!-- section-hero -->
<?php
    $gallery = get_field('product_gallery_images', $id);
    $size = 'full';
    $image = get_the_post_thumbnail_url();
    if(!$image) {
        $image = get_template_directory_uri().'/src/assets/images/hero-image.jpg';
    } ?>

<?php
$opacity = get_field('shadow_gradient_opacity');
if($opacity < 0 || strlen($opacity) < 0 || $opacity == NULL) {
    $opacity = 0.75;
}
if($opacity > 1) {
    $opacity = 1;
} ?>

<?php if(!$gallery) : ?>
    <section class="section-hero section-hero_single-sales" style="background-image: url(<?php echo $image; ?>)">
        <div class="section-hero__decoration-start" style="opacity: <?php echo $opacity; ?>"></div>
        <div class="section-hero__decoration-end" style="opacity: <?php echo $opacity; ?>"></div>

        <div class="hero-content hero-content_sales">
            <div class="hero-content__info-header">
                <div class="single-sales__year"><?php the_field('product_year') ?></div>
                <div class="single-sales__title"><?php the_field('product_title') ?></div>
                <div class="single-sales__price"><?php the_field('product_price') ?></div>
            </div>

            <div class="hero-content__info-footer">
                <a href="#section-specs" class="anchor-link anchor-link_sales"><?php the_field('post_type_sales_anchor_link', 'options'); ?></a>

                <div class="share-social share-social_single-post">
                    <span class="share-social_label">Share</span>
                    <?php echo do_shortcode('[Sassy_Social_Share]'); ?>
                </div>
            </div>
        </div>
    </section>

<?php else : ?>
    <section class="section-hero section-hero_single-sales">
        <div class="section-hero__decoration-start" style="opacity: <?php echo $opacity; ?>"></div>
        <div class="section-hero__decoration-end" style="opacity: <?php echo $opacity; ?>"></div>

        <div class="hero-content hero-content_sales">
            <div class="hero-content__info-header">
                <div class="single-sales__year"><?php the_field('product_year') ?></div>
                <div class="single-sales__title"><?php the_field('product_title') ?></div>
                <div class="single-sales__price"><?php the_field('product_price') ?></div>
            </div>

            <div class="hero-content__info-footer">
                <a href="#section-specs" class="anchor-link anchor-link_sales"><?php the_field('post_type_sales_anchor_link', 'options'); ?></a>

                <div class="share-social share-social_single-post">
                    <span class="share-social_label">Share</span>
                    <?php echo do_shortcode('[Sassy_Social_Share]'); ?>
                </div>
            </div>

            <!-- sales-slider control -->
            <div class="sales-slider__control">
                <div class="slider-control__control-nav sales-slider__control-prev"><i class="fas fa-chevron-left"></i></div>
                <div class="slider-control__control-nav sales-slider__control-next"><i class="fas fa-chevron-right"></i></div>
            </div>
        </div>

        <!-- sales-slider -->
        <div class="sales-slider" id="sales-slider">
            <?php foreach( $gallery as $image ): ?>
                <?php $url = $image['url']; ?>
                <li class="slider-item sale-slider__item" style="background-image: url(<?php echo $url; ?>)"></li>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>



