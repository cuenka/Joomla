<?php 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
// Include the syndicate functions only once
require_once( dirname(__FILE__).'/helper.php' );


if ($params->get("activateplaintile")) {
	$tile = metrobox::getstyle($params->get("plaintitlecategory"),"L");
	$tile["class"]="live-tile ".$params->get("plaintitlecategory");
	require JModuleHelper::getLayoutPath('mod_metrobox', $params->get('layout', 'default_plaintile'));

}
if ($params->get("activate4tiles")) {
	foreach ($params->get("4titlescategories") as $key => $value) {
		$minitiles[$key] = metrobox::getstyle($value,"S");
	}
	require JModuleHelper::getLayoutPath('mod_metrobox', $params->get('layout', 'default_4minitiles'));
}
if ($params->get("activatecarousel")) {
	foreach ($params->get("carouselcategories") as $key => $value) {
		$carouseltiles[$key] = metrobox::getstyle($value,"L");
	}
	require JModuleHelper::getLayoutPath('mod_metrobox', $params->get('layout', 'default_carousel'));
}
if ($params->get("activatecarouselimages")) {
	require JModuleHelper::getLayoutPath('mod_metrobox', $params->get('layout', 'default_carouselimages'));
}
if ($params->get("activatecustom")) {
	require JModuleHelper::getLayoutPath('mod_metrobox', $params->get('layout', 'default_custom'));
}
if ($params->get("activatehoverpeek")) {
	foreach ($params->get("activatehovercategories") as $key => $value) {
		$hoverpeektiles[$key] = metrobox::getstyle($value,"L");
	}
	require JModuleHelper::getLayoutPath('mod_metrobox', $params->get('layout', 'default_hoverwithpeek'));
}
?>