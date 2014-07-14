<?php
/**
 * @version     1.2.0
 * @package     com_speakers
 * @copyright   Jose Cuenca - 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

// Execute the task.
$controller	= JControllerLegacy::getInstance('Speakers');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
