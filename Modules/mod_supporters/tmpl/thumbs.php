<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<?php $i=0;?>
<div>
<?php foreach ($speakers as $speaker) : ?>
<?php $display = (($i==0) ? "display: block;" : "display: none;"); ?>
<div style="width: 100px;height: auto;float: left;padding: 5px;">
<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' .$speaker->id); ?>" style="color:<?php echo $params->get('linktitle');?>;text-decoration: none;"><img src="<?php echo $speaker->photo; ?>" alt="photo <?php echo $speaker->name; ?>" style="width: 100%;"  align="center"/></a>
</div>
<?php // echo $speaker->name; ?>
<?php //echo $speaker->surname; ?>
<?php //echo $speaker->intro_biography; ?>
<?php //echo $speaker->full_biography; ?>
<?php $i++;//echo $speaker->job_title; ?>

<?php endforeach; ?>
</div>
<div style="clear: both;"></div>