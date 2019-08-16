<!-- section-hero -->
<section class="section-hero section-hero_stories" style="background-image: url(<?php the_field('page_404_background_image', 'options') ?>)">
    <?php
    $opacity = get_field('page_404_shadow_gradient_opacity','option');
    if($opacity < 0 || strlen($opacity) < 0 || $opacity == NULL) {
        $opacity = 0.3;
    }
    if($opacity > 1) {
        $opacity = 1;
    } ?>
    <div class="section-hero__decoration-start" style="opacity: <?php echo $opacity; ?>"></div>
    <div class="section-hero__decoration-end" style="opacity: <?php echo $opacity; ?>"></div>

    <div class="hero-content hero-content_404">
        <div class="hero-content__info">
            <div class="page404__decorated-text"><?php the_field('page_404_decorated_intro_text', 'options'); ?></div>
            <div class="page404__main-info"><?php the_field('page_404_main_info_text', 'options'); ?></div>
            <a class="btn btn-404" href="<?php echo get_home_url(); ?>"><?php the_field('page_404_button-home', 'options'); ?></a>
        </div>
    </div>
</section>
