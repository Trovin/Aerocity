<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php get_template_part( 'template-parts/head' ); ?>
</head>

<body <?php body_class("page-body"); ?>>
<div class="wrapper" id="app">
    <div class="content">

        <!-- header -->
        <header class="header header_pages">
            <div class="page-container page-container_header">
                <nav class="main-nav" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_class' => 'main-nav__list', 'container' => false ) ); ?>
                </nav>

                <div class="header__right-part">
                    <a href="<?php echo get_home_url(); ?>" class="flex">
                        <img src="<?php the_field('website_logo_image', 'options'); ?>" class="main-logo__image style-svg" alt="main-logo__image">
                    </a>

                    <div class="modal-icon">
                        <img src="<?php echo get_template_directory_uri().'/dist/icons/modal-menu__icon.svg' ?>" class="modal-icon__image style-svg" alt="modal-icon__image" />
                    </div>
                </div>
            </div>

            <!-- modal-menu -->
            <div class="modal-menu">
                <div class="modal-menu__flex">
                    <div class="modal-menu__images">
                        <?php
                        if( have_rows('modal-menu_images', 'options') ):
                            while ( have_rows('modal-menu_images', 'options') ) : the_row(); ?>
                                <div class="modal-menu__image-item" style="background-image: url(<?php the_sub_field('modal-menu_image'); ?>)"></div>
                            <?php endwhile;
                        endif;
                        ?>
                    </div>

                    <div class="modal-menu__content">
                        <div class="modal-menu__content-inner">
                            <nav class="modal-nav" role="navigation">
                                <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_class' => 'modal-nav__list modal-nav__list-main', 'container' => false ) ); ?>
                            </nav>

                            <nav class="modal-nav" role="navigation">
                                <?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_class' => 'modal-nav__list modal-nav__list-additional', 'container' => false ) ); ?>
                            </nav>
                        </div>

                        <ul class="social-nav social-nav_header">
                            <?php
                            if( have_rows('socal_items', 'options') ):
                                while ( have_rows('socal_items', 'options') ) : the_row(); ?>
                                    <li class="social-nav__item">
                                        <a target="_blank" href="<?php the_sub_field('social_item_link'); ?>">
                                            <span class="social-nav__item-icon"><?php the_sub_field('social_item_icon'); ?></span>
                                        </a>
                                    </li>
                                <?php endwhile;
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>

            <?php if(!is_archive()) : ?>
                <!-- contact button for template pages -->
                <?php $link = get_field('contact_button');
                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn btn_contact" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo mb_strimwidth( $link_title, 0, 9, '' ); ?></a>
                <?php endif; ?>
            <?php else : ?>
                <!-- contact button for archive pages -->
                <?php
                $link = get_field('archives_contact_button', 'options');
                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn btn_contact" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo mb_strimwidth( $link_title, 0, 9, '' ); ?></a>
                <?php endif; ?>
            <?php endif; ?>
        </header>
