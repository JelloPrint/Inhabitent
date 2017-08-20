<?php
/**
 * inhabitent Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package inhabitent_Theme
 */
get_header(); ?>

<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

    <section class="home-hero">
        <img src="<?php echo get_template_directory_uri(); ?>/images/inhabitent-logo-full.svg" alt="Image of Inhabitent logo" />
    </section>

    <!-- SHOP STUFF  -->
    <section class="product-shop container">
      <h2>Shop Stuff</h2>
        <?php 
        $args = array( 
          'post_type' => 'product-type' 
        );
        $terms = get_terms( $args );
      ?>

      <?php foreach ($terms as $term): ; ?>

      <div class="product-category">
        <img src="<?php echo get_site_url(); ?>/wp-content/themes/inhabitent/assets/images/product-type-icons/<?echo $term->slug?>.svg"/>
        <p><? echo $term->description; ?></p>
          <div class="green-btn">
            <a href="#"> <?php echo $term->name; ?> Stuff</a>
          </div> <!--#green-btn -->
      </div> <!--#product-category -->

      <?php endforeach; wp_reset_postdata(); ?>
    </section> <!-- Product-Shop Container -->



    <!-- JOURNAL POSTS -->
    <section class="latest-journal-entries container">
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

        <?php foreach ($journal_posts as $post) : setup_postdata( $post );?>

        <div class="latest-journal-entry">
          <div class="container">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail( 'medium' ); ?></a>
            <?php endif; ?>
          </div> <!--#Container -->

        <div class="entry-wrapper">
          <div class="entry-meta">
            <?php inhabitent_posted_on(); ?> / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?> / <?php inhabitent_posted_by(); ?>
          </div> <!--#entry-meta -->
          <h3><a class="Journal-entry-title" href="<? echo get_post_permalink() ?>"><?php the_title(); ?></a><h3>
        </div> <!-- entry-wrapper -->
        
        <div class="black-btn">
          <a href="<?echo get_post_permalink()?>">Read Entry</a>
        </div> <!--#black-btn-->
      </div> <!--#latest-journal-entry -->

        <?php endforeach; wp_reset_postdata(); ?>
    </section> <!--#latest-journal-entries container"-->
  </main> <!--#main -->
</div> <!--#primary -->

<?php get_footer(); ?>