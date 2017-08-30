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

			<div class="container">
					<header class="page-header">
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<div class="product-grid">
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="product-grid-item">
								<div class="thumbnail-wrapper">
									<?php if ( has_post_thumbnail() ) : ?>
									<a href=<?php echo get_post_permalink() ?>><div class="product-thumbnail"><?php the_post_thumbnail( 'large' ); ?></div></a>
								</div><!-- .thumbnail-wrapper --> 
								<?php endif; ?>
								<div class="product-info">
									<h2 class="entry-title">
										<?php the_title(); ?>
									</h2><!-- .entry-title --> 
									<span class="price">
										<?php echo CFS()->get( 'price' ); ?>
									</span><!-- .price -->
								</div> <!-- product-info -->
							</div> <!-- .product-grid-item -->

						<?php endwhile; ?>
					</div> <!-- .product-grid -->

				<?php endif; ?>
			</div><!-- .container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>