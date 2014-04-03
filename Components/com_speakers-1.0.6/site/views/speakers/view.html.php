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
 * View class for a list of Speakers.
 */
class SpeakersViewSpeakers extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $state;
    protected $params;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
        $app                = JFactory::getApplication();
        
        $this->state		= $this->get('State');
        $this->items		= $this->get('Items');
        $this->pagination	= $this->get('Pagination');
        $this->params       = $app->getParams('com_speakers');
        
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {;
            throw new Exception(implode("\n", $errors));
        }
        
        $this->_prepareDocument();
        parent::display($tpl);
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

		if ($this->params->get('bootstrap')==1){
			switch ( $this->params->get('columns')) {
				case 1:
					$this->params->columnstyle= 'class="col-xs-12 col-sm-12 col-md-12 col-lg-12 BlockSpeaker"';
				break;
				case 2:
					$this->params->columnstyle= 'class="col-xs-12 col-sm-6 col-md-6 col-lg-6 BlockSpeaker"';
				break;
				case 3:
					$this->params->columnstyle= 'class="col-xs-12 col-sm-4 col-md-4 col-lg-4 BlockSpeaker"';
				break;	
				default:
					$this->params->columnstyle= 'class="col-xs-12 col-sm-12 col-md-12 col-lg-12 BlockSpeaker"';
				break;		
			}
			
			switch ( $this->params->get('PositionPhoto')) {
				case 'Above':
					$this->params->PositionPhoto= 'style=""';
				break;
				case 'Left':
					$this->params->PositionPhoto= 'style="float:left;clear: left;"'; 
				break;
				case 'Right':
					$this->params->PositionPhoto= 'style="float:right;clear: right;"'; 
				break;	
				default:
					$this->params->PositionPhoto= 'style="width:100%;float:left;"'; 
				break;		
			}	
			
			switch ( $this->params->get('PhotoSize')) {
				case 'small':
					$this->params->PhotoSize= 'class="speakerphoto col-xs-12 col-sm-2 col-md-2 col-lg-2"';
					$this->params->TextSize= 'class="speakerintroText col-xs-12 col-sm-10 col-md-10 col-lg-10"';
				break;
				case 'medium':
					$this->params->PhotoSize= 'class="speakerphoto col-xs-12 col-sm-3 col-md-3 col-lg-3 "';
					$this->params->TextSize= 'class="speakerintroText col-xs-12 col-sm-9 col-md-9 col-lg-9"';				
				break;
				case 'large':
					$this->params->PhotoSize= 'class="speakerphoto col-xs-12 col-sm-4 col-md-4 col-lg-4 "'; 
					$this->params->TextSize= 'class="speakerintroText col-xs-12 col-sm-8 col-md-8 col-lg-8"';				
				break;	
				case 'Xlarge':
					$this->params->PhotoSize= 'class="speakerphoto col-xs-12 col-sm-5 col-md-5 col-lg-5 "'; 
					$this->params->TextSize= 'class="speakerintroText col-xs-12 col-sm-7 col-md-7 col-lg-7"';				
				break;
				default:
					$this->params->PhotoSize= 'class="speakerphoto col-xs-12 col-sm-3 col-md-3 col-lg-3 "'; 
					$this->params->TextSize= 'class="speakerintroText col-xs-12 col-sm-9 col-md-9 col-lg-9"';				
				break;		
			}
			
			
		}else{
			switch ( $this->params->get('columns')) {
				case 1:
					$this->params->columnstyle= 'class="BlockSpeaker" style="width:100%;"';
				break;
				case 2:
					$this->params->columnstyle= 'class="BlockSpeaker" style="width:50%;float:left;"'; 
				break;
				case 3:
					$this->params->columnstyle= 'class="BlockSpeaker" style="width:33%;float:left;"'; 
				break;	
				default:
					$this->params->columnstyle= 'class="BlockSpeaker" style="width:100%;float:left;"'; 
				break;		
			}			
		
		switch ( $this->params->get('PositionPhoto')) {
			case 'Above':
				$this->params->PositionPhoto= '';
			break;
			case 'Left':
				$this->params->PositionPhoto= 'float:left;clear: left;'; 
			break;
			case 'Right':
				$this->params->PositionPhoto= 'float:right;clear: right;'; 
			break;	
			default:
				$this->params->PositionPhoto= 'width:100%;float:left;'; 
			break;		
		}			
	
		switch ( $this->params->get('PhotoSize')) {
			case 'small':
				$this->params->PhotoSize= 'class="speakerphoto" style="width:20%;padding-right:10px;'.$this->params->PositionPhoto.'" ';
				$this->params->TextSize= 'class="speakerintroText" style="width:80%;padding-right:10px;"';
				break;
			case 'medium':
				$this->params->PhotoSize= 'class="speakerphoto" style="width:30%;padding-right:10px;'.$this->params->PositionPhoto.'" ';
				$this->params->TextSize= 'class="speakerintroText" style="width:70%;padding-right:10px;"';			
			break;
			case 'large':
				$this->params->PhotoSize= 'class="speakerphoto" style="width:40%;padding-right:10px;'.$this->params->PositionPhoto.'" ';
				$this->params->TextSize= 'class="speakerintroText" style="width:60%;padding-right:10px;"';			
			break;	
			case 'Xlarge':
				$this->params->PhotoSize= 'class="speakerphoto" style="width:45%;padding-right:10px;'.$this->params->PositionPhoto.'" ';
				$this->params->TextSize= 'class="speakerintroText" style="width:55%;padding-right:10px;"';			
			break;
			default:
				$this->params->PhotoSize= 'class="speakerphoto" style="width:30%;padding-right:10px;'.$this->params->PositionPhoto.'" ';
				$this->params->TextSize= 'class="speakerintroText" style="width:70%;padding-right:10px;"';					
			break;		
		}	
	 	$this->params->PositionPhoto="";
	 	
	 	}
		
		
		
		
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
