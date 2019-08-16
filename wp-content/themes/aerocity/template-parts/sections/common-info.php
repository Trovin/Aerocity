<!-- common__info-section -->
<div class="common__info-section">
    <div class="common__info-wrapper">
        <?php the_field('common_section_info_content'); ?>
    </div>

    <?php
    $link = get_field('section_info_link');

    if( $link ):
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
        <a class="btn btn_large btn_large_info" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
    <?php endif; ?>
</div>