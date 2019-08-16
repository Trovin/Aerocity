<!-- section-hero -->
<section class="section-hero section-hero__payment" style="background-image: url(<?php the_field('payment_background_image'); ?>)">
    <?php
    $opacity = get_field('payment_shadow_gradient_opacity');
    if($opacity < 0 || strlen($opacity) < 0 || $opacity == NULL) {
        $opacity = 0.3;
    }
    if($opacity > 1) {
        $opacity = 1;
    } ?>
    <div class="section-hero__decoration-start" style="opacity: <?php echo $opacity; ?>"></div>
    <div class="section-hero__decoration-end" style="opacity: <?php echo $opacity; ?>"></div>

    <div class="hero-content">
        <div class="hero-content__info hero-content__info-center" data-aos="fade-up">
            <?php the_field('payment_headline'); ?>
        </div>
    </div>
</section>




