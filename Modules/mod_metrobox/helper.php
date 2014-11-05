<?php
class metrobox
{
   /**
     * Retrieves the hello message
     *
     * @param array $params An object containing the module parameters
     * @access public
     */    

    public static function getcode( $params )
    {
   
   
    }
     public static function gettiles( $params,$size )
     {
     	/*if ($params->get("activateplaintile")){
      		$tile = metrobox::getstyle($params->get("plaintitlecategory"),$size);
      		return $tile;
   		}elseif ($params->get("activateplaintile")) {
   			
   			$tile = metrobox::getstyle($params->get("plaintitlecategory"),'L');
   			$tile["class"]="live-tile ".$params->get("plaintitlecategory");
   			return $tile;
   		}*/
   		
   	}	
    
    public function getstyle($category,$size) {
    	$path='/images/icons';
    	switch ($category) {
    		case 'about':
    			$name='ABOUT';
    			$colour='#82dc6f';
    			$link="http://www.saandr.com/about.html";
    			if ($size='L') $img=$path.'/icons_210px/'.$category.'.png'; else $img=$path.'/icons_80px/'.$category.'.png';
    			break;
			case 'atlanta':
				$name='ATLANTA';
				$colour='#f1592a';
				$link="http://www.saandr.com/atlanta.html";
				if ($size='L') $img=$path.'/icons_210px/'.$category.'.png'; else $img=$path.'/icons_80px/'.$category.'.png';
				break;    		
			case 'programme':
				$name='PROGRAMME';
				$colour='#1978A4';
				$link="http://www.saandr.com/programme.html";
				if ($size='L') $img=$path.'/icons_210px/'.$category.'.png'; else $img=$path.'/icons_80px/'.$category.'.png';
				break;
			case 'speakers':
				$name='SPEAKERS';
				$colour='#3589b2';
				$link="http://www.saandr.com/speakers.html";
				if ($size='L') $img=$path.'/icons_210px/'.$category.'.png'; else $img=$path.'/icons_80px/'.$category.'.png';
				break;  
			case 'networking':
				$name='NETWORKING';
				$colour='#0028BF';
				$link="http://www.saandr.com/networking.html";
				if ($size='L') $img=$path.'/icons_210px/'.$category.'.png'; else $img=$path.'/icons_80px/'.$category.'.png';
				break;
		    case 'brochure':
				$name='BROCHURE';
				$colour='#291beb';
				$link="http://www.saandr.com/brochure.html";
				if ($size='L') $img=$path.'/icons_210px/'.$category.'.png'; else $img=$path.'/icons_80px/'.$category.'.png';
					break;
			case 'gallery':
				$name='GALLERY';
				$colour='#8747F1';
				$link="http://www.saandr.com/gallery.html";
				if ($size='L') $img=$path.'/icons_210px/'.$category.'.png'; else $img=$path.'/icons_80px/'.$category.'.png';
				break;  
			case 'location':
				$name='LOCATION';
				$colour='#5f5f5f';
				$link="http://www.saandr.com/location.html";
				if ($size='L') $img=$path.'/icons_210px/'.$category.'.png'; else $img=$path.'/icons_80px/'.$category.'.png';
				break;
			case 'supporters':
				$name='SUPPORTERS';
				$colour='#b7bcb7';
				$link="http://www.saandr.com/supporters.html";
				if ($size='L') $img=$path.'/icons_210px/'.$category.'.png'; else $img=$path.'/icons_80px/'.$category.'.png';
				break;  
			case 'sponsor':
				$name='SPONSOR';
				$colour='#fa810c';
				$link="http://www.saandr.com/sponsor.html";
				if ($size='L') $img=$path.'/icons_210px/'.$category.'.png'; else $img=$path.'/icons_80px/'.$category.'.png';
				break;
			case 'exhibition':
				$name='EXHIBITION';
				$colour='#eb1b25';
				$link="http://www.saandr.com/exhibition.html";
				if ($size='L') $img=$path.'/icons_210px/'.$category.'.png'; else $img=$path.'/icons_80px/'.$category.'.png';
				break;  
			case 'contact':
				$name='CONTACT US';
				$colour='#20750e';
				$link="http://www.saandr.com/contact-us.html";
				if ($size='L') $img=$path.'/icons_210px/'.$category.'.png'; else $img=$path.'/icons_80px/'.$category.'.png';
				break;
			case 'register':
				$name='REGISTER';
				$colour='#34cc14';
				$link="http://www.saandr.com/register.html";
				if ($size='L') $img=$path.'/icons_210px/'.$category.'.png'; else $img=$path.'/icons_80px/'.$category.'.png';
				break;		    	
			}
    		return array("Name"=>$name,"Colour"=>$colour,"Image"=>$img,"Link"=>$link,"Size"=>$size);
    }
}
?>
