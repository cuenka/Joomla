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

class modsupportersHelper
{
	    public function getListQuery() {
	    	//$params = JComponentHelper::getParams('com_supporters');      
	        // Create a new query object.
			$db = JFactory::getDbo();
	        $query = $db->getQuery(true);
	        // Select the required fields from the table.
	       $query->select('website,logo,company,category');
	       $query->from('#__supporters_list');
	       $query->where('state = 1' );	       
	  	   $db->setQuery((string)$query);
	  	   $result = $db->loadObjectList();
	
	       return $result;
	    }
	        public function getMenuURL($ID) {
	        	//$params = JComponentHelper::getParams('com_supporters');      
	            // Create a new query object.
	    		$db = JFactory::getDbo();
	            $query = $db->getQuery(true);
	            // Select the required fields from the table.
	           $query->select('link');
	           $query->from('#__menu');
	           $query->where('id = '.$ID );	       
	      	   $db->setQuery((string)$query);
	      	   $result =  $db->loadRow();
	    
	           return $result;
	        }

}