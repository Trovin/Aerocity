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
        <div class="hero-justify">
            <?php get_template_part('template-parts/sections/single-careers--section-hero'); ?>
        </div>

        <!-- single career content -->
        <div class="single-career__wrapper">
            <div class="single-career__content">
                <div class="page-container">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>

        <div class="singe-career__form">
            <div class="page-container">
                <?php echo do_shortcode('[gravityform id=11 title=false description=false ajax=true tabindex=49]'); ?>
            </div>
        </div>
    <?php endwhile; ?>

</main>

<?php get_footer(); ?>
