<?php defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<?php
// Include the syndicate functions only once
require_once( dirname(__FILE__).'/helper.php' );
$list = FractionSlider::GetCode($params);
FractionSlider::SetScripts($params);
require( JModuleHelper::getLayoutPath( 'mod_fractionslider' ) );
?>