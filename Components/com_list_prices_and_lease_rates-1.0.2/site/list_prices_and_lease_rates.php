<?php
/**
 * @version     1.0.2
 * @package     com_list_prices_and_lease_rates
 * @copyright   Copyright Aviation Media (TM) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

// Execute the task.
$controller	= JControllerLegacy::getInstance('List_prices_and_lease_rates');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
