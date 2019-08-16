<?php get_header('pages'); ?>

<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
            <div class="page-container">
			    <?php get_template_part( 'template-parts/content', 'single'); ?>
            </div>

		<?php endwhile; ?>

	</main>

<?php get_footer(); ?>
