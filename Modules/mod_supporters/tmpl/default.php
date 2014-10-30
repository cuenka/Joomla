<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<?php
$style="";
switch ($params->get("style")){
	case 0:
		$style="<style>
		.sponsors-home{
		padding:5px;
		margin: 5px;
		}
		</style>";		
	break;
	case 1:
		$style="<style>
		.sponsors-home {
		-moz-box-shadow: 0 0 3px 3px #888;
		-webkit-box-shadow: 0 0 3px 3px#888;
		box-shadow: 0 0 3px 3px #888;
		float: left;
		margin: 5px;
		}
		</style>";

	break;
	case 2:
		$style="<style>
		.sponsors-home > a > img {
		width:100%;
		max-width:100%;
		float: left;
		margin: 5px;
		}
		</style>";
	break;
	case 3:
		$style="<style>
		.sponsors-home{
		width:100%;
		max-width:100%;
		text-align:center;
		margin: 5px;
		}
		</style>";
	break;
	default:
		$style="<style>
		.sponsors-home{
		padding:5px;
		margin: 5px;
		}
		</style>";		
} 
echo $style;
?>

<?php  $currentcategory = ""; ?>
<?php foreach ($supporters as $supporter) : ?>
<div class="sponsors-home ">
	<a href="<?php echo $supporter->website; ?>" target="_blank" title="<?php echo $supporter->company; ?>" rel="follow" style="text-decoration:none;">
		<?php 
		if ($params->get("showcategory")) {
			if ($supporter->title != $currentcategory) echo '<p>'. $supporter->title.'</p>';	
		}
		?>
		
		<img alt="<?php echo $supporter->company; ?>" src="<?php echo JURI::root() .$supporter->logo; ?>" width="<?php echo $params->get("Width");?>" height="<?php echo $params->get("Height");?>" class="img-responsive">
	</a>
</div>
<?php $currentcategory = $supporter->title; ?>	
<?php endforeach; ?>

<?php if($params->get("SupporterImage")) :?>
<div class="sponsors-home">
	<a href="<?php echo $MenuLink[0];?>" target="_blank" title="Click here become a sponsor" rel="follow">
		<img alt="CLICK-TO-SPONSOR" src="<?php echo $params->get("ImgSupporter");?>" width="<?php echo $params->get("Width");?>" height="<?php echo $params->get("Height");?>" >
	</a>
</div>

<?php endif; ?>