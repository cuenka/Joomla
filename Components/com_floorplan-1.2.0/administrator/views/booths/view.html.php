<?php

/**
 * @version     1.2.0
 * @package     com_floorplan
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of Floorplan.
 */
class FloorplanViewBooths extends JViewLegacy {

    protected $items;
    protected $pagination;
    protected $state;

    /**
     * Display the view
     */
    public function display($tpl = null) {
        $this->state = $this->get('State');
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        FloorplanHelper::addSubmenu('booths');

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
        require_once JPATH_COMPONENT . '/helpers/floorplan.php';

        $state = $this->get('State');
        $canDo = FloorplanHelper::getActions($state->get('filter.category_id'));

        JToolBarHelper::title(JText::_('COM_FLOORPLAN_TITLE_BOOTHS'), 'booths.png');

        //Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_COMPONENT_ADMINISTRATOR . '/views/booth';
        if (file_exists($formPath)) {

            if ($canDo->get('core.create')) {
                JToolBarHelper::addNew('booth.add', 'JTOOLBAR_NEW');
            }

            if ($canDo->get('core.edit') && isset($this->items[0])) {
                JToolBarHelper::editList('booth.edit', 'JTOOLBAR_EDIT');
            }
        }

        if ($canDo->get('core.edit.state')) {

            if (isset($this->items[0]->state)) {
                JToolBarHelper::divider();
                JToolBarHelper::custom('booths.publish', 'publish.png', 'publish_f2.png', 'JTOOLBAR_PUBLISH', true);
                JToolBarHelper::custom('booths.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
            } else if (isset($this->items[0])) {
                //If this component does not use state then show a direct delete button as we can not trash
                JToolBarHelper::deleteList('', 'booths.delete', 'JTOOLBAR_DELETE');
            }

            if (isset($this->items[0]->state)) {
                JToolBarHelper::divider();
                JToolBarHelper::archiveList('booths.archive', 'JTOOLBAR_ARCHIVE');
            }
            if (isset($this->items[0]->checked_out)) {
                JToolBarHelper::custom('booths.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
            }
        }

        //Show trash and delete for components that uses the state field
        if (isset($this->items[0]->state)) {
            if ($state->get('filter.state') == -2 && $canDo->get('core.delete')) {
                JToolBarHelper::deleteList('', 'booths.delete', 'JTOOLBAR_EMPTY_TRASH');
                JToolBarHelper::divider();
            } else if ($canDo->get('core.edit.state')) {
                JToolBarHelper::trash('booths.trash', 'JTOOLBAR_TRASH');
                JToolBarHelper::divider();
            }
        }

        if ($canDo->get('core.admin')) {
            JToolBarHelper::preferences('com_floorplan');
        }

        //Set sidebar action - New in 3.0
        JHtmlSidebar::setAction('index.php?option=com_floorplan&view=booths');

        $this->extra_sidebar = '';
        
		JHtmlSidebar::addFilter(

			JText::_('JOPTION_SELECT_PUBLISHED'),

			'filter_published',

			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), "value", "text", $this->state->get('filter.state'), true)

		);

		//Filter for the field type
		$select_label = JText::sprintf('COM_FLOORPLAN_FILTER_SELECT_LABEL', 'This booth is:');
		$options = array();
		$options[0] = new stdClass();
		$options[0]->value = "Available";
		$options[0]->text = "Available";
		$options[1] = new stdClass();
		$options[1]->value = "Reserved";
		$options[1]->text = "Reserved";
		$options[2] = new stdClass();
		$options[2]->value = "Refreshment";
		$options[2]->text = "Refreshment";
		$options[3] = new stdClass();
		$options[3]->value = "Special";
		$options[3]->text = "Special";
		JHtmlSidebar::addFilter(
			$select_label,
			'filter_type',
			JHtml::_('select.options', $options , "value", "text", $this->state->get('filter.type'), true)
		);

    }

	protected function getSortFields()
	{
		return array(
		'a.id' => JText::_('JGRID_HEADING_ID'),
		'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
		'a.state' => JText::_('JSTATUS'),
		'a.created_by' => JText::_('COM_FLOORPLAN_BOOTHS_CREATED_BY'),
		'a.boothnumber' => JText::_('COM_FLOORPLAN_BOOTHS_BOOTHNUMBER'),
		'a.type' => JText::_('COM_FLOORPLAN_BOOTHS_TYPE'),
		'a.company' => JText::_('COM_FLOORPLAN_BOOTHS_COMPANY'),
		'a.website' => JText::_('COM_FLOORPLAN_BOOTHS_WEBSITE'),
		'a.logo' => JText::_('COM_FLOORPLAN_BOOTHS_LOGO'),
		);
	}

}
