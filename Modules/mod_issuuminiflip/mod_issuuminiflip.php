<?php 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
include (dirname(__FILE__) . '/Mobile_Detect.php');
$detect_module = new Mobile_Detect_1;
// Include the syndicate functions only once
require_once( dirname(__FILE__).'/helper.php' );
if ($params->get('url')) 
{
	$code = Issuuminiflip::getCode( $params,$detect_module );
	require( JModuleHelper::getLayoutPath( 'mod_issuuminiflip' ) );
}else {
	JError::raiseNotice( 100, 'URL is empty or is wrong' );
}

?>