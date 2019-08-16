<?php get_header('pages'); ?>

	<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="page-header">
                <div class="page-container">
				    <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'theme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                </div>
			</header>

			<?php while ( have_posts() ) : the_post(); ?>
                <div class="page-container">
				    <?php get_template_part( 'template-parts/content', 'search' ); ?>
                </div>
			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>
            <div class="page-container">
			    <?php get_template_part( 'template-parts/content', 'none' ); ?>
            </div>
		<?php endif; ?>

	</main>

<?php get_footer(); ?>
