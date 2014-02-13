<?php
/**
 * @version     1.1.0
 * @package     com_download
 * @copyright   Aviation Media (TM) Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */

// No direct access.
defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Downloads list controller class.
 */
class DownloadControllerDownloads extends DownloadController
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function &getModel($name = 'Downloads', $prefix = 'DownloadModel')
	{
		$result = 'Something';
		echo $result;
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}