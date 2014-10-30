<?php

/**
 * @version     1.0.0
 * @package     com_available_assets
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.afm.aero
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Available_assets helper.
 */

class ImportHelper {
	
	private $method;
	private $source;
	private $destination;
	
	function __construct($method, 
						 $source, 
						 $destination )
	 {
	       $this->method = $method;
	       $this->source = $source;
	       $this->destination = $destination;
	       print "<p>Transporter successfully initialized</p>";
	      /* print "<p>Method:".$this->method."</p>";
	       print "<p>source:".$this->source."</p>";
	       print "<p>destination:".$this->destination."</p>";*/
	   }
   
   function PrepareValues() {
		set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/');
   		include 'PHPExcel/IOFactory.php';
   		
   		$inputFileName = $this->destination;
   		$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
   		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
   		
   		$NumRow=0;
   		
   		foreach ($sheetData as $key => $value) {
   			if ($NumRow == 0) 
   			{
   				$NumRow++;
   			}else
   			{
   				switch ($this->method) {
   					case 'additions':
   					$this->saveDBrow($value);
   					echo "<p>Row succesfully added!</p>";   					
   					break;
   					case 'removals':
   					$this->removeDBrow($value);
   					echo "<p>Row succesfully removed!</p>"; 
   					break;
   					case 'updates':
   					$result = $this->UpdateDBrow($value);
   					if ($result) {
   						echo "<p>Row succesfully Updated!</p>"; 
   					}
   					break;
   				}
   				
   			}	
   		}
   	}
   	
   function UpdateDBrow($value) 
   {
   $db = JFactory::getDbo();
    
   $query = $db->getQuery(true);
    
   // Fields to update.
   	   $columns = array('state','dblink', 'series', 'model', 'yom', 'msn', 'tfhs_tfcs', 'engines', 'cabin', 'ol_a_s', 'lu', 'ad', 'company_logo');
   	   
	$fields = array(
	    $db->quoteName('state') . ' = 1',
	    $db->quoteName('dblink') . ' = '.$db->quote($value["A"]),
	    $db->quoteName('series') . ' = '.$db->quote($value["B"]),
	    $db->quoteName('model') . ' = '.$db->quote($value["C"]),
	    $db->quoteName('yom') . ' = '.$db->quote($value["D"]),
	    $db->quoteName('msn') . ' = '.$db->quote($value["E"]),
	    $db->quoteName('tfhs_tfcs') . ' = '.$db->quote($value["F"]),
	    $db->quoteName('engines') . ' = '.$db->quote($value["G"]),
	    $db->quoteName('cabin') . ' = '.$db->quote($value["H"]),
	    $db->quoteName('ol_a_s') . ' = '.$db->quote($value["I"]),    
	    $db->quoteName('lu') . ' = '.$db->quote($value["J"]),
	    $db->quoteName('ad') . ' = '.$db->quote($value["K"]),
	    $db->quoteName('company_logo') . ' = '.$db->quote('images/available_assets/'.$this->source.".jpg")        
	);

   // Conditions for which records should be updated.
   $conditions = array(
      $db->quoteName('msn') . ' = ' . $db->quote($value["E"])
   );
    
   $query->update($db->quoteName('#__available_assets_msns'))->set($fields)->where($conditions);
    
   $db->setQuery($query);
    
   $result = $db->query();
   return $result;
   }
   
   
   
   function removeDBrow($value) 
   {
   $db = JFactory::getDbo();
    
   $query = $db->getQuery(true);
    
   // delete all custom keys for user 1001.
   $conditions = array(
       $db->quoteName('msn') . ' = '.$db->quote($value["E"]));
    
   $query->delete($db->quoteName('#__available_assets_msns'));
   $query->where($conditions);
    
   $db->setQuery($query);
    
    
   $result = $db->query();
   }	
   
   
   
   
   function saveDBrow($value) 
   {
   	   $db = JFactory::getDbo();
	   $query = $db->getQuery(true);
	   
	   $columns = array('state','dblink', 'series', 'model', 'yom', 'msn', 'tfhs_tfcs', 'engines', 'cabin', 'ol_a_s', 'lu', 'ad', 'company_logo');
	   $values =array( 1,
	   				$db->quote($value["A"]), 
	   				$db->quote($value["B"]), 
	   				$db->quote($value["C"]), 
	   				$db->quote($value["D"]), 
	   				$db->quote($value["E"]),
	   				$db->quote($value["F"]),
	   				$db->quote($value["G"]),
	   				$db->quote($value["H"]),
	   				$db->quote($value["I"]),
	   				$db->quote($value["J"]),
	   				$db->quote($value["K"]),
	   				$db->quote('images/available_assets/'.$this->source.".jpg")
	   				);
   		
   		
   		// Create a new query object.
   		
   		$query
   		    ->insert($db->quoteName('#__available_assets_msns'))
   		    ->columns($db->quoteName($columns))
   		    ->values(implode(',', $values));
   		$db->setQuery($query);
   		$db->query();   
   }
   
   
   protected function DeleteFile() 
   {
   $dest = $this->destination;
   if (file_exists($dest)) unlink($dest);
   
   }
   
      
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
   
   
   
   
    /**
     * Configure the Linkbar.
     */
   
    public static function addSubmenu($vName = '') {
        		JHtmlSidebar::addEntry(
			JText::_('COM_AVAILABLE_ASSETS_TITLE_AIRCRAFTLIST'),
			'index.php?option=com_available_assets&view=aircraftlist',
			$vName == 'aircraftlist'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_AVAILABLE_ASSETS_TITLE_ADDITIONS'),
			'index.php?option=com_available_assets&view=additions',
			$vName == 'additions'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_AVAILABLE_ASSETS_TITLE_REMOVALS'),
			'index.php?option=com_available_assets&view=removals',
			$vName == 'removals'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_AVAILABLE_ASSETS_TITLE_UPDATES'),
			'index.php?option=com_available_assets&view=updates',
			$vName == 'updates'
		);

    }

    /**
     * Gets a list of the actions that can be performed.
     *
     * @return	JObject
     * @since	1.6
     */
    public static function getActions() {
        $user = JFactory::getUser();
        $result = new JObject;

        $assetName = 'com_available_assets';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }

	public function getItems() {
        $items = parent::getItems();
        
        return $items;
    }

}
