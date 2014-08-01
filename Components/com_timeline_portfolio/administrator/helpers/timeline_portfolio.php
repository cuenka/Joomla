<?php

/**
 * @version     1.0.0
 * @package     com_timeline_portfolio
 * @copyright   Copyright (C) 2014. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Jose Cuenca <jose@josecuenca.info> - http://www.josecuenca.info/
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Timeline_portfolio helper.
 */
class Timeline_portfolioHelper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '') {
        		JHtmlSidebar::addEntry(
			JText::_('COM_TIMELINE_PORTFOLIO_TITLE_PORTFOLIO'),
			'index.php?option=com_timeline_portfolio&view=portfolio',
			$vName == 'portfolio'
		);

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

        $assetName = 'com_timeline_portfolio';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }


}
