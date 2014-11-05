<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );?>

<div class="live-tile" style="background-color:<? echo $params->get("backgroundcustomcolour"); ?>;">
<span class="tile-title">
	<a href="<? echo $params->get("customlink"); ?>" style="text-decoration: none;">
	<img src="<? echo $params->get("customimage"); ?>" alt="custom image"/>
	<h2><? echo $params->get("customtitle"); ?></h2>
	</a>
</span> 
</div>
