<?php
/**
 * @version     1.0.3
 * @package     com_floorplan
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View to edit
 */
class FloorplanViewBooth extends JViewLegacy
{
	protected $state;
	protected $item;
	protected $form;
	protected $params;
	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		//$app            = JFactory::getApplication();
		$this->state	= $this->get('State');
		$this->item		= $this->get('Item');
		$this->form		= $this->get('Form');
		$params   = JComponentHelper::getParams('com_floorplan');
		$Img = $this->item->get('logo');
		
		
		
		if ($Img!="") {
			$result		= FloorplanHelper::ResizeImage($this->item->get('logo'),
														$params->get('WidthB'));
		 JError::raiseNotice( 100, $result);
		}
		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
		}

		$this->addToolbar();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 */
	protected function addToolbar()
	{
		JFactory::getApplication()->input->set('hidemainmenu', true);

		$user		= JFactory::getUser();
		$isNew		= ($this->item->id == 0);
        if (isset($this->item->checked_out)) {
		    $checkedOut	= !($this->item->checked_out == 0 || $this->item->checked_out == $user->get('id'));
        } else {
            $checkedOut = false;
        }
		$canDo		= FloorplanHelper::getActions();

		JToolBarHelper::title(JText::_('COM_FLOORPLAN_TITLE_BOOTH'), 'booth.png');

		// If not checked out, can save the item.
		if (!$checkedOut && ($canDo->get('core.edit')||($canDo->get('core.create'))))
		{

			JToolBarHelper::apply('booth.apply', 'JTOOLBAR_APPLY');
			JToolBarHelper::save('booth.save', 'JTOOLBAR_SAVE');
		}
		if (!$checkedOut && ($canDo->get('core.create'))){
			JToolBarHelper::custom('booth.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
		}
		// If an existing item, can save to a copy.
		if (!$isNew && $canDo->get('core.create')) {
			JToolBarHelper::custom('booth.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
		}
		if (empty($this->item->id)) {
			JToolBarHelper::cancel('booth.cancel', 'JTOOLBAR_CANCEL');
		}
		else {
			JToolBarHelper::cancel('booth.cancel', 'JTOOLBAR_CLOSE');
		}

	}
}
