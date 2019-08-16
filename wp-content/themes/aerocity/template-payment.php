<?php
/*
 * Template Name: Payment template
 */
?>

<?php get_header(); ?>

<main id="main" class="page-main" role="main">
    <?php while ( have_posts() ) : the_post(); ?>

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

        <?php get_template_part('template-parts/sections/payment--section-hero'); ?>

        <div class="payment-content">
            <div class="page-container page-container_payment">
                <div class="payment-form">
                    <?php echo do_shortcode('[gravityform id=1 title=false description=false ajax=true tabindex=49]'); ?>
                </div>
            </div>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
