<?php /* Template Name: Frank*/ ?>
 
<?php get_header(); ?>

<div class="top-space">
        <div class="inner-bnr">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <h1>  <?php the_title(); ?> </h1>
                    </div>

                </div>
            </div>
        </div>
    </div>
 
        <div class="container">
<?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'page' ); ?>
      <?php endwhile; // end of the loop. ?>
        </div>

<?php get_footer(); ?>