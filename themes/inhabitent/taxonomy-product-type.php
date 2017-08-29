<?php
/**
 * The template for displaying the archive pages.
 * 
 * @package inhabitent_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- #page-header -->

				<section class="flex-container">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="flex-product-item">
							<?php if ( has_post_thumbnail() ) : ?>
							<a href=<?php echo get_post_permalink() ?>><div class="product-thumbnail"><?php the_post_thumbnail( 'large' ); ?></div></a>
							<?php endif; ?>
							<div class="product-title-section">
								<h2 class="entry-title">
									<span><?php the_title(); ?></span> 
									<span>....................................</span>
									<span><?php echo CFS()->get( 'price' ); ?></span>
								</h2> <!-- #entry-title -->
							</div> <!-- product-title-section -->
						</div> <!-- #flex-product-item -->

					<?php endwhile; ?>
				</section> <!-- flex-container -->

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>