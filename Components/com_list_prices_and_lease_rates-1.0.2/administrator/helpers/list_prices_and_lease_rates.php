<?php
/**
 * @version     1.0.2
 * @package     com_list_prices_and_lease_rates
 * @copyright   Copyright Aviation Media (TM) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */

// No direct access
defined('_JEXEC') or die;

/**
 * List_prices_and_lease_rates helper.
 */
class List_prices_and_lease_ratesHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($vName = '')
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_LIST_PRICES_AND_LEASE_RATES_TITLE_LISTPRICES'),
			'index.php?option=com_list_prices_and_lease_rates&view=listprices',
			$vName == 'listprices'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_LIST_PRICES_AND_LEASE_RATES_TITLE_IMPORTLISTPRICESANDLEASERATES'),
			'index.php?option=com_list_prices_and_lease_rates&view=importlistpricesandleaserates',
			$vName == 'importlistpricesandleaserates'
		);

	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return	JObject
	 * @since	1.6
	 */
	public static function getActions()
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		$assetName = 'com_list_prices_and_lease_rates';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}
}
