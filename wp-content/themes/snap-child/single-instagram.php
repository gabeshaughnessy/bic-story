<?php
/**
 * @package Snap
 */
?>

<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); 
$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID));
?>
<script charset="utf-8" type="text/javascript">
	 var imageUrl = '<?php echo print_r($image_url[0], true); ?>'; //global var for edge animations to access the image
</script>
	<?php get_template_part( '_instagram-thumbnail' ); ?>			
<?php endwhile; ?>
<?php endif; 	?>
