<?php
class Issuuminiflip
{
   /**
     * Retrieves the hello message
     *
     * @param array $params An object containing the module parameters
     * @access public
     */    
    
    public static function getcode( $params, $detect_module )
    {
   
    $url = "http://issuu.com/oembed?url=".$params->get('url')."&format=json";
    $width = $params->get('width');
    $height = ( (int)$params->get('width') * 370) / 525;
    $image = $params->get('image');
    if ( $detect_module->isMobile())
    {
    	return '<img src="'.$Image.'" target="_blank" style="height:'.$Height.'px;padding: 5px;"></a>
    	<p style="width:'.$Width.'px;"><a href="http://html5.pagesuite-professional.co.uk/default.aspx?&edid='.$PageID.'" target="_blank">Click in the cover for the digital edition!</a></p></div>';
    }else{
	
		$json = file_get_contents($url);
		$data = json_decode($json,true);
		if ($params->get('responsive')) 
		{
			$data["html"] = str_replace ( '525px' , "100%" , $data["html"] );
			$data["html"] = str_replace ( '370px' , "auto" , $data["html"] );	
		}else {
		
			$data["html"] = str_replace ( '525' , $width , $data["html"] );
			  $data["html"] = str_replace ( '365' , $height , $data["html"] );	
		}

	   	$data["html"] = str_replace ( "text-align:left;" , "display:none;" , $data["html"] );
	   	
	   	return $data["html"];

   	}

    }
}
?>