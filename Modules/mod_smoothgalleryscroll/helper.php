<?php
class smoothgalleryscroll
{
   /**
     * Retrieves the hello message
     *
     * @param array $params An object containing the module parameters
     * @access public
     */    
    public static function GetCode( $params)
    {
    $list = array();
    for ($i = 0; $i < 6; $i++) {
    	$varimg='Slide'.$i;
    	$varFline='FirstLine'.$i;
    	$varSFline='SecondLine'.$i;
    	$varlink='MenuItem'.$i;
    	if ($params->get($varimg)!="") {
    		$list[$i] = new stdClass;
    		$list[$i]->title = $params->get('title','');
    		$list[$i]->image = $params->get($varimg,'');
    		$list[$i]->line1 = $params->get($varFline,'');
    		$list[$i]->line2 = $params->get($varSFline,'');
    		$list[$i]->bgfl = $params->get('bgfl','');
    		$list[$i]->fontfl = $params->get('fontfl','');
			$list[$i]->bgsl = $params->get('bgsl','');
			$list[$i]->fontsl = $params->get('fontsl','');
			$list[$i]->link = $params->get($varlink,'');
    	}    	
    }
    return $list;
   }
   
   public function SetScripts($params) {
   	$doc = JFactory::getDocument();
   	$doc->addStyleSheet(JURI::base( true ).'/media/mod_smoothgalleryscroll/css/smoothDivScroll.css');
   	$doc->addScript(JURI::base( true ).'/media/mod_smoothgalleryscroll/js/jquery.kinetic.min.js');
   	$doc->addScript(JURI::base( true ).'/media/mod_smoothgalleryscroll/js/jquery.smoothdivscroll-1.3-min.js');
   }
   
   }
?>