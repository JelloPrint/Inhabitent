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

    <section class="shop-stuff container">
        <h2>Shop Stuff</h2>
            <div class="product-type-blocks">
                <?php 
                    $args = array( 'post_type' => 'product-type' );
                    $terms = get_terms( $args );
                ?>

                <?php foreach ($terms as $term): ; ?>
                    <div class="product-type-block-wrapper">
                        <img src="<?php echo get_site_url(); ?>/wp-content/themes/inhabitent/images/product-type-icons/<?php echo $term->slug?>.svg"/>
                            <p><?php echo $term->description; ?></p>
                            <div class="shop-btn">
                                <a href="<?php echo get_site_url(); ?>/<?php echo $term->taxonomy; ?>/<?php echo $term->slug; ?>"> <?php echo $term->name; ?> Stuff</a>
                            </div><!-- .shop-btn -->
                        </div><!-- .product-type-block-wrapper -->
                    <?php endforeach; ?>
        </div><!-- .product-type-blocks -->
    </section><!-- shop-stuff .container -->


    <!-- Latest JOURNAL POSTS -->
    <section class="latest-entries container">
        <h2>Inhabitent Journal</h2>
        <div class="recent-journals">

            <?php /* Start the Loop */ ?>
            <?php
                $args = array( 
                'post_type' => 'post',
                'order' => 'DESC', 
                'posts_per_page' => 3, 
                'orderby' => 'date' 
                );

                $journal_posts = get_posts( $args ); // returns an array of posts
                ?>

                <?php foreach ( $journal_posts as $post ) : setup_postdata( $post ); ?>

                <div class="recent-journal-block-item">
                    <div class="thumbnail-wrapper">
                        <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'large' ); ?>
                        <?php endif; ?><!-- has_post_thumbnail -->         
                    </div><!-- .thumbnail-wrapper -->

                    <div class="entry-wrapper">
                        <div class="entry-meta">
                            <?php inhabitent_posted_on(); ?> / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?>
                        </div><!-- .entry-meta -->
                        <h3><a class="journal-entry-title" href="<?php echo get_post_permalink() ?>"><?php the_title(); ?></a></h3>
                    </div><!-- .entry-wrapper -->          
                    <div class="front-black-btn"> 
                        <href="<?php echo get_post_permalink()?>">Read Entry</a>
                    </div><!--black-btn -->
                </div><!-- .recent-journal-block-item -->

                <?php endforeach; wp_reset_postdata(); ?>

        </div><!-- .recent-journals -->
    </section><!-- .latest-entries container -->


    <!--Adventures POSTS--> 
    <section class="adventures container">
	    <h2>Latest Adventures</h2>
            <div class="all-adventures">	
                <div class="left-box">
                    <h3>Getting Back to Nature in a Canoe<a href="<?php the_permalink(); ?>"></a></h3>
                    <a class="adv-btn" href="<?php the_permalink(); ?>">Read More</a>
                </div>
                <div class="right-boxes">
                    <div class="top-right-box">
                        <h3>A Night with Friends at the Beach<a href="<?php the_permalink(); ?>"></a></h3>
                        <a class="adv-btn" href="<?php the_permalink(); ?>">Read More</a>
                    </div>
                <div class="small-bottom-box-left">
                    <h3>Taking in the View at Big Mountain<a href="<?php the_permalink(); ?>"></a></h3>
                    <a class="adv-btn" href="<?php the_permalink(); ?>">Read More</a>
                </div>
                <div class="small-bottom-box-right">
				    <h3>Star-Gazing at the Night Sky<a href="<?php the_permalink(); ?>"></a></h3>
				    <a class="adv-btn" href="<?php the_permalink(); ?>">Read More</a>
                </div>
		    </div>
        </div>
	</section>

  </main> <!--#main -->
</div> <!--#primary -->

<?php get_footer(); ?>