<?php
class metrobox
{
   /**
     * Retrieves the hello message
     *
     * @param array $params An object containing the module parameters
     * @access public
     */    
    public static function getcode( $params, $detect_module )
    {
   
    $PageID = $params->get('PageID', '');
    $Width = $params->get('Width', 0);
    $w = round((($params->get('Width', 0)* 155) / 330) - ((($params->get('Width', 0)* 155) / 330) % 5));
    $Height = $params->get('Height', 'auto');
    $Image = $params->get('Image');
    if ( $detect_module->isMobile()){
    	return '<div style="text-align:left;"><a style="width:'.$Width.'px;" href="http://html5.pagesuite-professional.co.uk/default.aspx?&edid='.$PageID.'"><img src="'.$Image.'" target="_blank" style="height:'.$Height.'px;padding: 5px;"></a>
    	<p style="width:'.$Width.'px;"><a href="http://html5.pagesuite-professional.co.uk/default.aspx?&edid='.$PageID.'" target="_blank">Click in the cover for the digital edition!</a></p></div>';
    	}else{

	   	return '<div style="text-align:left;width:'.$Width.'px;height:'.$Height.'px"><object type="application/x-shockwave-flash" data="http://edition.pagesuite-professional.co.uk/MiniFlip2008.swf?edid='.$PageID.'&urlTarget=blank&spincolor=FFFFFF&pages=6&amp;w='.$w.'&speed=4" width="'.$Width.'px" height="'.$Height.'px" id="MiniFlip2008" align="left"><param name="allowScriptAccess" value="always" ><param name="allowFullScreen" value="false" ><param name="quality" value="high" ><param name="scale" value="noscale" ><param name="salign" value="lt" ><param name="bgcolor" value="#FFFFFF" ><param name="movie" value="http://edition.pagesuite-professional.co.uk/MiniFlip2008.swf?edid='.$PageID.'&urlTarget=blank&spincolor=FFFFFF&amp;pages=6&amp;w='.$w.'&amp;speed=4"></object></div>';
    	}
    }
}
?>