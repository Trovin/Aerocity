<!-- section-hero -->
<?php
$select_value = get_field('hero_section_background_setting');
$opacity = get_field('hero_section_shadow_gradient_opacity');
if($opacity < 0 || strlen($opacity) < 0 || $opacity == NULL) {
    $opacity = 0.75;
}
if($opacity > 1) {
    $opacity = 1;
} ?>

<?php if( $select_value == 'Image' ): ?>
    <section class="section-hero" style="background-image: url(<?php the_field('hero_section_background_image'); ?>)">
        <div class="section-hero__decoration-start" style="opacity: <?php echo $opacity; ?>"></div>
        <div class="section-hero__decoration-end" style="opacity: <?php echo $opacity; ?>"></div>

        <div class="hero-content">
            <div class="hero-content__info hero-content__info-left" data-aos="fade-up">
                <?php the_field('hero_section_left_text'); ?>

                <?php
                $social = get_field('hero_section_add_socials');
                if($social) : ?>
                    <div class="social-nav_hero">
                        <?php get_template_part('template-parts/sections/template-elements/social'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="hero-content__info hero-content__info-right" data-aos="fade-up">
                <?php the_field('hero_section_right_text'); ?>
            </div>
        </div>
    </section>

<?php elseif( $select_value == 'Video' ) : ?>
    <section class="section-hero">
        <div class="section-hero__decoration-start" style="opacity: <?php echo $opacity; ?>"></div>
        <div class="section-hero__decoration-end" style="opacity: <?php echo $opacity; ?>"></div>

        <video class="video-background video-background__file" id="video-download" autoplay loop muted playsinline>
            <?php
            $mp4 = get_field('hero_section_background_video_file_mp4');
            if($mp4) : ?>
                <source src="<?php echo $mp4; ?>" type="video/mp4" class="video-file">
            <?php endif; ?>

            <?php
            $webm = get_field('hero_section_background_video_file_mp4');
            if($webm) : ?>
                <source src="<?php echo $webm; ?>" type="video/mp4" class="video-file">
            <?php endif; ?>
        </video>

        <div class="hero-content">
            <div class="hero-content__info hero-content__info-left" data-aos="fade-up">
                <?php the_field('hero_section_left_text'); ?>

                <?php
                $social = get_field('hero_section_add_socials');
                if($social) : ?>
                    <div class="social-nav_hero">
                        <?php get_template_part('template-parts/sections/template-elements/social'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="hero-content__info hero-content__info-right" data-aos="fade-up">
                <?php the_field('hero_section_right_text'); ?>
            </div>
        </div>
    </section>

<?php elseif( $select_value == 'Youtube_link' ) : ?>
    <section class="section-hero">
        <div class="section-hero__decoration-start" style="opacity: <?php echo $opacity; ?>"></div>
        <div class="section-hero__decoration-end" style="opacity: <?php echo $opacity; ?>"></div>

        <div class="video-background">
            <div class="video-foreground">
                <?php
                $url = get_field('hero_section_background_youtube_video_link');
                $list_id = array_pop(explode('/', $url));
                $autoplay = '?autoplay=1';
                $controls = '&controls=0';
                $loop = '&loop=1';
                $rel = '&rel=0';
                $mute = '&mute=1';
                $playlist = '&playlist='.$list_id.'';
                $src = $url . $autoplay . $controls . $loop . $rel . $mute . $playlist; ?>

                <?php if($url) : ?>
                    <iframe src="<?php echo $src; ?>" frameborder="0" allow="accelerometer; autoplay; loop; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <?php endif; ?>
            </div>
        </div>

        <div class="hero-content">
            <div class="hero-content__info hero-content__info-left" data-aos="fade-up">
                <?php the_field('hero_section_left_text'); ?>

                <?php
                $social = get_field('hero_section_add_socials');
                if($social) : ?>
                    <div class="social-nav_hero">
                        <?php get_template_part('template-parts/sections/template-elements/social'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="hero-content__info hero-content__info-right" data-aos="fade-up">
                <?php the_field('hero_section_right_text'); ?>
            </div>
        </div>
    </section>

<?php elseif( $select_value == 'Vimeo_link' ) : ?>
    <section class="section-hero">
        <div class="section-hero__decoration-start" style="opacity: <?php echo $opacity; ?>"></div>
        <div class="section-hero__decoration-end" style="opacity: <?php echo $opacity; ?>"></div>

        <div class="video-background">
            <div class="video-foreground">
                <?php
                $url = get_field('hero_section_background_vimeo_video_link');
                $autoplay = '?autoplay=1';
                $controls = '&controls=0';
                $loop = '&loop=1';
                $mute = '&muted=1';
                $playlist = '&playsinline=1';
                $autopause = '&autopause=0';
                $src = $url . $autoplay . $controls . $loop . $mute . $playlist . $autopause; ?>

                <?php if($url) : ?>
                    <iframe src="<?php echo $src; ?>" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                <?php endif; ?>
            </div>
        </div>

        <div class="hero-content">
            <div class="hero-content__info hero-content__info-left" data-aos="fade-up">
                <?php the_field('hero_section_left_text'); ?>

                <?php
                $social = get_field('hero_section_add_socials');
                if($social) : ?>
                    <div class="social-nav_hero">
                        <?php get_template_part('template-parts/sections/template-elements/social'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="hero-content__info hero-content__info-right" data-aos="fade-up">
                <?php the_field('hero_section_right_text'); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

