<?php get_header(); ?>

<main id="main" class="page-main" role="main">
    <div class="modal">
        <div class="modal-flex">
            <div class="modal-flex__inner">
                <div class="subscribe-form">
                    <?php echo do_shortcode('[gravityform id=7 title=false description=false ajax=true tabindex=49]'); ?>
                </div>
                <div class="modal__close-icon" id="close-modal"><i class="fas fa-times"></i></div>
            </div>
        </div>
    </div>

    <div class="hero-justify">
        <?php get_template_part('template-parts/sections/stories--section-hero'); ?>
    </div>

    <div class="stories-category__wrapper">
        <ul class="stories-category__nav">
            <li class="stories-category__item" data-post-filter="-1">ALL STORIES</li>
            <!-- get all custom taxonomy categories -->
            <?php
            $term = get_queried_object();
            $current_term_id = $term->term_id; ?>

            <?php
            $terms = get_terms( 'stories-category' );
            foreach ($terms as $term) {
                if($current_term_id == $term->term_id ) {
                    echo '<li class="stories-category__item stories-category__item_active" data-post-filter="' . $term->term_id . '">' . $term->name . '</li>';
                } else {
                    echo '<li class="stories-category__item" data-post-filter="' . $term->term_id . '">' . $term->name . '</li>';
                }
            }
            ?>
        </ul>

        <!-- mobile select -->
        <div class="category-select_container">
            <?php
            $terms = get_terms( 'stories-category' );

            $count = count( $terms );
            if ( $count > 0 ) { ?>
                <select name="category-select" class="category-select" id="stories-select">
                    <?php foreach ($terms as $term) {
                        if($current_term_id == $term->term_id ) {
                            echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
                        }
                    } ?>
                    <?php foreach ($terms as $term) {
                        if($current_term_id != $term->term_id ) {
                            echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
                        }
                    } ?>
                    <?php echo '<option value="' . -1 . '">' . 'ALL STORIES' . '</option>'; ?>
                </select>
            <?php } ?>
        </div>

        <button class="btn btn_updates" id="btn_updates"><?php the_field('stories_modal_button_title', 'options'); ?></button>
    </div>

    <?php
    $per_page = 9;
    if ( empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
        return $per_page = 5;
    }
    ?>

    <div class="stories-items">
        <!-- get all post of current category -->
        <?php if( empty( $paged ) || $paged == 0 ) $paged = 1;
        $args = array(
            'post_type' => 'stories',
            'post_status' => 'publish',
            'posts_per_page' => $per_page,
            'paged' => $paged,
            'tax_query' => array(
                array(
                    'taxonomy' => 'stories-category',
                    'field'    => 'id',
                    'terms'    => $current_term_id
                ))
        );
        $start_posts = new WP_Query( $args ); ?>

        <div class="stories-items_container">
            <?php while ( $start_posts->have_posts() ) : $start_posts->the_post(); ?>
                <?php setup_postdata($post);

                $image = get_the_post_thumbnail_url();
                if(!$image) {
                    $image = get_template_directory_uri().'/src/assets/images/archive-product-temp.jpg';
                } ?>

                <a class="page-content__item page-stories__item" href="<?php the_permalink(); ?>" style="background-image: url(<?php echo $image; ?>); display: block">
                    <span class="page-stories__inner">
                        <span class="page-content__item-inner">
                            <span class="stories-item__title"><?php echo get_the_title(); ?></span>
                            <span class="stories-item__date"><?php echo get_the_date(); ?></span>
                        </span>
                        <span class="nav-action">
                            <span class="nav-action__element nav-action__element_first"></span>
                            <span class="nav-action__element nav-action__element_second"></span>
                        </span>
                    </span>
                </a>
            <?php endwhile; ?>
        </div>

        <div class="archive-page__footer">
            <?php if($start_posts->max_num_pages > 1) : ?>
                <button class="load-more__item">
                    <span class="load-more__item-text">Load more</span>
                    <span class="load-more__item-icon"><i class="fas fa-arrow-down"></i></span>
                </button>
                <?php else: ?>
                <button class="load-more__item" style="display: none;">
                    <span class="load-more__item-text">Load more</span>
                    <span class="load-more__item-icon"><i class="fas fa-arrow-down"></i></span>
                </button>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </div>
    </div>

    <?php get_template_part('template-parts/wp-ajax'); ?>
</main>

<?php get_footer(); ?>
