<?php
// no direct access
defined('_JEXEC') or die ;
jimport( 'joomla.application.module.helper');
$categories = $params->get('category_id',1);

for ($i = 0; $i < count($categories); $i++) {
	if ($i==0) $cat = '('.$categories[$i];
	elseif ($i==(count($categories)-1)) $cat .= ','.$categories[$i].')';
	else $cat .= ','.$categories[$i];
}

require_once (dirname(__FILE__).DS.'helper.php');

$items = modlatestonCategoryk2Helper::getListQuery($cat);
require( JModuleHelper::getLayoutPath( 'mod_latestonCategoryk2' ) );

//var_dump($speakers);