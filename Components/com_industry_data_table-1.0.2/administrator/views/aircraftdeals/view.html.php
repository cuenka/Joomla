<?php
/**
 * @version     1.0.0
 * @package     com_industry_data_table
 * @copyright   Copyright Aviation Media (TM) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of Industry_data_table.
 */
class Industry_data_tableViewAircraftdeals extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$this->state		= $this->get('State');
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			throw new Exception(implode("\n", $errors));
		}
        
		Industry_data_tableHelper::addSubmenu('aircraftdeals');
        
		$this->addToolbar();
        
        $this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{
		require_once JPATH_COMPONENT.'/helpers/industry_data_table.php';

		$state	= $this->get('State');
		$canDo	= Industry_data_tableHelper::getActions($state->get('filter.category_id'));

		JToolBarHelper::title(JText::_('COM_INDUSTRY_DATA_TABLE_TITLE_AIRCRAFTDEALS'), 'aircraftdeals.png');

        //Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_COMPONENT_ADMINISTRATOR.'/views/deals';
        if (file_exists($formPath)) {

            if ($canDo->get('core.create')) {
			    JToolBarHelper::addNew('deals.add','JTOOLBAR_NEW');
		    }

		    if ($canDo->get('core.edit') && isset($this->items[0])) {
			    JToolBarHelper::editList('deals.edit','JTOOLBAR_EDIT');
		    }

        }

		if ($canDo->get('core.edit.state')) {

            if (isset($this->items[0]->state)) {
			    JToolBarHelper::divider();
			    JToolBarHelper::custom('aircraftdeals.publish', 'publish.png', 'publish_f2.png','JTOOLBAR_PUBLISH', true);
			    JToolBarHelper::custom('aircraftdeals.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
            } else if (isset($this->items[0])) {
                //If this component does not use state then show a direct delete button as we can not trash
                JToolBarHelper::deleteList('', 'aircraftdeals.delete','JTOOLBAR_DELETE');
            }

            if (isset($this->items[0]->state)) {
			    JToolBarHelper::divider();
			    JToolBarHelper::archiveList('aircraftdeals.archive','JTOOLBAR_ARCHIVE');
            }
            if (isset($this->items[0]->checked_out)) {
            	JToolBarHelper::custom('aircraftdeals.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
            }
		}
        
        //Show trash and delete for components that uses the state field
        if (isset($this->items[0]->state)) {
		    if ($state->get('filter.state') == -2 && $canDo->get('core.delete')) {
			    JToolBarHelper::deleteList('', 'aircraftdeals.delete','JTOOLBAR_EMPTY_TRASH');
			    JToolBarHelper::divider();
		    } else if ($canDo->get('core.edit.state')) {
			    JToolBarHelper::trash('aircraftdeals.trash','JTOOLBAR_TRASH');
			    JToolBarHelper::divider();
		    }
        }

		if ($canDo->get('core.admin')) {
			JToolBarHelper::preferences('com_industry_data_table');
		}
        
        //Set sidebar action - New in 3.0
		JHtmlSidebar::setAction('index.php?option=com_industry_data_table&view=aircraftdeals');
        
        $this->extra_sidebar = '';
        
		JHtmlSidebar::addFilter(

			JText::_('JOPTION_SELECT_PUBLISHED'),

			'filter_published',

			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), "value", "text", $this->state->get('filter.state'), true)

		);

        
	}
    
	protected function getSortFields()
	{
		return array(
		'a.id' => JText::_('JGRID_HEADING_ID'),
		'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
		'a.state' => JText::_('JSTATUS'),
		'a.checked_out' => JText::_('COM_INDUSTRY_DATA_TABLE_AIRCRAFTDEALS_CHECKED_OUT'),
		'a.checked_out_time' => JText::_('COM_INDUSTRY_DATA_TABLE_AIRCRAFTDEALS_CHECKED_OUT_TIME'),
		'a.created_by' => JText::_('COM_INDUSTRY_DATA_TABLE_AIRCRAFTDEALS_CREATED_BY'),
		'a.msn' => JText::_('COM_INDUSTRY_DATA_TABLE_AIRCRAFTDEALS_MSN'),
		'a.manufacturer' => JText::_('COM_INDUSTRY_DATA_TABLE_AIRCRAFTDEALS_MANUFACTURER'),
		'a.model' => JText::_('COM_INDUSTRY_DATA_TABLE_AIRCRAFTDEALS_MODEL'),
		'a.event' => JText::_('COM_INDUSTRY_DATA_TABLE_AIRCRAFTDEALS_EVENT'),
		'a.owner' => JText::_('COM_INDUSTRY_DATA_TABLE_AIRCRAFTDEALS_OWNER'),
		'a.operator' => JText::_('COM_INDUSTRY_DATA_TABLE_AIRCRAFTDEALS_OPERATOR'),
		'a.date' => JText::_('COM_INDUSTRY_DATA_TABLE_AIRCRAFTDEALS_DATE'),
		);
	}

    
}
