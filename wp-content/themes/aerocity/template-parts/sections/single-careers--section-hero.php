<!-- section-hero -->
<section class="section-hero section-hero_careers">
    <div class="hero-content">
        <div class="hero-content__info hero-content__info_careers">
            <h2 class="post-archive__title careers-archive__title"><?php the_title(); ?></h2>
            <a href="<?php echo get_site_url().'/careers'; ?>" class="link"><?php the_field('single_careers_post_link_to_archive', 'options'); ?></a>
        </div>
    </div>
</section>
