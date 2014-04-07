<?php
/**
 * @version     1.0.0
 * @package     com_industry_data_table
 * @copyright   Copyright Aviation Media (TM) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */

// No direct access.
defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Aircraftdeals list controller class.
 */
class Industry_data_tableControllerAircraftdeals extends Industry_data_tableController
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function &getModel($name = 'Aircraftdeals', $prefix = 'Industry_data_tableModel')
	{
		echo $_GET["search"];
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}