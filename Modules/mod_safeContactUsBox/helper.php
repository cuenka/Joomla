<?php
class safeContactUsBox
{
   /**
     * Retrieves the hello message
     *
     * @param array $params An object containing the module parameters
     * @access public
     */
    public $name;
    public $position;
    public $email;
    public $phone;     
    public static function getcode( $params )
    {
    $Contacts[3] = new safeContactUsBox;
    for ($i = 0; $i < 4; $i++) {
    	$Contacts[$i]->name = $params->get('Name'.$i, '');
    	$Contacts[$i]->position = $params->get('Position'.$i, '');
    	$Contacts[$i]->email = $params->get('Email'.$i, '');
    	$Contacts[$i]->phone = $params->get('Phone'.$i, ''); 	
    }
   return $Contacts;
    }
}
?>