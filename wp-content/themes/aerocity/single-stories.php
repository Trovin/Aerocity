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
    <?php get_template_part('template-parts/sections/single-stories--section-hero'); ?>

    <!-- single trip content -->
    <div class="single-trip__content" id="single-trip__content">
        <div class="page-container">
            <div class="single-stories__intro-info"><?php the_field('stories_enty_info'); ?></div>

            <?php
            $content = get_the_content(); ?>
            <div class="single-stories__intro-content"><?php the_content(); ?></div>
        </div>

        <div class="single-trip__footer">
            <div class="page-container">
                <?php
                $id = get_the_ID();
                $terms = get_the_terms( $id, 'stories-category' );
                foreach($terms as $term) {
                    $term_id =  $term->term_id;
                }

                $args = array(
                    'post_type' => 'stories',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'paged' => 1,
                    'post__not_in' => array (get_the_ID()),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'stories-category',
                            'field'    => 'id',
                            'terms'    => $term_id
                        ))
                );
                $start_posts = new WP_Query( $args );
                $query = new WP_Query( $args );

                if( $query->have_posts() ) : ?>
            </div>
        </div>
    </div>
</main>

    <div class="stories-footer__wrapper">
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

        <div class="page-container">
            <div class="single-trip__sub-footer">
                <div class="headline">
                    <span class="headline-decoration"></span>
                    <h2 class="headline-content"><?php the_field('stories_related_post_headline', 'options'); ?></h2>
                </div>

                <a href="<?php echo get_site_url().'/stories'; ?>" class="link link_theme"><?php the_field('stories_back_to_archive_link_text', 'options'); ?></a>
            </div>
        </div>

        <div class="page-stories__relative-container">
            <?php while( $query->have_posts() ) : $query->the_post(); ?>
                <?php
                $image = get_the_post_thumbnail_url();
                if(!$image) {
                    $image = get_template_directory_uri().'/src/assets/images/archive-product-temp.jpg';
                } ?>
                <a class="page-content__item page-stories__item-related" href="<?php the_permalink(); ?>" style="background-image: url(<?php echo $image; ?>">
                                    <span class="page-content__item-inner">
                                        <span class="stories-item__title"><?php the_title(); ?></span>
                                        <span class="stories-item__date"><?php echo get_the_date(); ?></span>
                                    </span>
                    <?php get_template_part('template-parts/sections/template-elements/nav-action'); ?>
                </a>
            <?php endwhile; ?>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>
<?php endwhile; ?>

<?php get_footer(); ?>
