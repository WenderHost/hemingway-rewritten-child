<?php
/**
 * @package Hemingway Rewritten
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->

        <div class="row">
          <div class="col-md-8 entry-content" style="padding-right: 4rem;">
            <?php the_content(); ?>
          </div>
          <div class="col-md-4">
            <?php
            if( has_post_thumbnail() )
              the_post_thumbnail( 'large' );

            if( $form_id = get_post_meta( $post->ID, 'registration_form', true ) )
              gravity_form( $form_id, false, false, false, false, 99 );
            ?>
          </div>
        </div>
      </article><!-- #post-## -->

        <?php
          // If comments are open or we have at least one comment, load up the comment template
          if ( comments_open() || '0' != get_comments_number() ) :
            comments_template();
          endif;
        ?>

      <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>
