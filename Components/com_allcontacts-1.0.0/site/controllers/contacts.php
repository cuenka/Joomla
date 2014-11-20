<?php
/**
 * @version     1.0.0
 * @package     com_allcontacts
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://aviationmedia.aero
 */

// No direct access.
defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Contacts list controller class.
 */
class AllcontactsControllerContacts extends AllcontactsController
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function &getModel($name = 'Contacts', $prefix = 'AllcontactsModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}