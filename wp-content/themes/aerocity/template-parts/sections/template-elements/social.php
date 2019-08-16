<!-- social -->
<ul class="social-nav">
    <?php
    if( have_rows('socal_items', 'options') ):
        while ( have_rows('socal_items', 'options') ) : the_row(); ?>
            <li class="social-nav__item">
                <a target="_blank" class="social-link" href="<?php the_sub_field('social_item_link'); ?>">
                    <span class="social-nav__item-icon"><?php the_sub_field('social_item_icon'); ?></span>
                </a>
            </li>
        <?php endwhile;
    endif;
    ?>
</ul>