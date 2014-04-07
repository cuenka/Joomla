<?php
/**
 * @version		$Id: helper.php 1832 2013-01-30 13:05:12Z lefteris.kavadas $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2013 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

class modspeakersHelper
{
	    public function getListQuery($order) {
	    	$params = JComponentHelper::getParams('com_speakers');      
	        // Create a new query object.
			$db = JFactory::getDbo();
	        $query = $db->getQuery(true);
	
	        // Select the required fields from the table.
	       $query->select('id,name,surname,intro_biography,full_biography,job_title,photo');
	       $query->from('#__speaker');
	       $query->order($order);        
	  	   $db->setQuery((string)$query);
	  	   $result = $db->loadObjectList();
	
	       return $result;
	    }

}