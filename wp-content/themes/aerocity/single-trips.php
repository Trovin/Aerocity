<?php get_header(); ?>

<main id="main" class="page-main" role="main">

    <div class="page-decoration">
        <div class="page-decoration__container">
            <span class="page-decoration__line"></span>
            <span class="page-decoration__line"></span>
            <span class="page-decoration__line"></span>
            <span class="page-decoration__line"></span>
            <span class="page-decoration__line"></span>
            <span class="page-decoration__line"></span>
        </div>
    </div>

    <?php while ( have_posts() ) : the_post(); ?>
        <div class="hero-justify">
            <?php get_template_part('template-parts/sections/single-trips--section-hero'); ?>
        </div>

        <!-- trip-detail -->
        <div class="trip-info">
            <div class="page-container page-container_trip">
                <div class="trip-info__left-part" data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <div class="trip-info__headline"><?php the_field('post_type_trip_recomended_headline'); ?></div>
                    <div class="trip-info__recomended-wrapper">
                        <?php
                        if( have_rows('post_type_trip_recomended_items') ):
                            // loop through the rows of data
                            while ( have_rows('post_type_trip_recomended_items') ) : the_row(); ?>
                                <div class="trip__recomended_item">
                                    <div class="post-info__title"><?php the_sub_field('post_type_trip_recomended_item_headline'); ?></div>
                                    <div class="post-info__description"><?php the_sub_field('post_type_trip_recomended_description'); ?></div>
                                </div>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <?php echo 'Content is empty..' ?>
                        <?php endif; ?>
                    </div>

                    <div class="trip-info__headline"><?php the_field('post_type_trip_note_headline'); ?></div>
                    <div class="post-info__note-description"><?php the_field('post_type_trip_note_description'); ?></div>
                </div>

                <?php if( have_rows('trips_detail_items') ): ?>
                    <div class="trip-detail__right-part" data-aos="fade-up-left" data-aos-easing="ease-out-cubic" data-aos-duration="500">
                        <div class="trip-detail__wrapper">
                            <div class="trip-detail__headline"><?php the_field('trip_detail_headline'); ?></div>

                            <?php while ( have_rows('trips_detail_items') ) : the_row(); ?>
                                <div class="trip__recomended_item">
                                    <div class="post-info__title"><?php the_sub_field('trips_detail_item_headline'); ?></div>
                                    <div class="post-info__description"><?php the_sub_field('trips_detail_item_description'); ?></div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>

        <div class="trip-gallery">
            <!-- trip-gallery slider-->
            <?php $gallery = get_field('single_trip_gallery'); ?>
            <?php if($gallery) : ?>
                <div class="trip-slider" id="trip-slider">
                    <?php foreach( $gallery as $image ): ?>
                        <li class="slider-item trip-slider__item" style="background-image: url(<?php echo $image['url']; ?>)"></li>
                    <?php endforeach; ?>
                </div>

                <!-- trip-slider control -->
                <div class="trip-slider__control">
                    <div class="slider-control__control-nav trip-slider__control-prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="slider-control__control-nav trip-slider__control-next"><i class="fas fa-chevron-right"></i></div>
                </div>
            <?php endif; ?>
        </div>
    <?php endwhile; ?>

</main>

<?php get_footer(); ?>
