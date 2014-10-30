<?php 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$absolutepath = JPATH_SITE."/images/background/";
$relativepath = JURI::root()."/images/background/";
$background = "";

if ($params->get('randombg') == 1 )
{
	$readpath = scandir($absolutepath);
	$random = rand(2,count($readpath)-1);
	$background = $relativepath.$readpath[$random];
}

if ($params->get('singlebg')!= "") 
{
	$background = $relativepath.$params->get('singlebg');
} 
require( JModuleHelper::getLayoutPath( 'mod_jcmultiplebackgrounds' ) );
?>
