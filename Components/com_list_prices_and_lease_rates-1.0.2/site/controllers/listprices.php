<?php
/**
 * @version     1.0.2
 * @package     com_list_prices_and_lease_rates
 * @copyright   Copyright Aviation Media (TM) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */

// No direct access.
defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Listprices list controller class.
 */
class List_prices_and_lease_ratesControllerListprices extends List_prices_and_lease_ratesController
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function &getModel($name = 'Listprices', $prefix = 'List_prices_and_lease_ratesModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}