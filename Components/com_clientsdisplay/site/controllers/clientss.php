<?php
/**
 * @version     1.1.1
 * @package     com_clientsdisplay
 * @copyright   Aviation Media (TM)Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */

// No direct access.
defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Clientss list controller class.
 */
class ClientsdisplayControllerClientss extends ClientsdisplayController
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function &getModel($name = 'Clientss', $prefix = 'ClientsdisplayModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}