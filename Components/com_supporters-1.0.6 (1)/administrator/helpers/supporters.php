<?php

/**
 * @version     1.0.6
 * @package     com_supporters
 * @copyright   Aviation Media (TM) Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Supporters helper.
 */
class SupportersHelper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '') {
        		JHtmlSidebar::addEntry(
			JText::_('COM_SUPPORTERS_TITLE_LISTS'),
			'index.php?option=com_supporters&view=lists',
			$vName == 'lists'
		);
		JHtmlSidebar::addEntry(
			JText::_('JCATEGORIES') . ' (' . JText::_('COM_SUPPORTERS_TITLE_LISTS') . ')',
			"index.php?option=com_categories&extension=com_supporters",
			$vName == 'categories'
		);
		if ($vName=='categories') {
			JToolBarHelper::title('Supporters: JCATEGORIES (COM_SUPPORTERS_TITLE_LISTS)');
		}

    }

    /**
     * Gets a list of the actions that can be performed.
     *
     * @return	JObject
     * @since	1.6
     */
    public static function getActions() {
        $user = JFactory::getUser();
        $result = new JObject;

        $assetName = 'com_supporters';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }


}
