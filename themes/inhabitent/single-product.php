<?php
/**
 * The template for displaying all single product posts.
 *
 * @package inhabitent_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
      <?php while ( have_posts() ) : the_post(); ?>
      
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'large' ); ?>
          <?php endif; ?>
        </header>

        <section class="entry-content">
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
          <p class="price"><?php echo CFS()->get( 'price' ); ?></p>
          <?php the_content(); ?>
          <?php
            wp_link_pages( array(
              'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
              'after'  => '</div>',
            ) );
					?>
					<?php endwhile; ?>
        </section>
      	</article>
		
		</main>
	</div>

<?php get_footer(); ?>
