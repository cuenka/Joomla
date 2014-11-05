<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );?>
<?php 
$dirjava="horizontal";
switch ($params->get("plaintitledirection")) {
	case 1:
	$direcction = ' exclude';
	$dirjava="horizontal";
	break;
	case 2:
	$direcction = '" data-direction="horizontal';
	$dirjava="horizontal";
	break;
	case 3:
	$direcction = '" data-direction="vertical';
	$dirjava="vertical";
	break;
}
if ($params->get("plaintitleimage")!="") {
	$back='<img class="full" src="'.$params->get("plaintitleimage").'" alt="'.$tile["Name"].'"/>';
	
}else {
	$back='<h2 style="padding-top:40px;" >'.$params->get("plaintitletext")."</h2>";
}
?>
<div id="tile<?php echo $module->id; ?>" class="live-tile <? echo $direcction; ?>"  data-mode="<?php echo $params->get("plaintitleeffect") ?>"  style="background-color:<? echo $tile["Colour"]; ?>;" >       
        <div style="background-color:<? echo $tile["Colour"]; ?>;">
        	<a href="<? echo $tile["Link"]; ?>" style="text-decoration: none;">
        		<img src="<? echo $tile["Image"]; ?>" alt="<? echo $tile["Name"]; ?>"/>
        		<h2><? echo $tile["Name"]; ?></h2>
        	>
        </div>
        <div style="background-color:<? echo $tile["Colour"]; ?>;">
        	 <a href="<? echo $tile["Link"]; ?>" style="text-decoration: none;">
        	 <? echo $back; ?>
        	</a>
        </div>
    </div>

<script type="text/javascript">
	<?php if ($params->get("plaintitleeffect")!="fade") : ?>
    jQuery("#tile<?php echo $module->id; ?>").liveTile({ direction:'<?php echo $dirjava; ?>' });
    <?php endif; ?>
</script>