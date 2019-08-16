<!-- section-hero -->
<section class="section-hero section-hero_archive" style="background-image: url(<?php the_field('sales_hero_background_image', 'option'); ?>)">
    <?php
    $opacity = get_field('sales_hero_shadow_gradient_opacity', 'option');
    if($opacity < 0 || strlen($opacity) < 0) {
        $opacity = 0.5;
    }
    if($opacity > 1) {
        $opacity = 1;
    } ?>
    <div class="archive-hero__decoration" style="opacity: <?php echo $opacity; ?>"></div>

    <div class="hero-content">
        <div class="hero-content__info">
            <?php the_field('sales_hero_info','option'); ?>

            <?php
            $social = get_field('sales_hero_social', 'option');
            if($social) : ?>
                <div class="social-nav_hero">
                    <?php get_template_part('template-parts/sections/template-elements/social'); ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>




