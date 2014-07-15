<?php
/**
 * Template Name: Center Panel
 * @package Snap
 */
get_header();
?>
<style type="text/css">
#edge-suite-wrapper > p{
	display: none;
}
</style>
<div id="edge-suite-wrapper">
<?php
if(have_posts()) : while(have_posts()) : the_post();
 if(function_exists('edge_suite_view')){
    echo edge_suite_view();
          }
//set up meta 
          $instagram_cta = get_field('mof_instagram_cta');
          $tweet_cta = get_field('mof_tweet_cta');
          endwhile;
          endif;
      ?>
</div>
		<script charset="utf-8" type="text/javascript">
			 var imageUrl = Array();
			 var tweetImage = Array();
			 var tweetContent = Array();
			 var tweetUser = Array();
			  var instagramCta = '<?php echo $instagram_cta; ?>';
			  var tweetCta = '<?php echo $tweet_cta; ?>';
		 </script>
<?php
//INSTAGRAMS	
$args = array(
'category_name' => 'instagram',
'posts_per_page' => 20
	);
	$instagrams = new WP_Query($args);
	if($instagrams->have_posts()) : while($instagrams->have_posts()) : $instagrams->the_post();
	$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), array(400,400));
	?>
		<script charset="utf-8" type="text/javascript">
			 imageUrl.push ( '<?php echo print_r($image_url[0], true); ?>' ); //global var for edge animations to access the image
		</script>
	<?php endwhile;
	endif;
	rewind_posts();

//TWEETS
$tweet_args = array(
'category_name' => 'tweets',
'posts_per_page' => 20
	);
	$tweets = new WP_Query($tweet_args);
		//error_log(print_r($tweets, true));
	if($tweets->have_posts()) : while($tweets->have_posts()) : $tweets->the_post();
	$tweet_content = get_the_content($post->ID);
	$image_url = get_post_meta( $post->ID, 'tweet_image', true);
	error_log($image_url);
	$tweet_user = get_post_meta( $post->ID, 'tweet_author', true);
	?>
		<script charset="utf-8" type="text/javascript">
			tweetImage.push ( '<?php echo print_r($image_url, true); ?>' ); //global var for edge animations to access the image
			tweetContent.push ('<?php echo addslashes($tweet_content); ?>');
			tweetUser.push ('<?php echo $tweet_user; ?>');
		</script>
	<?php endwhile;
	endif;
	rewind_posts();
get_footer();
	?>
