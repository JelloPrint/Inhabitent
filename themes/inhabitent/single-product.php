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
          <div class="product-image-wrapper">
  
            <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'large' ); ?>
            <?php endif; ?>
          </div> <!-- #product-image-wrapper" -->

        <div class="product-content-wrapper">
          <header class="entry-header">
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
          </header><!-- .entry-header -->

        <div class="entry-content">
          <p class="price"><?php echo CFS()->get( 'price' ); ?></p>
          <?php the_content(); ?>
            <div class="social-media-buttons">
              <button type="button" class="black-btn"><i class="fa fa-facebook"></i> Like</button>
              <button type="button" class="black-btn"><i class="fa fa-twitter"></i> Tweet</button>
              <button type="button" class="black-btn"><i class="fa fa-pinterest"></i> Pin</button>
            </div> <!-- #social-media-buttons -->

          <?php
            wp_link_pages( array(
              'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
              'after' => '</div>',
              ) );
            ?>
            <?php endwhile; // End of the loop. ?>
          </div> <!-- #entry-content -->
        </div> <!-- #product-content-wrapper -->
      </article> <!-- #post -->

  </main> <!-- #main -->
</div> <!-- #primary -->

<?php get_footer(); ?>