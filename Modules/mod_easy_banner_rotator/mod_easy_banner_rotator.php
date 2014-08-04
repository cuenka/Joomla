<?php 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
require_once( dirname(__FILE__).'/helper.php' );

if ((int) $params->get('bycategory', 1)) {
	$banners = ModeasybannerrotatorHelper::getBannersbycategory($params);
}else {
	$banners = ModeasybannerrotatorHelper::getBannersbyid($params);
	$banners = ModeasybannerrotatorHelper::addpaidstatus($banners,$params);
}
ModeasybannerrotatorHelper::decodeJson($banners);

if ((int) $params->get('display', 0)==2) {
	ModeasybannerrotatorHelper::shufflebanners($banners);
}
if ((int) $params->get('display', 0)==3) {
	$banners = ModeasybannerrotatorHelper::shufflepaidbanners($banners);
}	


require( JModuleHelper::getLayoutPath( 'mod_easy_banner_rotator' ) );
?>