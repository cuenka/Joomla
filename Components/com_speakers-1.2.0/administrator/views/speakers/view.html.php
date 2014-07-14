<?php
/**
 * @version     1.2.0
 * @package     com_speakers
 * @copyright   Jose Cuenca - 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of Speakers.
 */
class SpeakersViewSpeakers extends JViewLegacy
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
        
		SpeakersBackendHelper::addSubmenu('speakers');
        
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
		require_once JPATH_COMPONENT.'/helpers/speakers.php';

		$state	= $this->get('State');
		$canDo	= SpeakersBackendHelper::getActions($state->get('filter.category_id'));

		JToolBarHelper::title(JText::_('COM_SPEAKERS_TITLE_SPEAKERS'), 'speakers.png');

        //Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_COMPONENT_ADMINISTRATOR.'/views/speaker';
        if (file_exists($formPath)) {

            if ($canDo->get('core.create')) {
			    JToolBarHelper::addNew('speaker.add','JTOOLBAR_NEW');
		    }

		    if ($canDo->get('core.edit') && isset($this->items[0])) {
			    JToolBarHelper::editList('speaker.edit','JTOOLBAR_EDIT');
		    }

        }

		if ($canDo->get('core.edit.state')) {

            if (isset($this->items[0]->state)) {
			    JToolBarHelper::divider();
			    JToolBarHelper::custom('speakers.publish', 'publish.png', 'publish_f2.png','JTOOLBAR_PUBLISH', true);
			    JToolBarHelper::custom('speakers.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
            } else if (isset($this->items[0])) {
                //If this component does not use state then show a direct delete button as we can not trash
                JToolBarHelper::deleteList('', 'speakers.delete','JTOOLBAR_DELETE');
            }

            if (isset($this->items[0]->state)) {
			    JToolBarHelper::divider();
			    JToolBarHelper::archiveList('speakers.archive','JTOOLBAR_ARCHIVE');
            }
            if (isset($this->items[0]->checked_out)) {
            	JToolBarHelper::custom('speakers.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
            }
		}
        
        //Show trash and delete for components that uses the state field
        if (isset($this->items[0]->state)) {
		    if ($state->get('filter.state') == -2 && $canDo->get('core.delete')) {
			    JToolBarHelper::deleteList('', 'speakers.delete','JTOOLBAR_EMPTY_TRASH');
			    JToolBarHelper::divider();
		    } else if ($canDo->get('core.edit.state')) {
			    JToolBarHelper::trash('speakers.trash','JTOOLBAR_TRASH');
			    JToolBarHelper::divider();
		    }
        }

		if ($canDo->get('core.admin')) {
			JToolBarHelper::preferences('com_speakers');
		}
        
        //Set sidebar action - New in 3.0
		JHtmlSidebar::setAction('index.php?option=com_speakers&view=speakers');
        
        $this->extra_sidebar = '';
        
		JHtmlSidebar::addFilter(

			JText::_('JOPTION_SELECT_PUBLISHED'),

			'filter_published',

			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), "value", "text", $this->state->get('filter.state'), true)

		);

		//Filter for the field salutation
		$select_label = JText::sprintf('COM_SPEAKERS_FILTER_SELECT_LABEL', 'Salutation');
		$options = array();
		$options[0] = new stdClass();
		$options[0]->value = "Mr";
		$options[0]->text = "Mr";
		$options[1] = new stdClass();
		$options[1]->value = "Mrs";
		$options[1]->text = "Mrs";
		$options[2] = new stdClass();
		$options[2]->value = "Ms";
		$options[2]->text = "Ms";
		$options[3] = new stdClass();
		$options[3]->value = "Dr";
		$options[3]->text = "Dr";
		$options[4] = new stdClass();
		$options[4]->value = "Miss";
		$options[4]->text = "Miss";
		$options[5] = new stdClass();
		$options[5]->value = "Prof";
		$options[5]->text = "Prof";
		$options[6] = new stdClass();
		$options[6]->value = "Capt";
		$options[6]->text = "Capt";
		JHtmlSidebar::addFilter(
			$select_label,
			'filter_salutation',
			JHtml::_('select.options', $options , "value", "text", $this->state->get('filter.salutation'), true)
		);

        
	}
    
	protected function getSortFields()
	{
		return array(
		'a.id' => JText::_('JGRID_HEADING_ID'),
		'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
		'a.state' => JText::_('JSTATUS'),
		'a.checked_out' => JText::_('COM_SPEAKERS_SPEAKERS_CHECKED_OUT'),
		'a.checked_out_time' => JText::_('COM_SPEAKERS_SPEAKERS_CHECKED_OUT_TIME'),
		'a.created_by' => JText::_('COM_SPEAKERS_SPEAKERS_CREATED_BY'),
		'a.salutation' => JText::_('COM_SPEAKERS_SPEAKERS_SALUTATION'),
		'a.name' => JText::_('COM_SPEAKERS_SPEAKERS_NAME'),
		'a.surname' => JText::_('COM_SPEAKERS_SPEAKERS_SURNAME'),
		'a.intro_biography' => JText::_('COM_SPEAKERS_SPEAKERS_INTRO_BIOGRAPHY'),
		'a.full_biography' => JText::_('COM_SPEAKERS_SPEAKERS_FULL_BIOGRAPHY'),
		'a.company' => JText::_('COM_SPEAKERS_SPEAKERS_COMPANY'),
		'a.job_title' => JText::_('COM_SPEAKERS_SPEAKERS_JOB_TITLE'),
		'a.photo' => JText::_('COM_SPEAKERS_SPEAKERS_PHOTO'),
		);
	}

    
}
