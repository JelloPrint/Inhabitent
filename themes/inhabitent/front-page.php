<?php
/**
 * inhabitent Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package inhabitent_Theme
 */
get_header(); ?>

<section class="home-hero">
  <main id="main" class="site-main" role="main">
    <img src="<?php echo get_template_directory_uri(); ?>/images/inhabitent-logo-full.svg" alt="Image of Inhabitent logo" />
</section>




<!-- <section class="category-info container">
    <h2>shop stuff</h2>
<?php
    $args = array(
    'post_type' => 'product-type'
    );

    $product_types = get_terms( $args ); // returns an array of posts
?>
    <div class="flex-container-no-wrap">
    <?php foreach ($product_types as $product_type) :
        setup_postdata( $product_type );
    ?>
      <div class="category-info-items">
        <div class="single-category-item>
          <img src=<?php echo get_stylesheet_directory_uri() . '/images/' . strtolower($product_type->name) .'.svg' ; ?> alt="<?php echo $product_type->name . ' category icon' ?>">
            <p><?php echo $product_type->description ?></p>
              <a class="text-uppercase" href="<?php echo home_url() ?>/product-type/<?php echo $product_type->slug ?>"><?php echo $product_type->name . ' Stuff' ?></a>
            </div>
          </div>
        <?php endforeach; wp_reset_postdata(); ?>
          </div>
</section> -->


<!-- JOURNAL POSTS -->
<section class="latest-journal-post container">
  <h2>inhabitent journal</h2>
<?php
  $args = array(
    'post_type'   => 'post',
    'order'       => 'DESC',
    'numberposts' => 3,
    'orderby'     => 'date',
  );
  $journal_posts = get_posts( $args ); // returns an array of posts
?>


<?php foreach ($journal_posts as $post) :
    setup_postdata( $post );
?>
  <div class="journal-recent-block-item">
    <div class="journal-thumbnail-wrapper">
      <?php if (has_post_thumbnail()) : ?>
      <?php the_post_thumbnail( 'medium' ); ?></a>
      <?php endif; ?>
  </section> <!--#JOURNAL POSTS -->

  </div class="entry-meta"> <!--META JOURNAL POSTS -->
    <?php inhabitent_posted_on(); ?> / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?> / <?php inhabitent_posted_by(); ?>
  </div>
    <a href="<? echo get_post_permalink() ?>"><?php the_title(); ?></a>
  </div>
    <?php endforeach; wp_reset_postdata(); ?>
  </div>

<?php get_footer(); ?>