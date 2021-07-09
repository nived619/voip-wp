<?php /* Template Name: Custom Blog Page*/ 
$currentID =  get_the_ID();

global $post;
$author_id = $post->post_author;
$authord = get_the_author_meta( 'display_name', $author_id);
get_header(); ?>

<section class="blog-details-sec">
	<div class="container">
		<div class="blog-det-title">
            <h1 data-animate="fadeInUp" data-delay=".1"><?php echo get_the_title( $currentID ); ?></h1>
            <div class="author-block" data-animate="fadeInUp" data-delay=".2">
                <div class="photo">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/author-1.png" alt="">
                </div>
                <div class="details">
                    <h5>By: <?php echo wpautop(get_the_author_meta('display_name', $author_id)); ?></h5>
                    <p>Posted <?php echo get_the_time('F dS , Y', $currentID); ?></p>
                </div>
            </div>
            <?php 
                if (get_the_post_thumbnail_url( $currentID, 'full' ) ){
                    ?>
            <div class="lg-img"  data-animate="fadeInUp" data-delay=".3">
                <img src="<?php echo get_the_post_thumbnail_url( $currentID, 'full' );?>" alt="">
            </div>
            <?php } ?>
		</div>

        <div class="blog-details-bottom-block">
            <div class="soc-link-block">
                <a data-animate="fadeInUp" data-delay=".1" href="https://www.instagram.com/sharer.php?u=<?php the_permalink($currentID) ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                <a data-animate="fadeInUp" data-delay=".2" href="<?php the_permalink($currentID) ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                <a data-animate="fadeInUp" data-delay=".3" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink($currentID) ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </div>
            <div class="details-left-block">
                <h2 data-animate="fadeInUp" data-delay=".2"><?php echo get_the_title( $currentID ); ?> </h2>
                <p data-animate="fadeInUp" data-delay=".2"><?php echo wpautop(get_post_field('post_content', $currentID)); ?></p>
              <!--   <div class="img-block">
                    <img data-animate="fadeInUp" data-delay=".2" src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/blog-sm-1.png" alt="">
                </div> -->
                <!-- <h2 data-animate="fadeInUp" data-delay=".2">nostrud exercitation ullamco laboris</h2>
                <p data-animate="fadeInUp" data-delay=".2">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur . Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</p> -->
            </div>
        </div>
	</div>
