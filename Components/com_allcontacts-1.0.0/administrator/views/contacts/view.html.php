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

jimport('joomla.application.component.view');

/**
 * View class for a list of Allcontacts.
 */
class AllcontactsViewContacts extends JViewLegacy {

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

        AllcontactsHelper::addSubmenu('contacts');

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
        require_once JPATH_COMPONENT . '/helpers/allcontacts.php';

        $state = $this->get('State');
        $canDo = AllcontactsHelper::getActions($state->get('filter.category_id'));

        JToolBarHelper::title(JText::_('COM_ALLCONTACTS_TITLE_CONTACTS'), 'contacts.png');

        //Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_COMPONENT_ADMINISTRATOR . '/views/contact';
        if (file_exists($formPath)) {

            if ($canDo->get('core.create')) {
                JToolBarHelper::addNew('contact.add', 'JTOOLBAR_NEW');
            }

            if ($canDo->get('core.edit') && isset($this->items[0])) {
                JToolBarHelper::editList('contact.edit', 'JTOOLBAR_EDIT');
            }
        }

        if ($canDo->get('core.edit.state')) {

            if (isset($this->items[0]->state)) {
                JToolBarHelper::divider();
                JToolBarHelper::custom('contacts.publish', 'publish.png', 'publish_f2.png', 'JTOOLBAR_PUBLISH', true);
                JToolBarHelper::custom('contacts.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
            } else if (isset($this->items[0])) {
                //If this component does not use state then show a direct delete button as we can not trash
                JToolBarHelper::deleteList('', 'contacts.delete', 'JTOOLBAR_DELETE');
            }

            if (isset($this->items[0]->state)) {
                JToolBarHelper::divider();
                JToolBarHelper::archiveList('contacts.archive', 'JTOOLBAR_ARCHIVE');
            }
            if (isset($this->items[0]->checked_out)) {
                JToolBarHelper::custom('contacts.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
            }
        }

        //Show trash and delete for components that uses the state field
        if (isset($this->items[0]->state)) {
            if ($state->get('filter.state') == -2 && $canDo->get('core.delete')) {
                JToolBarHelper::deleteList('', 'contacts.delete', 'JTOOLBAR_EMPTY_TRASH');
                JToolBarHelper::divider();
            } else if ($canDo->get('core.edit.state')) {
                JToolBarHelper::trash('contacts.trash', 'JTOOLBAR_TRASH');
                JToolBarHelper::divider();
            }
        }

        if ($canDo->get('core.admin')) {
            JToolBarHelper::preferences('com_allcontacts');
        }

        //Set sidebar action - New in 3.0
        JHtmlSidebar::setAction('index.php?option=com_allcontacts&view=contacts');

        $this->extra_sidebar = '';
        
		JHtmlSidebar::addFilter(

			JText::_('JOPTION_SELECT_PUBLISHED'),

			'filter_published',

			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), "value", "text", $this->state->get('filter.state'), true)

		);

		JHtmlSidebar::addFilter(
			JText::_("JOPTION_SELECT_CATEGORY"),
			'filter_departament',
			JHtml::_('select.options', JHtml::_('category.options', 'com_allcontacts'), "value", "text", $this->state->get('filter.departament'))

		);

    }

	protected function getSortFields()
	{
		return array(
		'a.id' => JText::_('JGRID_HEADING_ID'),
		'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
		'a.state' => JText::_('JSTATUS'),
		'a.created_by' => JText::_('COM_ALLCONTACTS_CONTACTS_CREATED_BY'),
		'a.departament' => JText::_('COM_ALLCONTACTS_CONTACTS_DEPARTAMENT'),
		'a.name' => JText::_('COM_ALLCONTACTS_CONTACTS_NAME'),
		'a.jobtitle' => JText::_('COM_ALLCONTACTS_CONTACTS_JOBTITLE'),
		'a.phone' => JText::_('COM_ALLCONTACTS_CONTACTS_PHONE'),
		'a.email' => JText::_('COM_ALLCONTACTS_CONTACTS_EMAIL'),
		'a.photo' => JText::_('COM_ALLCONTACTS_CONTACTS_PHOTO'),
		);
	}

}
