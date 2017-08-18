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