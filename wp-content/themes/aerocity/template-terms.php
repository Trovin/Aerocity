<?php
/*
 * Template Name: Terms & conditions template
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

            <?php get_template_part('template-parts/sections/policy--section-hero'); ?>

            <div class="policy-content">
                <div class="page-container page-container_policy">
                    <?php the_content(); ?>
                </div>
            </div>

        <?php endwhile; ?>
    </main>

<?php get_footer(); ?>