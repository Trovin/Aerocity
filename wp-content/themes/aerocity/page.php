<?php get_header('pages'); ?>

	<main id="main" class="page-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
            <div class="page-container">
			    <?php get_template_part( 'template-parts/content', 'page' ); ?>
            </div>
		<?php endwhile; ?>

	</main>

<?php get_footer(); ?>
