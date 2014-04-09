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

jimport('joomla.application.component.view');

/**
 * View class for a list of List_prices_and_lease_rates.
 */
class List_prices_and_lease_ratesViewListprices extends JViewLegacy
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
        
		List_prices_and_lease_ratesHelper::addSubmenu('listprices');
        
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
		require_once JPATH_COMPONENT.'/helpers/list_prices_and_lease_rates.php';

		$state	= $this->get('State');
		$canDo	= List_prices_and_lease_ratesHelper::getActions($state->get('filter.category_id'));

		JToolBarHelper::title(JText::_('COM_LIST_PRICES_AND_LEASE_RATES_TITLE_LISTPRICES'), 'listprices.png');

        //Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_COMPONENT_ADMINISTRATOR.'/views/';
        if (file_exists($formPath)) {

            if ($canDo->get('core.create')) {
			    JToolBarHelper::addNew('.add','JTOOLBAR_NEW');
		    }

		    if ($canDo->get('core.edit') && isset($this->items[0])) {
			    JToolBarHelper::editList('.edit','JTOOLBAR_EDIT');
		    }

        }

		if ($canDo->get('core.edit.state')) {

            if (isset($this->items[0]->state)) {
			    JToolBarHelper::divider();
			    JToolBarHelper::custom('listprices.publish', 'publish.png', 'publish_f2.png','JTOOLBAR_PUBLISH', true);
			    JToolBarHelper::custom('listprices.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
            } else if (isset($this->items[0])) {
                //If this component does not use state then show a direct delete button as we can not trash
                JToolBarHelper::deleteList('', 'listprices.delete','JTOOLBAR_DELETE');
            }

            if (isset($this->items[0]->state)) {
			    JToolBarHelper::divider();
			    JToolBarHelper::archiveList('listprices.archive','JTOOLBAR_ARCHIVE');
            }
            if (isset($this->items[0]->checked_out)) {
            	JToolBarHelper::custom('listprices.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
            }
		}
        
        //Show trash and delete for components that uses the state field
        if (isset($this->items[0]->state)) {
		    if ($state->get('filter.state') == -2 && $canDo->get('core.delete')) {
			    JToolBarHelper::deleteList('', 'listprices.delete','JTOOLBAR_EMPTY_TRASH');
			    JToolBarHelper::divider();
		    } else if ($canDo->get('core.edit.state')) {
			    JToolBarHelper::trash('listprices.trash','JTOOLBAR_TRASH');
			    JToolBarHelper::divider();
		    }
        }

		if ($canDo->get('core.admin')) {
			JToolBarHelper::preferences('com_list_prices_and_lease_rates');
		}
        
        //Set sidebar action - New in 3.0
		JHtmlSidebar::setAction('index.php?option=com_list_prices_and_lease_rates&view=listprices');
        
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
		'a.manufacturer' => JText::_('COM_LIST_PRICES_AND_LEASE_RATES_LISTPRICES_MANUFACTURER'),
		'a.avglistprice' => JText::_('COM_LIST_PRICES_AND_LEASE_RATES_LISTPRICES_AVGLISTPRICE'),
		'a.type' => JText::_('COM_LIST_PRICES_AND_LEASE_RATES_LISTPRICES_TYPE'),
		'a.cmv_oldest' => JText::_('COM_LIST_PRICES_AND_LEASE_RATES_LISTPRICES_CMV_OLDEST'),
		'a.cmv_newest' => JText::_('COM_LIST_PRICES_AND_LEASE_RATES_LISTPRICES_CMV_NEWEST'),
		'a.cmv_change' => JText::_('COM_LIST_PRICES_AND_LEASE_RATES_LISTPRICES_CMV_CHANGE'),
		'a.dlr_oldest' => JText::_('COM_LIST_PRICES_AND_LEASE_RATES_LISTPRICES_DLR_OLDEST'),
		'a.dlr_newest' => JText::_('COM_LIST_PRICES_AND_LEASE_RATES_LISTPRICES_DLR_NEWEST'),
		'a.dlr_change' => JText::_('COM_LIST_PRICES_AND_LEASE_RATES_LISTPRICES_DLR_CHANGE'),
		);
	}

    
}
