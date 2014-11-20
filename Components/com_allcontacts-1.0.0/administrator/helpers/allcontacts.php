<?php

/**
 * @version     1.0.0
 * @package     com_allcontacts
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://aviationmedia.aero
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Allcontacts helper.
 */
class AllcontactsHelper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '') {
        		JHtmlSidebar::addEntry(
			JText::_('COM_ALLCONTACTS_TITLE_CONTACTS'),
			'index.php?option=com_allcontacts&view=contacts',
			$vName == 'contacts'
		);
		JHtmlSidebar::addEntry(
			JText::_('JCATEGORIES') . ' (' . JText::_('COM_ALLCONTACTS_TITLE_CONTACTS') . ')',
			"index.php?option=com_categories&extension=com_allcontacts",
			$vName == 'categories'
		);
		if ($vName=='categories') {
			JToolBarHelper::title('All Contacts: JCATEGORIES (COM_ALLCONTACTS_TITLE_CONTACTS)');
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

        $assetName = 'com_allcontacts';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }


}
