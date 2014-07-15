<?php
/**
 * @version		$Id: mod_k2_content.php 1831 2013-01-29 15:23:15Z lefteris.kavadas $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2013 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die ;
jimport( 'joomla.application.module.helper');

require_once (dirname(__FILE__).DS.'helper.php');
$speakers = modspeakersHelper::getListQuery($params->get('orderby'));
$layout= $params->get('layout');
require(JModuleHelper::getLayoutPath('mod_speakers', $layout));
//var_dump($speakers);