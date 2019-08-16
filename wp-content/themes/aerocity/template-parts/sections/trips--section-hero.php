<!-- section-hero -->
<?php
$query = new WP_Query();
$posts = get_field('trips_hero_feautured_post', 'options');

if( $posts ):
    for($i = 0; $i < 1; $i++) {
        $query->the_post($posts[$i]->ID);
        $image = get_the_post_thumbnail_url( $posts[$i]->ID );
    } ?>
<?php endif; ?>

<section class="section-hero section-hero_stories" style="background-image: url(<?php echo $image; ?>)">
    <?php
    $opacity = get_field('trips_hero_shadow_gradient_opacity','option');
    if($opacity < 0 || strlen($opacity) < 0 || $opacity == NULL) {
        $opacity = 0.75;
    }
    if($opacity > 1) {
        $opacity = 1;
    } ?>
    <div class="section-hero__decoration-start" style="opacity: <?php echo $opacity; ?>"></div>
    <div class="section-hero__decoration-end" style="opacity: <?php echo $opacity; ?>"></div>

    <div class="hero-content">
        <div class="hero-content__info">
            <h2 class="trip-archive__title">Trips</h2>
        </div>

        <button class="btn btn_updates" id="btn_updates"><?php the_field('trips_modal_button_title', 'options'); ?></button>
    </div>
</section>
