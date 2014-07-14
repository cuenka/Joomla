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
	if ($total == 0 ){
	
	 $template ="";
	
	}elseif ($total == $id ){
	if ($id!=1) {
		$template .= "<button><a href='". JRoute::_('index.php?option=com_speakers&view=speaker&id='.($id-1))."' >Previous Speaker</a></button>";
	}
	$template .= "<button><a href='". JRoute::_('index.php?option=com_speakers')."'>See All Speakers</a></button>";
	
	}elseif ($id >= 2 ){
	
	 $template = "<button><a href='". JRoute::_('index.php?option=com_speakers&view=speaker&id='.($id-1))."' >Previous Speaker</a></button>";
	 $template .= "<button><a href='". JRoute::_('index.php?option=com_speakers')."'>See All Speakers</a></button>";
	 $template .= "<button><a href='". JRoute::_('index.php?option=com_speakers&view=speaker&id='.($id+1))."' >Next Speaker</a></button>";
	
	}elseif($total != $id || ($id<2 && $id>$total )){
	
	$template = "<button><a href='". JRoute::_('index.php?option=com_speakers')."'>See All Speakers</a></button>";
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
			
			switch ( $this->params->get('PositionPhotoSpeakerView')) {
				case 'Above':
					$this->params->PositionPhotoSpeakerView= 'style="text-align: center;margin-bottom: 10px;"';
				break;
				case 'Left':
					$this->params->PositionPhotoSpeakerView= 'style="float:left;clear: left;margin: 0 10px 10px 0;"'; 
				break;
				case 'Right':
					$this->params->PositionPhotoSpeakerView= 'style="float:right;clear: right;margin: 0 0 10px 10px;"'; 
				break;	
				default:
					$this->params->PositionPhotoSpeakerView= 'style="width:100%;float:left;"'; 
				break;		
			}	
			
			switch ( $this->params->get('PhotoSizeSpeakerView')) {
				case 'small':
					$this->params->PhotoSizeSpeakerView= 'style="width:80px;height:auto;"';
					$this->params->TextSize= 'class="speakerintroText col-xs-12 col-sm-10 col-md-10 col-lg-10"';
				break;
				case 'medium':
					$this->params->PhotoSizeSpeakerView= 'style="width:150px;height:auto;"';
					$this->params->TextSize= 'class="speakerintroText col-xs-12 col-sm-9 col-md-9 col-lg-9"';				
				break;
				case 'large':
					$this->params->PhotoSizeSpeakerView= 'style="width:200px;height:auto;"';
					$this->params->TextSize= 'class="speakerintroText col-xs-12 col-sm-8 col-md-8 col-lg-8"';				
				break;	
				case 'Xlarge':
					$this->params->PhotoSizeSpeakerView= 'style="width:250px;height:auto;"';
					$this->params->TextSize= 'class="speakerintroText col-xs-12 col-sm-7 col-md-7 col-lg-7"';				
				break;
				default:
					$this->params->PhotoSizeSpeakerView= 'style="width:250px;height:auto;"';
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
		
		switch ( $this->params->get('PositionPhotoSpeakerView')) {
			case 'Above':
				$this->params->PositionPhotoSpeakerView= '';
			break;
			case 'Left':
				$this->params->PositionPhotoSpeakerView= 'float:left;clear: left;'; 
			break;
			case 'Right':
				$this->params->PositionPhotoSpeakerView= 'float:right;clear: right;'; 
			break;	
			default:
				$this->params->PositionPhotoSpeakerView= 'width:100%;float:left;'; 
			break;		
		}			
	
		switch ( $this->params->get('PhotoSizeSpeakerView')) {
			case 'small':
				$this->params->PhotoSizeSpeakerView= 'class="speakerphoto" style="width:20%;padding-right:10px;'.$this->params->PositionPhotoSpeakerView.'" ';
				$this->params->TextSize= 'class="speakerintroText" style="width:80%;padding-right:10px;"';
				break;
			case 'medium':
				$this->params->PhotoSizeSpeakerView= 'class="speakerphoto" style="width:30%;padding-right:10px;'.$this->params->PositionPhotoSpeakerView.'" ';
				$this->params->TextSize= 'class="speakerintroText" style="width:70%;padding-right:10px;"';			
			break;
			case 'large':
				$this->params->PhotoSizeSpeakerView= 'class="speakerphoto" style="width:40%;padding-right:10px;'.$this->params->PositionPhotoSpeakerView.'" ';
				$this->params->TextSize= 'class="speakerintroText" style="width:60%;padding-right:10px;"';			
			break;	
			case 'Xlarge':
				$this->params->PhotoSizeSpeakerView= 'class="speakerphoto" style="width:45%;padding-right:10px;'.$this->params->PositionPhotoSpeakerView.'" ';
				$this->params->TextSize= 'class="speakerintroText" style="width:55%;padding-right:10px;"';			
			break;
			default:
				$this->params->PhotoSizeSpeakerView= 'class="speakerphoto" style="width:30%;padding-right:10px;'.$this->params->PositionPhotoSpeakerView.'" ';
				$this->params->TextSize= 'class="speakerintroText" style="width:70%;padding-right:10px;"';					
			break;		
		}	
	 	$this->params->PositionPhotoSpeakerView="";
	 	
	 	}


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
