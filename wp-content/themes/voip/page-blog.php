<?php /* Template Name: Blog Page */
$currentID =  get_the_ID();

global $post;
$author_id = $post->post_author;
$authord = get_the_author_meta( 'display_name', $author_id);

get_header(); 
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$latest_args = array(
    'post_type'=> 'post',
    'posts_per_page' => 6,
    'orderby'    => 'ID',
    'post_status' => 'publish',
    'order'    => 'DESC'
    );
$latest_blogs = new WP_Query( $latest_args );
$postCount = count($latest_blogs->posts);
$count = 0;
?>

<section class="blog-title-sec">
	<div class="container">
		<div class="blog-title-container" data-animate="fadeInUp" data-delay=".1">
			<div class="blog-title-block">
				<h1 data-animate="fadeInUp" data-delay=".1">VoIP Essential <br><span class="qoutes-txt"><span class="quotes first">"</span>Blog<span class="quotes last">"</span></span></h1>
				<p data-animate="fadeInUp" data-delay=".3">nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum</p>
				<div class="title-inp-cover" data-animate="fadeInUp" data-delay=".35">
					<div class="input-group">
						<div class="input-group-prepend">
						  <span class="input-group-text">
							  <img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/search.svg" alt="">
						  </span>
						</div>
						<input type="search" class="form-control" aria-label="Search" placeholder="Search" id="topic">
						<div class="input-group-append">
							<button class="go-btn btn blog-srch" type="button" onclick="blogSearch()">GO</button>
						  </div>
					  </div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="blog-card-sec">
	<div class="blog-card-container" id="post-data">
		 <?php
        if ( $latest_blogs-> have_posts() ) :
        //$count = 0;?>
        <?php while ( $latest_blogs->have_posts() ) : $latest_blogs->the_post();
        global $post;
        //$count++;
        $userPost = get_userdata($post->post_author);
        ?>
          <div class="blog-card-wrapper d-flex">
               <div class="img-col" data-animate="fadeInUp" data-delay=".2">
                    <img src="<?php echo get_the_post_thumbnail_url($post->ID);?>" alt="">
               </div>
               <div class="text-col">
                    <div class="text-block" data-animate="fadeInUp" data-delay=".2">
                         <div class="title-label-block">
                              <span class="title-label">The Newest</span>
                         </div>
                         <h2><?php the_title(); ?> </h2>
                         <p><?php echo strlen(get_the_content())>200?substr(get_the_content(), 0, 400) . "...":get_the_content(); ?></p>
                         <div class="details-wrapper d-flex">
                              <div class="author-block">
                                   <div class="photo">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/author-1.png" alt="">
                                   </div>
                                   <div class="details">
                                        <h5>By: <?php echo wpautop(get_the_author_meta('display_name', $author_id)); ?></h5>
                                   <p>Posted <?php echo get_the_time('F dS , Y', $currentID); ?></p>
                                   </div>
                              </div>
                              <div class="details-btn-block">
                                   <a href="<?php echo get_permalink($post->ID); ?>" class="btn readmore-btn">Read more</a>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <?php 
                // if($count >= 1){
                // break;
                // }
                endwhile; ?>
                <?php endif; wp_reset_postdata();
                ?>
                
		<!-- <div class="blog-card-wrapper d-flex">
			<div class="img-col" data-animate="fadeInUp" data-delay=".2">
				<img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/bog-sm-2.png" alt="">
			</div>
			<div class="text-col">
				<div class="text-block" data-animate="fadeInUp" data-delay=".2">
					<div class="title-label-block">
						<span class="title-label">The Newest</span>
					</div>
					<h2>nostrud exercitation ullamco laboris <br>
						nisi ut aliquip ex ea commodo </h2>
					<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
					<div class="details-wrapper d-flex">
						<div class="author-block">
							<div class="photo">
								<img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/author-1.png" alt="">
							</div>
							<div class="details">
								<h5>By: David Edison </h5>
								<p>Just Now</p>
							</div>
						</div>
						<div class="details-btn-block">
							<a href="#" class="btn readmore-btn">Read more</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="blog-card-wrapper d-flex">
			<div class="img-col" data-animate="fadeInUp" data-delay=".2">
				<img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/bog-sm-3.png" alt="">
			</div>
			<div class="text-col">
				<div class="text-block" data-animate="fadeInUp" data-delay=".2">
					<div class="title-label-block">
						<span class="title-label">The Newest</span>
					</div>
					<h2>nostrud exercitation ullamco laboris <br>
						nisi ut aliquip ex ea commodo </h2>
					<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
					<div class="details-wrapper d-flex">
						<div class="author-block">
							<div class="photo">
								<img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/author-1.png" alt="">
							</div>
							<div class="details">
								<h5>By: David Edison </h5>
								<p>Just Now</p>
							</div>
						</div>
						<div class="details-btn-block">
							<a href="#" class="btn readmore-btn">Read more</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="blog-card-wrapper d-flex">
			<div class="img-col" data-animate="fadeInUp" data-delay=".2">
				<img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/bog-sm-4.png" alt="">
			</div>
			<div class="text-col">
				<div class="text-block" data-animate="fadeInUp" data-delay=".2">
					<div class="title-label-block">
						<span class="title-label">The Newest</span>
					</div>
					<h2>nostrud exercitation ullamco laboris <br>
						nisi ut aliquip ex ea commodo </h2>
					<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
					<div class="details-wrapper d-flex">
						<div class="author-block">
							<div class="photo">
								<img src="<?php echo get_template_directory_uri() ?>/assets/img/blog-new/author-1.png" alt="">
							</div>
							<div class="details">
								<h5>By: David Edison </h5>
								<p>Just Now</p>
							</div>
						</div>
						<div class="details-btn-block">
							<a href="#" class="btn readmore-btn">Read more</a>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	</div>
	<div class="row searchblogs">
   </div>
   <div class="row slider_res">
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
 <script type="text/javascript">
  var ppp = 6; // Post per page
	var page = 1;
  // loadMoreData(1);
  blogSearch(page,ppp);
  $(window).scroll(function() {
      if($(window).scrollTop() + $(window).height() >= $(document).height()) {
          page++;
          loadMoreData(page,ppp);
          // blogSearch(page,ppp);
      }
  });
  function loadMoreData(page,ppp){
  	jQuery.ajax({
        url: ajaxurl,
        method: "post",
        dataType: "json",
        data: {
            action: "load_more",page,ppp
        },
        success:function(response){
        	// console.log(response.rendered_html);
        	if(response.rendered_html == ""){
            return;
          }
          $("#post-data").append(response.rendered_html);
          $(".text-block").css('visibility', 'visible');
          $(".img-col").css('visibility', 'visible');
        },
        error: function(data) {
            alert("error");
        }
    });
  }
  function blogSearch(page,ppp){
		$('.searchblogs').empty();
		$('.slider_res').empty();
		var name= $('#topic').val();
		jQuery.ajax({
		url: ajaxurl,
		dataType: "json",
		method: "GET",
		data: {
			action: "get_blogs",
			name: name,
			page:page,
			ppp:ppp
		},
		success: function(response) {
			$('#post-data').hide();
			if (response.rendered_html) {
				 // console.log(response.rendered_html);
        	if(response.rendered_html == ""){
            return;
          }
          $(".searchblogs").append(response.rendered_html);
          $(".text-block").css('visibility', 'visible');
          $(".img-col").css('visibility', 'visible');
			} else{
				jQuery(".slider_res").html("<h3 style='text-align: center;margin: 0 auto;'>No result found</h3>");
			}
		},
		error: function() {
			console.log("inside error");
		}
		});

	}
</script>
