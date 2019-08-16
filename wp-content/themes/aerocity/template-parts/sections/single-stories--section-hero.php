<!-- section-hero -->
<?php
$image = get_the_post_thumbnail_url();
if(!$image) {
    $image = get_template_directory_uri().'/src/assets/images/hero-image.jpg';
} ?>

<?php
$opacity = get_field('stories_shadow_gradient_opacity');
if($opacity < 0 || strlen($opacity) < 0 || $opacity == NULL) {
    $opacity = 0.50;
}
if($opacity > 1) {
    $opacity = 1;
}
?>

<section class="section-hero section-hero_single-stories" style="background-image: url(<?php echo $image; ?>)">
    <div class="single-stories__decoration" style="background-color: rgba(0, 0, 0, <?php echo $opacity; ?>);"></div>

    <div class="hero-content hero-content_stories">
        <div class="hero-content__stories-header" data-aos="fade-up">
            <a href="<?php echo get_site_url().'/stories'; ?>" class="link link_theme stories-link show-sm"><?php the_field('stories_back_to_archive_link_text', 'options'); ?></a>
            <div class="hero-content__post-info">
                <?php the_date(); ?>
                - By
                <?php the_author(); ?>
            </div>
            <div class="hero-content__info-headline"><?php the_title(); ?></div>
            <div class="hero-content__sub-headline"><?php the_field('stories_sub_title'); ?></div>
        </div>
    </div>

    <div class="hero-content__stories-footer">
        <div class="page-container">
            <a href="<?php echo get_site_url().'/stories'; ?>" class="link link_theme hide-sm"><?php the_field('stories_back_to_archive_link_text', 'options'); ?></a>
            <a href="#single-trip__content" class="anchor-link">
                <img src="<?php echo get_template_directory_uri().'/dist/icons/mouse-icon.svg'; ?>" class="single-story__icon" alt="single-story__icon">
            </a>

            <div class="share-social share-social_stories share-social_stories-single"">
                <span class="share-social_label">Share story</span>
                <?php echo do_shortcode('[Sassy_Social_Share]'); ?>
            </div>
        </div>
    </div>
</section>

