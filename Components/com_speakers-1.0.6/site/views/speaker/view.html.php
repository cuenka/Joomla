<?php

/**
 * @version     1.0.6
 * @package     com_speakers
 * @copyright   Jose Cuenca - 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View to edit
 */
class SpeakersViewSpeaker extends JViewLegacy {

    protected $state;
    protected $item;
    protected $form;
    protected $params;

    /**
     * Display the view
     */
    public function display($tpl = null) {
        
		$app	= JFactory::getApplication();
        $user		= JFactory::getUser();
        $this->navigation = $this->get('Navigation');        
        $this->state = $this->get('State');
        $this->item = $this->get('Data');
        $this->params = $app->getParams('com_speakers');
   		
		$this->form		= $this->get('Form');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }
        
        
        
        if($this->_layout == 'edit') {
            
            $authorised = $user->authorise('core.create', 'com_speakers');

            if ($authorised !== true) {
                throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
            }
        }
        
        $this->_prepareDocument();
		$this->navigation = $this->_prepareNavigation($this->navigation,$this->item->id);
        parent::display($tpl);
    }

protected function _prepareNavigation($total, $id){
	$template ="";
	echo $total." == ".$id; 
	if ($total == 0 ){
	
	 $template ="";
	
	}elseif ($total == $id ){
	
	$template .= "<button><a href='". JRoute::_('index.php?option=com_speakers&view=speaker&id='.($id-1))."' >Previous Speaker</a></button>";
	$template .= "<button><a href='". JRoute::_('index.php?option=com_speakers')."'>See All Speaker</a></button>";
	
	}elseif ($id >= 2 ){
	
	 $template = "<button><a href='". JRoute::_('index.php?option=com_speakers&view=speaker&id='.($id-1))."' >Previous Speaker</a></button>";
	 $template .= "<button><a href='". JRoute::_('index.php?option=com_speakers')."'>See All Speaker</a></button>";
	 $template .= "<button><a href='". JRoute::_('index.php?option=com_speakers&view=speaker&id='.($id+1))."' >Next Speaker</a></button>";
	
	}elseif($total != $id || ($id<2 && $id>$total )){
	
	$template = "<button><a href='". JRoute::_('index.php?option=com_speakers')."'>See All Speaker</a></button>";
	$template .= "<button><a href='". JRoute::_('index.php?option=com_speakers&view=speaker&id='.($id+1))."' >Next Speaker</a></button>";

	}
	
	
	return $template;

}
	/**
	 * Prepares the document
	 */
	protected function _prepareDocument()
	{
		$app	= JFactory::getApplication();
		$menus	= $app->getMenu();
		$title	= null;

		// Because the application sets a default page title,
		// we need to get it from the menu item itself
		$menu = $menus->getActive();
		if($menu)
		{
			$this->params->def('page_heading', $this->params->get('page_title', $menu->title));
		} else {
			$this->params->def('page_heading', JText::_('COM_SPEAKERS_DEFAULT_PAGE_TITLE'));
		}
		$title = $this->params->get('page_title', '');
		if (empty($title)) {
			$title = $app->getCfg('sitename');
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 1) {
			$title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 2) {
			$title = JText::sprintf('JPAGETITLE', $title, $app->getCfg('sitename'));
		}
		$this->document->setTitle($title);

		if ($this->params->get('menu-meta_description'))
		{
			$this->document->setDescription($this->params->get('menu-meta_description'));
		}

		if ($this->params->get('menu-meta_keywords'))
		{
			$this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
		}

		if ($this->params->get('robots'))
		{
			$this->document->setMetadata('robots', $this->params->get('robots'));
		}
	}        
    
}
