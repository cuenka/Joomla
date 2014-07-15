<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<?php $i=0;?>
<?php foreach ($speakers as $speaker) : ?>
<?php $display = (($i==0) ? "display: block;" : "display: none;"); ?>
<div class="fadeS" style='<?php echo $display; ?>' >
<h4>
<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' .$speaker->id); ?>" style="color:<?php echo $params->get('linktitle');?>;text-decoration: none;"><?php echo $speaker->name; ?> <?php echo $speaker->surname; ?>, <?php echo $speaker->job_title; ?></a>
</h4>
<img src="<?php echo $speaker->photo; ?>" alt="photo <?php echo $speaker->name; ?>" style="width: 100%;" align="center"/>
</div>
<?php // echo $speaker->name; ?>
<?php //echo $speaker->surname; ?>
<?php //echo $speaker->intro_biography; ?>
<?php //echo $speaker->full_biography; ?>
<?php $i++;//echo $speaker->job_title; ?>

<?php endforeach; ?>


<script type="text/javascript">
  jQuery.noConflict();
  jQuery( document ).ready(function( $ ) {
	var delay = 3000, fade = 1000; 
    var banners = $('.fadeS');
    var len = banners.length;
    var i = 0;

    setTimeout(cycle, delay); 

    function cycle() {
        $(banners[i%len]).fadeOut(fade, function() {
            $(banners[++i%len]).fadeIn(fade, function() { 
                setTimeout(cycle, delay);
            });
        });
    }

});



  </script>