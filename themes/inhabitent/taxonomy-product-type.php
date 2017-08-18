<?php
/**
 * The template for displaying single products page.
 *
 * @package inhabitent_theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header>

		

			<div class="shop-container">
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
			<div class="product-wrapper">
				<?php if ( has_post_thumbnail() ) : ?>
            <a href='<?php the_permalink();?>'>
        <?php the_post_thumbnail('medium'); ?></a>
        <?php endif; ?>
			

			<div class="product-content">
			<div>
      <p><?php the_title(); ?></p>
      </div>
			<p><?php echo CFS()->get('price'); ?></p> 

			</div><!-- .content-wrapper -->
			</div><!-- .product-wrapper -->
			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>