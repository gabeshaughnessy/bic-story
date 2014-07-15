<?php
/**
 * Template Name: Splash Page
 * @package Snap
 */
?>
<?php
remove_action( 'init', 'wp_admin_bar_init' );
 get_header(); 

 ?>
 <style type="text/css">
 html{
 	margin-top: 0 !important;
 }
 </style>
<?php while ( have_posts() ) : the_post(); ?>
<?php
           the_content(); 

           ?>
<?php endwhile; ?>