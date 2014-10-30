<?php
/**
 * @version     1.0.0
 * @package     com_available_assets
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.afm.aero
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

/**
 * Additions list controller class.
 */
class Available_assetsControllerAdditions extends JControllerAdmin
{
	
	

	public function getModel($name = 'addition', $prefix = 'Available_assetsModel')
	{
		echo "getModel";
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
    
    
	/**
	 * Method to save the submitted ordering values for records via AJAX.
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	public function saveOrderAjax()
	{
		// Get the input
		$input = JFactory::getApplication()->input;
		$pks = $input->post->get('cid', array(), 'array');
		$order = $input->post->get('order', array(), 'array');

		// Sanitize the input
		JArrayHelper::toInteger($pks);
		JArrayHelper::toInteger($order);

		// Get the model
		$model = $this->getModel();

		// Save the ordering
		$return = $model->saveorder($pks, $order);

		if ($return)
		{
			echo "1";
		}

		// Close the application
		JFactory::getApplication()->close();
	}
	
	
	function import($cachable = false, $urlparams = false) 
    {	
		require_once JPATH_COMPONENT . '/helpers/import.php';
		date_default_timezone_set('UTC');
		
		echo "<h1>Executing importation</h1>";
	
		// set the default timezone to use. Available since PHP 5.1
		
		$date = date("ym").date("d")-1;
		//$date= 140930;
		
		switch ($_GET["view"]) {
			case 'additions':
			$URL = 'http://www.myairlease.com/efu_media/MSNs_additions_'.$date.'-01.xls';					
			break;
			case 'removals':
			$URL = 'http://www.myairlease.com/efu_media/MSNs_removals_'.$date.'-01.xls';
			break;
			case 'updates':
			$URL = 'http://www.myairlease.com/efu_media/MSNs_updates_'.$date.'-01.xls';
			break;
		}
		$dest='/Applications/XAMPP/xamppfiles/temp/file.xls';
		echo $URL;

		$file_headers = @get_headers($URL);
		echo $file_headers[0];
		if($file_headers[0] != 'HTTP/1.1 200 OK') {
			 echo "<p>File NOT found! Today no new ".$_GET["view"]." from ".$_POST["source"].'</p>';	
		
		}
		else {
		    echo "<p>New update found, ready to import.<br />Source: ".$_POST["source"].'</p>';
		 	
		 	
		 	if (copy ('http://www.myairlease.com/efu_media/MSNs_updates_'.$date.'-01.xls' ,$dest  )) {
		 		echo "<p>file found and copied to our server successfully</p>";
		 		$myObject =  new ImportHelper($_GET["view"],$_POST["source"], $dest);
		 		$myObject->PrepareValues();
		 	}else {
		 		echo "Server could not download and copied succesfully the excel file from ".$_POST["source"];
		 	}
		 	
		 	
		}
		echo '<a href="'.JURI::root().'administrator/index.php?option=com_available_assets&view=aircraftlist" class="btn btn-success">Return to Aircarf List</a>';		
		}
    	

    
}