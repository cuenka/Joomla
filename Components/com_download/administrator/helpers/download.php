<?php
/**
 * @version     1.1.0
 * @package     com_download
 * @copyright   Aviation Media (TM) Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Download helper.
 */
class DownloadHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($vName = '')
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_DOWNLOAD_TITLE_DOWNLOADS'),
			'index.php?option=com_download&view=downloads',
			$vName == 'downloads'
		);
		JHtmlSidebar::addEntry(
			'Categories (Downloads)',
			"index.php?option=com_categories&extension=com_download",
			$vName == 'categories.downloads'
		);
		if ($vName=='categories.downloads.category') {
			JToolBarHelper::title('Download: Categories (Downloads)');
		}

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

		$assetName = 'com_download';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}
}
