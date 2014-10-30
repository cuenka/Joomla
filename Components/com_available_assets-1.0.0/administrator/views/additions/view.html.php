<?php

/**
 * @version     1.0.0
 * @package     com_available_assets
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.afm.aero
 */
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of Available_assets.
 */
class Available_assetsViewAdditions extends JViewLegacy {

    protected $items;
    protected $pagination;
    protected $state;

    /**
     * Display the view
     */
    public function display($tpl = null) {
        $this->state = $this->get('State');
        $this->data = $this->get('Data');
        

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        Available_assetsHelper::addSubmenu('additions');

        $this->addToolbar();

        $this->sidebar = JHtmlSidebar::render();
        parent::display($tpl);
    }

    /**
     * Add the page title and toolbar.
     *
     * @since	1.6
     */
    protected function addToolbar() {
        require_once JPATH_COMPONENT . '/helpers/available_assets.php';

        $state = $this->get('State');
        $canDo = Available_assetsHelper::getActions($state->get('filter.category_id'));

        JToolBarHelper::title(JText::_('COM_AVAILABLE_ASSETS_TITLE_ADDITIONS'), 'additions.png');

        //Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_COMPONENT_ADMINISTRATOR . '/views/addition';
        if (file_exists($formPath)) {

            if ($canDo->get('core.create')) {
                JToolBarHelper::addNew('addition.add', 'JTOOLBAR_NEW');
            }

            if ($canDo->get('core.edit') && isset($this->items[0])) {
                JToolBarHelper::editList('addition.edit', 'JTOOLBAR_EDIT');
            }
        }

        if ($canDo->get('core.edit.state')) {

            if (isset($this->items[0]->state)) {
                JToolBarHelper::divider();
                JToolBarHelper::custom('additions.publish', 'publish.png', 'publish_f2.png', 'JTOOLBAR_PUBLISH', true);
                JToolBarHelper::custom('additions.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
            } else if (isset($this->items[0])) {
                //If this component does not use state then show a direct delete button as we can not trash
                JToolBarHelper::deleteList('', 'additions.delete', 'JTOOLBAR_DELETE');
            }

            if (isset($this->items[0]->state)) {
                JToolBarHelper::divider();
                JToolBarHelper::archiveList('additions.archive', 'JTOOLBAR_ARCHIVE');
            }
            if (isset($this->items[0]->checked_out)) {
                JToolBarHelper::custom('additions.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
            }
        }

        //Show trash and delete for components that uses the state field
        if (isset($this->items[0]->state)) {
            if ($state->get('filter.state') == -2 && $canDo->get('core.delete')) {
                JToolBarHelper::deleteList('', 'additions.delete', 'JTOOLBAR_EMPTY_TRASH');
                JToolBarHelper::divider();
            } else if ($canDo->get('core.edit.state')) {
                JToolBarHelper::trash('additions.trash', 'JTOOLBAR_TRASH');
                JToolBarHelper::divider();
            }
        }

        if ($canDo->get('core.admin')) {
            JToolBarHelper::preferences('com_available_assets');
        }

        //Set sidebar action - New in 3.0
        JHtmlSidebar::setAction('index.php?option=com_available_assets&view=additions');

        $this->extra_sidebar = '';
        //
        
        
        
       JToolBarHelper::custom('additions.import', 's_additions.png', 's_additions.png','Import Excel File', false);
        JToolBarHelper::cancel('additions.cancel');

    }

	protected function getSortFields()
	{
		return array(
		'a.id' => JText::_('JGRID_HEADING_ID'),
		'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
		'a.state' => JText::_('JSTATUS'),
		'a.dblink' => JText::_('COM_AVAILABLE_ASSETS_AIRCRAFTLIST_DBLINK'),
		'a.series' => JText::_('COM_AVAILABLE_ASSETS_AIRCRAFTLIST_SERIES'),
		'a.model' => JText::_('COM_AVAILABLE_ASSETS_AIRCRAFTLIST_MODEL'),
		'a.msn' => JText::_('COM_AVAILABLE_ASSETS_AIRCRAFTLIST_MSN'),
		'a.engines' => JText::_('COM_AVAILABLE_ASSETS_AIRCRAFTLIST_ENGINES'),
		'a.cabin' => JText::_('COM_AVAILABLE_ASSETS_AIRCRAFTLIST_CABIN'),
		'a.lu' => JText::_('COM_AVAILABLE_ASSETS_AIRCRAFTLIST_LU'),
		'a.company_logo' => JText::_('COM_AVAILABLE_ASSETS_AIRCRAFTLIST_COMPANY_LOGO'),
		);
	}

}
