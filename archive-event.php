<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hemingway Rewritten
 */

get_header(); ?>

  <section id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php if ( have_posts() ) : ?>

      <header class="page-header">
        <h1 class="page-title">Events</h1>
      </header><!-- .page-header -->

      <?php /* Start the Loop */ ?>
      <?php
      $postsArray = [];
      while ( have_posts() ) : the_post();
        $image = ( has_post_thumbnail() )? get_the_post_thumbnail( $post, 'large' ) : '<img src="https://placehold.it/300x650" />';
        $postsArray[] = [
          'image' => $image,
          'permalink' => get_the_permalink()
        ];
      endwhile;

      $cols = 3;
      $col = 1;
      $counter = 1;
      $postCount = count( $postsArray );
      foreach ( $postsArray as $p ) {
        if( 1 === $col )
          echo '<div class="row">';

        echo '<div class="event col-sm-' . intval(12/$cols). '"><a href="' . $p['permalink'] . '">' . $p['image'] . '</a></div>';

        if( $col === $cols || $counter === $postCount ){
          echo '</div>';
          $col = 1;
        } else {
          $col++;
          $counter++;
        }
      }
      ?>
      <?php hemingway_rewritten_paging_nav(); ?>

    <?php else : ?>

      <?php get_template_part( 'content', 'none' ); ?>

    <?php endif; ?>

    </main><!-- #main -->
  </section><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
