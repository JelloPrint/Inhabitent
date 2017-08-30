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


    <!-- Latest JOURNAL POSTS -->
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
            <a class="black-btn" href="<?echo get_post_permalink()?>">Read Entry</a>
        </div> <!--#latest-journal-entry -->

        <?php endforeach; wp_reset_postdata(); ?>
    </section> <!--#latest-journal-entries container"-->

    <!--Adventures POSTS--> 
    <section class="adventures-container">
            <h2>Latest Adventures</h2>
                <div class="all-boxes">
                    <div class="left-side-boxes">
                        <ul class="adventure-boxes">
                            <li class="adventure-box1">
                                <h3 class="adventure-text"> Getting Back to Nature in a Canoe
                                </h3>
                                <a class="white-btn">Read More</a>
                            </li>
                        </ul>
                    </div>
                    <div class="right-side-boxes">
                        <ul class="adventure-boxes">
                            <li class="adventure-box2">
                                <h3 class="adventure-text"> A Night with Friends at the Beach
                                </h3>
                                <a class="white-btn">Read More</a>
                            </li>
                            <li class="adventure-box3">
                                <h3 class="adventure-text"> Taking in the View at Big Mountain
                                </h3>
                                <a class="white-btn">Read More</a>
                            </li>
                            <li class="adventure-box4">
                                <h3 class="adventure-text"> Star-Gazing at the Night Sky
                                </h3>
                                <a class="white-btn">Read More</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <p>
                    <a>More Adventures</a>
                </p>
    </section> 

  </main> <!--#main -->
</div> <!--#primary -->

<?php get_footer(); ?>