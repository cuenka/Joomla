<?php
/**
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */
 
// no direct access
defined('_JEXEC') or die ;
jimport( 'joomla.application.module.helper');

require_once (dirname(__FILE__).DS.'helper.php');

$supporters = modsupportersHelper::getListQuery($params->get('orderby'));
$MenuLink = modsupportersHelper::getMenuURL($params->get("LinkSupportPage"));

$layout= $params->get('layout');

require(JModuleHelper::getLayoutPath('mod_supporters', $layout));
