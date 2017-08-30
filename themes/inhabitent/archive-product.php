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

			<div class="container">
				<header class="page-header">
					
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>

					<ul class="product-type-list">	
						<?php foreach ( $product_types as $product_type ) : setup_postdata( $product_type ); ?>
							<li class="product-type-list">
								<a href="<?php echo home_url() ?>/product-type/<?php echo $product_type->slug ?>"><?php echo $product_type->name ?></a>
							</li><!-- .product-type-list -->
						<?php endforeach; wp_reset_postdata(); ?>
					</ul><!-- .product-type-list -->
				</header> <!-- page-header -->

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
				<?php endif; ?>

			</div><!-- .container -->
			
		</main> <!-- #main -->
	</div> <!-- #primary -->
	
<?php get_footer(); ?>3