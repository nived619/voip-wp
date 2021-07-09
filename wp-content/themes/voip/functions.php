<?php
/**
 * voip functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage voip
 * @since voip 1.0
 */

/**
 * voip only works in WordPress 4.7 or later.
 */
add_theme_support( 'post-thumbnails' );
add_action('wp_head', 'myplugin_ajaxurl');
function myplugin_ajaxurl()
{
  echo '<script type="text/javascript">
      var ajaxurl = "' . admin_url('admin-ajax.php') . '";
    </script>';
}
function custom_admin_js() {
    $url = get_bloginfo('template_directory') . '/assets/js/custom.js';
    echo '"<script type="text/javascript" src="'. $url . '"></script>"';
}
add_action('admin_footer', 'custom_admin_js');
//load more in blog page

add_action("wp_ajax_load_more", "load_more");
add_action("wp_ajax_nopriv_load_more", "load_more");

function load_more(){
    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 6;
    $page = (isset($_POST['page'])) ? $_POST['page'] : 0;
    $latest_args = array(
        'suppress_filters' => true,
        'post_type'=> 'post',
        'orderby'    => 'ID',
        'post_status' => 'publish',
        'order'    => 'DESC',
        'posts_per_page' => $ppp,
        'paged' => $page
    );
    $latest_blogs = new WP_Query( $latest_args );
        ob_start();
        if ( count($latest_blogs-> have_posts() ) > 0) :
        while ( $latest_blogs->have_posts() ) : $latest_blogs->the_post();
        global $post;
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
                    <p><?php echo strlen(get_the_content())>400?substr(get_the_content(), 0, 400) . "...":get_the_content(); ?></p>
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
        endwhile; 
        endif;

        $renderedHtml = ob_get_clean();
        echo json_encode(['status'=>true,'message'=>'','rendered_html'=>$renderedHtml]);
        die();
    }

//search in blog page

add_action("wp_ajax_get_blogs", "get_blogs");
add_action("wp_ajax_nopriv_get_blogs", "get_blogs");

function get_blogs(){
    global $wpdb;
    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 6;
    $page = (isset($_POST['page'])) ? $_POST['page'] : 0;

    $name = $_REQUEST['name'];
    $yourPostTitle=strtoupper($name);
    $ids = $wpdb->get_col("SELECT ID FROM $wpdb->posts WHERE UCASE(post_title) LIKE '%$yourPostTitle%' AND post_type='post' AND post_status='publish'");
if ($ids) {
  $args=array(
    'post__in' => $ids,
    'posts_per_page' => -1,
    'caller_get_posts'=> 1
  );
  $latest_blogs = null;
  $latest_blogs = new WP_Query($args);
    // $latest_args = array(
    //    'post_type'=> 'post',
    //    // 'post_title'=> $name,
    //     'numberposts' => -1,
    //     'orderby'    => 'ID',
    //     'post_status' => 'publish',
    //     'order'    => 'DESC',
    //     'search_prod_title' => $name,
    //     // 'posts_per_page' => $ppp,
    //     // 'paged' => $page
    // );
    // $latest_blogs = new WP_Query( $latest_args );
    // print_r($latest_blogs);die();
        ob_start();
        if ( count($latest_blogs-> have_posts() ) > 0) :
        while ( $latest_blogs->have_posts() ) : $latest_blogs->the_post();
        global $post;
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
                    <p><?php echo strlen(get_the_content())>400?substr(get_the_content(), 0, 400) . "...":get_the_content(); ?></p>
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
        endwhile; 
        endif;
    }

        $renderedHtml = ob_get_clean();
        echo json_encode(['status'=>true,'message'=>'','rendered_html'=>$renderedHtml]);
        die();
    }
