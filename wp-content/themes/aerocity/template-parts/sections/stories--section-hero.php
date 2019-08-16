<!-- section-hero -->
<section class="section-hero section-hero_stories" style="background-image: url(<?php the_field('stories_hero_background_image', 'options'); ?>)">
    <?php
    $opacity = get_field('stories_hero_shadow_gradient_opacity', 'options');
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
            <?php
            $query = new WP_Query();
            $stories_posts = get_field('stories_hero_feautured_post', 'options');

            if( $stories_posts ):
                for($i = 0; $i < 1; $i++) {
                    $query->the_post($stories_posts[$i]->ID);
                    get_post( $stories_posts[$i]->ID );
                    echo '<div class="hero-content__post-title">' . get_the_title( $stories_posts[$i]->ID ) . '</div>';
                    echo '<div class="hero-content__post-date">' .  get_the_date( 'F j, Y', $stories_posts[$i]->ID ) . '</div>';
                    $post_url = get_the_permalink( $stories_posts[$i]->ID );
                } ?>
            <?php endif; ?>
        </div>

        <a href="<?php echo $post_url; ?>" class="btn btn_large"><?php the_field('stories_hero_button_title', 'options'); ?></a>
    </div>
</section>
<?php wp_reset_query(); ?>




