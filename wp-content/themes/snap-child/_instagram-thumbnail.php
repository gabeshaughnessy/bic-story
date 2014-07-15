<?php
/**
 * @package Snap
 */
?>
<?php $thumbnail = get_the_post_thumbnail( get_the_ID(), 'snap-full-width' ); ?>
<?php if ( '' !== $thumbnail ) : ?>
		<?php echo $thumbnail; ?>
<?php endif;