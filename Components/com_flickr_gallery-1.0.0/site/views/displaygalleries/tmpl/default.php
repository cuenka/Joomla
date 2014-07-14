<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_finder
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;
?>
<style>
a.photo{
	//max-width: 20%;
}
#photos.loading {
  min-height: 500px;
  background: transparent url(images/loader.gif) no-repeat center center;
}
#photos .photo {
  font-size: 87%;
  text-decoration: none;
  float: left;
  margin: 0px;
  display: block;

}
#photos .photo:hover {
  background: #FFFFFF;
}
#photos .photo img {
  max-width: 100%;
}
#photos .photo .title {
  padding: 0;
  margin: 0;
  font-style: italic;
  font-weight: bold;
  display: block;
  color: #333333;
}
</style>

<?php
  require_once("phpFlickr/phpFlickr.php");
  $f = new phpFlickr('5c0ed36eb4070b74db6eeab2ea230bc5');
?>
<?php
  // Access Featured Photos Group - http://www.flickr.com/groups/1632855@N24/pool/
  $group = $f->groups_pools_getPhotos('2621229@N25', NULL, NULL, NULL, 'url_s, url_l', 50);
  $photos = (array) $group['photos']['photo'];
?>

   <div id="photos" class="loading">
<?php  foreach ($photos as $photo) : ?>
  <a class="photo fancybox" rel="flickr" 
  title="<?php  echo $photo['title']; ?>" 
  href="<?php  echo $photo['url_l']; ?>" >
  <img class="" src="<?php  echo $photo['url_s']; ?>" alt="<?php  echo $photo['title']; ?>" 
  />
  </a>
 <?php endforeach;  ?>
   </div>
<script src="/Joomla_3.3.0/media/com_flickr_gallery/js/masonry.pkgd.min.js"></script>
<script src="/Joomla_3.3.0/media/com_flickr_gallery/js/imagesloaded.pkgd.min.js"></script>
<script src="/Joomla_3.3.0/media/com_flickr_gallery/js/jquery.fancybox.pack.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    
    jQuery('#photos .photo').hide();    // Use jQuery to hide all photos temporarily
    
    var $container = jQuery('#photos'); // Create a reference to the image container
    
    // Use the imagesLoaded callback function to activate the Masonry plugin
 		$container.imagesLoaded(function(){
 		  $container.masonry({
 		    itemSelector : '.photo', 
 		    isAnimated : true,       
 		    columnWidth: 50
 		    });
 		  $container.find('.photo').fadeIn('slow'); // Fade back in the thumbnails when the layout is complete
 		  $container.removeClass('loading');        // Remove the loading class from the container
 		});

    // Optionally use your favourite fancyBox configuration
	jQuery(".fancybox").fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});
  });
</script>