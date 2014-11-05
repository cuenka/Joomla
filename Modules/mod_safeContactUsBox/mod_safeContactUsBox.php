<?php 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
require_once( dirname(__FILE__).'/helper.php' );
//echo('Height '.$Height.' Width '.$Width.' ID '.$PageID);
$Contacts = safeContactUsBox::getCode( $params );
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require( JModuleHelper::getLayoutPath( 'mod_safeContactUsBox' ) );
?>