</section>
<section class="recent-block-sec">
    <div class="container">
        <div class="recent-block-container">
            <?php $category = get_the_category($currentID);?>
            <h2 class="recent-title" data-animate="fadeInUp" data-delay=".2"><?php echo $category[0]->name ?></h2>
            <div data-animate="fadeInUp" data-delay=".2" class="owl-carousel recent-block-carousel owl-theme"  data-owl-items="3" data-owl-center="true" data-owl-autoplay= "true" data-owl-speed= "4000" data-owl-margin="50" data-owl-responsive='{"0": {"items": "1"}, "768": {"items": "2"}, "991": {"items": "3"}}' data-navText= '[$(".am-next"),$(".am-prev")]'>
                <?php // Display blog posts on any page @ https://m0n.co/l
                            $temp = $wp_query; $wp_query= null;
                            $cat_args = array(
                            'post_type'=> 'post',
                            'numberposts' => -1,
                            'orderby'    => 'ID',
                            'post_status' => 'publish',
                            'order'    => 'DESC',
                            'category_name' => $category[0]->name,
                            );
                            $wp_query = new WP_Query($cat_args); 
                            // $wp_query->query('posts_per_page=6','category_name='.$category[0]->name);
                            while ($wp_query->have_posts()) : $wp_query->the_post(); 
                                if(get_the_ID() != $currentID){
                         ?>
                         <div class="item">
                    <div class="recent-card">
                        <div class="recent-card-top">
                             <?php 
                                        if (get_the_post_thumbnail_url($post->ID, 'full' ) ){
                                            ?>
                            <div class="recent-img">
                                <img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' );?>" alt="">
                            </div>
                            
                                    <?php } ?>
                        
                            <div class="text-block">
                                <div class="title-label-block">
                                    <span class="title-label">The Newest</span>
                                </div>
                                <h2><?php the_title(); ?></h2>
                                <p><?php $content = get_post_field('post_content'); ?>
                                            <?php echo mb_strimwidth($content, 0, 400, '...');?></p>
                            </div>
                        </div>
                        <div class="recent-card-bottom">
                            <div class="details-wrapper d-flex">
                                <div class="author-block">
                                   
                                    <div class="photo">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/author-1.png" alt="">
                                    </div>
                                    <div class="details">
                                        <h5>By: <?php echo wpautop(get_the_author_meta('display_name', $author_id)); ?> </h5>
                                        <p><?php echo get_the_time('F dS , Y'); ?></p></p>
                                    </div>
                                </div>
                                <div class="details-btn-block">
                                    <a href="<?php the_permalink() ?>" class="btn readmore-btn">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                         <?php 
                     }
                 endwhile; ?>
               <!--  <div class="item">
                    <div class="recent-card">
                        <div class="recent-card-top">
                            <div class="recent-img">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/recent-1.png" alt="">
                            </div>
                        
                            <div class="text-block">
                                <div class="title-label-block">
                                    <span class="title-label">The Newest</span>
                                </div>
                                <h2>nostrud exercitation ullamco laboris</h2>
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                            </div>
                        </div>
                        <div class="recent-card-bottom">
                            <div class="details-wrapper d-flex">
                                <div class="author-block">
                                    <div class="photo">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/author-1.png" alt="">
                                    </div>
                                    <div class="details">
                                        <h5>By: David Edison </h5>
                                        <p>10 Dec 2020</p>
                                    </div>
                                </div>
                                <div class="details-btn-block">
                                    <a href="#" class="btn readmore-btn">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="recent-card">
                        <div class="recent-card-top">
                            <div class="recent-img">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/recent-2.png" alt="">
                            </div>
                        
                            <div class="text-block">
                                <div class="title-label-block">
                                    <span class="title-label">The Newest</span>
                                </div>
                                <h2>nostrud exercitation ullamco laboris</h2>
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                            </div>
                        </div>
                        <div class="recent-card-bottom">
                            <div class="details-wrapper d-flex">
                                <div class="author-block">
                                    <div class="photo">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/author-1.png" alt="">
                                    </div>
                                    <div class="details">
                                        <h5>By: David Edison </h5>
                                        <p>10 Dec 2020</p>
                                    </div>
                                </div>
                                <div class="details-btn-block">
                                    <a href="#" class="btn readmore-btn">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="recent-card">
                        <div class="recent-card-top">
                            <div class="recent-img">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/recent-3.png" alt="">
                            </div>
                        
                            <div class="text-block">
                                <div class="title-label-block">
                                    <span class="title-label">The Newest</span>
                                </div>
                                <h2>nostrud exercitation ullamco laboris</h2>
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                            </div>
                        </div>
                        <div class="recent-card-bottom">
                            <div class="details-wrapper d-flex">
                                <div class="author-block">
                                    <div class="photo">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/author-1.png" alt="">
                                    </div>
                                    <div class="details">
                                        <h5>By: David Edison </h5>
                                        <p>10 Dec 2020</p>
                                    </div>
                                </div>
                                <div class="details-btn-block">
                                    <a href="#" class="btn readmore-btn">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="recent-card">
                        <div class="recent-card-top">
                            <div class="recent-img">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/recent-2.png" alt="">
                            </div>
                        
                            <div class="text-block">
                                <div class="title-label-block">
                                    <span class="title-label">The Newest</span>
                                </div>
                                <h2>nostrud exercitation ullamco laboris</h2>
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                            </div>
                        </div>
                        <div class="recent-card-bottom">
                            <div class="details-wrapper d-flex">
                                <div class="author-block">
                                    <div class="photo">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/author-1.png" alt="">
                                    </div>
                                    <div class="details">
                                        <h5>By: David Edison </h5>
                                        <p>10 Dec 2020</p>
                                    </div>
                                </div>
                                <div class="details-btn-block">
                                    <a href="#" class="btn readmore-btn">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 -->
                

                
                
            </div>

            <div class="my-owl-nav" data-animate="fadeInUp" data-delay=".2">
                <span class="arrow-custom-btn my-next-button">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/slider-left-arrow.svg" alt="Slider Icon"> Previous blog
                </span>
                <span class="arrow-custom-btn my-prev-button">
                    Next blog <img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/slider-right-arrow.svg" alt="Slider Icon">
                </span>
              </div>
        </div>
    </div>
  
</section>



<!-- Start account Area -->
<section class="pt-50 bg-blue">
	<div class="container">
		<div class="row d-flex">
			<div class="col-md-5 offset-md-1">
				<!-- Start Section Title -->
				<div class="section-title text-center">
					<img src="<?php echo get_template_directory_uri() ?>/assets/img/logos/logo-symbol-voip.png" width="70" class="svg" alt="feature Icon">
					<h3 data-animate="fadeInUp" data-delay=".3">Get your free account</h3>
					<p class="gray-color" data-animate="fadeInUp" data-delay=".5">Start using voice and messaging by the minute or message now</p>
					<br><br>
					<a data-animate="fadeInUp" data-delay=".5" href="https://dashboard.voipessential.com/customer/register" class="hero-btn btn contact-us-index">Sign up</a>
				</div>
				<!-- End Section Title -->
			</div>
			<div class="col-md-5">
				<!-- Start Section Title -->
				<div class="section-title text-center">
					<img src="<?php echo get_template_directory_uri() ?>/assets/img/logos/logo-symbol-voip.png" width="70" class="svg" alt="feature Icon">
					<h3 data-animate="fadeInUp" data-delay=".3">Request a quote</h3>
					<p class="gray-color" data-animate="fadeInUp" data-delay=".5">We'll answer your questions and explore your needs in-depth</p>
					<br><br>
					<a data-animate="fadeInUp" data-delay=".5" href="/contact.html" class="btn-white bg-white">Contact sales</a>
				</div>
				<!-- End Section Title -->
			</div>
		</div>
	</div>
</section>
<!-- End account Area -->

<?php get_footer(); ?>
