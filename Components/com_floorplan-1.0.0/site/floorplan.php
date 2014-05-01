<?php
/**
 * @version     1.0.0
 * @package     com_floorplan
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');
require_once JPATH_COMPONENT . '/helpers/floorplan.php';  //<-- this is our missing code that will tie things together between the view and the helper
// Execute the task.
$controller	= JControllerLegacy::getInstance('Floorplan');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
