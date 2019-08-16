<?php
/*
 * Template Name: Contact template
 */
?>

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

    <?php get_template_part('template-parts/sections/contact-section-hero'); ?>

    <div class="contact-page__container">
        <div class="contact-page__item-info" data-aos="fade-right">
            <?php
            if( have_rows('contact_info_section_items') ):
                while ( have_rows('contact_info_section_items') ) : the_row(); ?>
                    <div class="contact-item__container">
                        <div class="contact-item__title"><?php the_sub_field('contact_info_section_item_title'); ?></div>
                        <div class="contact-item__description"><?php the_sub_field('contact_info_section_item_description'); ?></div>
                    </div>
                <?php endwhile;
            endif; ?>
        </div>

        <div class="contact-page__item-content">
            <!-- mobile form-select -->
            <div class="form-tabs__select-wrapper">
                <div class="form-tabs__label">Select a form</div>
                <select name="" class="form-tabs__select" id="form-tabs__select">
                    <option value="<?php the_field('contact_form_1_tab_title'); ?>"><?php the_field('contact_form_1_tab_title'); ?></option>
                    <option value="<?php the_field('contact_form_2_tab_title'); ?>"><?php the_field('contact_form_2_tab_title'); ?></option>
                    <option value="<?php the_field('contact_form_3_tab_title'); ?>"><?php the_field('contact_form_3_tab_title'); ?></option>
                    <option value="<?php the_field('contact_form_5_tab_title'); ?>"><?php the_field('contact_form_5_tab_title'); ?></option>
                </select>
            </div>

            <!-- form-tabs -->
            <div class="form-tabs" id="form-tabs">
                <a class="form-tab__link form-tab__link_active" data-num="1" href="#"><?php the_field('contact_form_1_tab_title'); ?></a>
                <a class="form-tab__link" data-num="2" href="#"><?php the_field('contact_form_2_tab_title'); ?></a>
                <a class="form-tab__link" data-num="3" href="#"><?php the_field('contact_form_3_tab_title'); ?></a>
                <a class="form-tab__link" data-num="4" href="#"><?php the_field('contact_form_5_tab_title'); ?></a>
            </div>

            <div class="forms-wrapper">
                <div class="form-wrapper__item form-wrapper__item_active form-wrapper__item-1 form-wrapper__item-aerocityjets">
                    <?php echo do_shortcode('[gravityform id=2 title=false description=false ajax=true tabindex=49]'); ?>
                </div>
                <div class="form-wrapper__item form-wrapper__item-2 form-wrapper__item-sales">
                    <?php echo do_shortcode('[gravityform id=10 title=false description=false ajax=true tabindex=49]'); ?>
                </div>
                <div class="form-wrapper__item form-wrapper__item-3 form-wrapper__item-maintenance">
                    <?php echo do_shortcode('[gravityform id=8 title=false description=false ajax=true tabindex=49]'); ?>
                </div>
                <div class="form-wrapper__item form-wrapper__item-4 form-wrapper__item-partnerships">
                    <?php echo do_shortcode('[gravityform id=9 title=false description=false ajax=true tabindex=49]'); ?>
                </div>
            </div>
        </div>
    </div>

</main>

<?php get_footer(); ?>
