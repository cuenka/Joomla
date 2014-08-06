<?php
// no direct access
defined('_JEXEC') or die;

class modlatestonCategoryk2Helper
{
	    public function getListQuery($cat) {
	    	$params = JComponentHelper::getParams('com_speakers');      
	        // Create a new query object.
			$db = JFactory::getDbo();
	        $query = $db->getQuery(true);
	        $query->select($db->quoteName(array('id', 'title', 'publish_up')));
	        $query->from($db->quoteName('#__k2_items'));
	        $query->where($db->quoteName('catid') . ' IN '.$cat);
	        $query->where($db->quoteName('published').' = 1 AND '.$db->quoteName('trash').' = 0');
		    $query->order('publish_up DESC');        
	  	    $db->setQuery((string)$query);
	  	    $result = $db->loadObjectList();
	 
	        return $result;
	    }

}