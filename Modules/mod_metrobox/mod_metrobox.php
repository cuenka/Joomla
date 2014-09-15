<?php 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
include (dirname(__FILE__) . '/Mobile_Detect.php');
$detect_module = new Mobile_Detect_1;
// Include the syndicate functions only once
require_once( dirname(__FILE__).'/helper.php' );
//echo('Height '.$Height.' Width '.$Width.' ID '.$PageID);
$code = metrobox::getCode( $params,$detect_module );
require( JModuleHelper::getLayoutPath( 'mod_metrobox' ) );
?>