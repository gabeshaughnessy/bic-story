<?php
/**
 * Template Name: Instagram to Edge Template
 * @package Snap
 */
get_header();
?>
	<?php 
	if(have_posts()) : while(have_posts()) : the_post();
 if(function_exists('edge_suite_view')){
            echo edge_suite_view();
          }
          endwhile;
          endif;
      ?>
		<script charset="utf-8" type="text/javascript">
			 var imageUrl = Array();
		 </script>
<?php	
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

get_footer();
	?>
