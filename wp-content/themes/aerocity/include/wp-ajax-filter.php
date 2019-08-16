<?php
/**
 * Add backend filter handler.
 */
add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');

function load_posts_by_ajax_callback() {
    check_ajax_referer('load_more_posts', 'security');
    $post_type = $_POST['post_type'];
    $paged = $_POST['paged'];
    $posts_per_page = $_POST['posts_per_page'];
    $category_id = $_POST['category_id'];
    $itemClass = $_POST['itemClass'];

    if( $category_id == -1 ) {
        $args = array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            'posts_per_page' => $posts_per_page,
            'paged' => $paged
        );
    } else {
        $args = array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            'posts_per_page' => $posts_per_page,
            'paged' => $paged,
            'tax_query' => array(
                array(
                    'taxonomy' => 'stories-category',
                    'field'    => 'id',
                    'terms'    => $category_id
                ))
        );
    }

    // The Query
    $my_posts = new WP_Query( $args );
    if($my_posts->have_posts()){
        while($my_posts->have_posts()) {
            $my_posts->the_post();

            $image = get_the_post_thumbnail_url();
            if(!$image) {
                $image = get_template_directory_uri().'/src/assets/images/archive-product-temp.jpg';
            }

            $response['html'] = $response['html'] . '<a class="page-content__item '. $itemClass .'" href="'. get_the_permalink() .'" style="background-image: url('. $image .')">
                                                         <span class="page-content__item-inner">
                                                             <span class="stories-item__title">'. get_the_title() .'</span>
                                                             <span class="stories-item__date">'. get_the_date() .'</span>
                                                         </span>               
                                                         <div class="nav-action">
                                                             <span class="nav-action__element nav-action__element_first"></span>
                                                             <span class="nav-action__element nav-action__element_second"></span>
                                                         </div>
                                                     </a>';
        }
        $response['maxPages'] = $my_posts->max_num_pages;
    }
    //Return the data
    echo json_encode($response);
    wp_die();
}
