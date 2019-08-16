<script>
    <?php
    $per_page = 9;
    if ( empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
        return $per_page = 5;
    }
    ?>

    jQuery(function($) {
        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>",
            paged = 2,
            categoryId = -1,
            data = {},
            postType,
            flag = false,
            itemClass,
            postsPerPage = <?php echo $per_page; ?>,
            btnMore = $('.load-more__item');

        //set post type
        function setPostType() {
            if( $('body').hasClass('post-type-archive-stories') ) {
                postType = 'stories';
                itemClass = 'page-stories__item';
            }
            else if( $('body').hasClass('post-type-archive-trips') ) {
                postType = 'trips';
                itemClass = 'page-trips__item';
            } else {
                postType = 'posts'
            }
            return postType;
        }

        //filter button event
        $('.stories-category__item').on('click', function H () {
            $('.stories-category__item').removeClass('stories-category__item_active');
            $(this).addClass('stories-category__item_active');
            flag = true;
            paged = 1;
            categoryId = $(this).attr('data-post-filter');
            requestData();
        });

        //load more event
        btnMore.on('click', function() {
            flag = false;
            $(this).attr('disabled', true);
            $('.load-more__item .load-more__item-text').text('Loading...');
            requestData();
        });

        //request data
        function requestData() {
            data = {
                'action': 'load_posts_by_ajax-archive',
                'post_type': setPostType(),
                'paged': paged,
                'posts_per_page': postsPerPage,
                'category_id': categoryId,
                'itemClass': itemClass,
                'security': '<?php echo wp_create_nonce("load_more_posts-archive"); ?>'
            };

            $.post({ // you can also use $.post here
                url: ajaxurl, // AJAX handler
                data : data,
                dataType: "json", // add data type
                success : function(response) {
                    $('.load-more__item .load-more__item-text').text('Load more');
                    response.maxPages <= paged ? btnMore.hide() : btnMore.attr('disabled', false).fadeIn(600);

                    if(flag) {
                        $('.stories-items_container').empty();
                        paged = 2;
                    } else {
                        paged++;
                    }
                    $('.stories-items_container').append(response.html);
                    $('.page-stories__item').fadeIn(400);
                },
                error: function() {
                    alert('Error server response');
                }
            });
        }
    });
</script>
