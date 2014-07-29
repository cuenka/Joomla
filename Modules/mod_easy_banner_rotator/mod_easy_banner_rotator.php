<?php 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
require_once( dirname(__FILE__).'/helper.php' );

$banners = ModeasybannerrotatorHelper::getBanners($params);

ModeasybannerrotatorHelper::decodeJson($banners);

require( JModuleHelper::getLayoutPath( 'mod_easy_banner_rotator' ) );
?>