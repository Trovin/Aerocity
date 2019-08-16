<!-- section-hero_contact -->
<section class="section-hero section-hero_contact" style="background-image: url(<?php the_field('contact_hero_background_image'); ?>)">
    <?php
    $opacity = get_field('contact_hero_shadow_gradient_opacity');
    if($opacity < 0 || strlen($opacity) < 0) {
        $opacity = 0.4;
    }
    if($opacity > 1) {
        $opacity = 1;
    } ?>
    <div class="archive-hero__decoration" style="opacity: <?php echo $opacity; ?>"></div>

    <div class="hero-content">
        <div class="hero-content__info" data-aos="fade-up">
            <?php the_field('contact_hero_section_text'); ?>

            <?php
            $social = get_field('contact_hero_section_add_socials');
            if($social) : ?>
                <div class="social-nav_hero">
                    <?php get_template_part('template-parts/sections/template-elements/social'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>




