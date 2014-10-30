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
class Available_assetsHelper {

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
	
	
	public function checkFile($file) {
			$message=null;
		    switch ($file['error']) { 
			            case 0:
			            	if ($file['type']!="text/csv") $message = "Extension file incorrect. MUST BE CSV";
			            	if ($file['size'] >'1059062') $message = "File should be smaller than 1MB";
			            	break;
			            case 1: 
			                $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
			                break; 
			            case 2: 
			                $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form"; 
			                break; 
			            case 3: 
			                $message = "The uploaded file was only partially uploaded"; 
			                break; 
			            case 4: 
			                $message = "No file was uploaded"; 
			                break; 
			            case 5: 
			                $message = "Missing a temporary folder"; 
			                break; 
			            case 6: 
			                $message = "Failed to write file to disk"; 
			                break; 
			            case 7: 
			                $message = "File upload stopped by extension"; 
			                break; 
						case 8: 
						    $message = "Unknown upload error"; 
						    break; 		
			            default:
			                break; 
			 }
			 if(empty($message)){
			 	$dest='/Applications/XAMPP/xamppfiles/temp/file.csv';
				 if (!move_uploaded_file($file['tmp_name'], $dest)) $message = "File is ok, but was impossible to save, probably the hard disk is full or not permision to save"; 
			 }
			
			return $message;
			
			}

}
