<?php

/**
 * @version     1.2.0
 * @package     com_programme
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Programme helper.
 */
class ProgrammeHelper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '') {
        		JHtmlSidebar::addEntry(
			JText::_('COM_PROGRAMME_TITLE_PROGRAMMES'),
			'index.php?option=com_programme&view=programmes',
			$vName == 'programmes'
		);
		JHtmlSidebar::addEntry(
			JText::_('JCATEGORIES') . ' (' . JText::_('COM_PROGRAMME_TITLE_PROGRAMMES') . ')',
			"index.php?option=com_categories&extension=com_programme",
			$vName == 'categories'
		);
		if ($vName=='categories') {
			JToolBarHelper::title('Programme: JCATEGORIES (COM_PROGRAMME_TITLE_PROGRAMMES)');
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

        $assetName = 'com_programme';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }


}
