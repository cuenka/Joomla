<?php defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<?php
// Include the syndicate functions only once
require_once( dirname(__FILE__).'/helper.php' );
$list = smoothgalleryscroll::GetCode($params);
smoothgalleryscroll::SetScripts($params);
require( JModuleHelper::getLayoutPath( 'mod_smoothgalleryscroll' ) );
?>