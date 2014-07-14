<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
	<style type="text/css">

		#makeMeScrollable
		{
			width:100%;
			height: 330px;
			position: relative;
		}
		
		/* Replace the last selector for the type of element you have in
		   your scroller. If you have div's use #makeMeScrollable div.scrollableArea div,
		   if you have links use #makeMeScrollable div.scrollableArea a and so on. */
		#makeMeScrollable div.scrollableArea img
		{
			position: relative;
			float: left;
			margin: 0;
			padding: 0;
			/* If you don't want the images in the scroller to be selectable, try the following
			   block of code. It's just a nice feature that prevent the images from
			   accidentally becoming selected/inverted when the user interacts with the scroller. */
			-webkit-user-select: none;
			-khtml-user-select: none;
			-moz-user-select: none;
			-o-user-select: none;
			user-select: none;
		}
	</style>
<a href="/about/Gallery" target="_blank">
<div id="makeMeScrollable">

<?php foreach ($list as $key => $value) : ?>
	<img src="<?php echo $value->image;?>">
<?php endforeach; ?> 
</div>
</a>
<div style="margin-bottom: 10px;"></div>

	<script type="text/javascript">
		// Initialize the plugin with no custom options
		jQuery(document).ready(function () {
			// None of the options are set
			jQuery("div#makeMeScrollable").smoothDivScroll({
				autoScrollingMode: "onStart"
			});
		});
	</script>