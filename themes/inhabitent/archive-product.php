<?php
/**
 * Template: for displaying archive products
 *
 * @package inhabitent_Theme
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php query_posts( array( 
				'post_type' =>'product', 
				'orderby' 	=> 'date', 
				'order' 		=> 'ASC' 
				) ); 
			?>

			<?php
				$args = array( 
					'post_type' => 'product-type'
				);
				$product_types = get_terms( $args ); // returns an array of posts
			?>

			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title>', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>

					<div class="flex-container-no-wrap">
						<?php foreach ( $product_types as $product_type ) : setup_postdata( $product_type ); ?>
							<div class="product-type-name">
								<a class="text-uppercase" href="<?php echo home_url() ?>/product-type/<?php echo $product_type->slug ?>"><?php echo $product_type->name ?></a>
							</div> <!--#product-type-name"-->

						<?php endforeach; wp_reset_postdata(); ?>
					</div> <!-- #flex-container-no-wrap -->
				</header> <!-- page-header -->

				<section class="flex-container">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="flex-product-item">
							<?php if ( has_post_thumbnail() ) : ?>
								<a href=<?php echo get_post_permalink() ?>><div class="product-thumbnail"><?php the_post_thumbnail( 'large' ); ?></div></a>
							<?php endif; ?>
								<div class="product-title">
									<h2 class="entry-title">
										<span><?php the_title(); ?></span> 
										<span>.....................................</span>
										<span><?php echo CFS()->get( 'price' ); ?></span>
									</h2> <!--#entry-title -->
								</div> <!--#product-title -->
						</div> <!--#flex-product-item -->
					<?php endwhile; ?>
				</section> <!--#flex-container -->
			<?php endif; ?>

		</main> <!-- #main -->
	</div> <!-- #primary -->
	
<?php get_footer(); ?>3