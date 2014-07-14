<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<style>
.sponsors-home {
-moz-box-shadow: 0 0 3px 3px #888;
-webkit-box-shadow: 0 0 3px 3px#888;
box-shadow: 0 0 3px 3px #888;
float: left;
margin: 5px;
}
</style>

<?php foreach ($supporters as $supporter) : ?>
<div class="sponsors-home">
	<a href="<?php echo $supporter->website; ?>" target="_blank" title="<?php echo $supporter->company; ?>" rel="follow">
		<img alt="<?php echo $supporter->company; ?>" src="<?php echo JURI::root() .$supporter->logo; ?>" width="<?php echo $params->get("Width");?>" height="<?php echo $params->get("Height");?>">
	</a>
</div>
<?php endforeach; ?>

<?php if($params->get("SupporterImage")) :?>
<div class="sponsors-home">
	<a href="<?php echo $MenuLink[0];?>" target="_blank" title="Click here become a sponsor" rel="follow">
		<img alt="CLICK-TO-SPONSOR" src="<?php echo $params->get("ImgSupporter");?>" width="<?php echo $params->get("Width");?>" height="<?php echo $params->get("Height");?>" >
	</a>
</div>

<?php endif; ?>