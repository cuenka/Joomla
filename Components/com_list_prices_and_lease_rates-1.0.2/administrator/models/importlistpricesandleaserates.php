<?php

/**
 * @version     1.0.0
 * @package     com_industry_data_table
 * @copyright   Copyright Aviation Media (TM) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Industry_data_table records.
 */
class list_prices_and_lease_ratesModelimportlistpricesandleaserates extends JModelList {
	
    /**
     * Constructor.
     *
     * @param    array    An optional associative array of configuration settings.
     * @see        JController
     * @since    1.6
     */
    public function __construct($config = array()) {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                
            );
        }

        parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     */
    protected function populateState($ordering = null, $direction = null) {
        // Initialise variables.
        $app = JFactory::getApplication('administrator');

        // Load the filter state.
        $search = $app->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        $published = $app->getUserStateFromRequest($this->context . '.filter.state', 'filter_published', '', 'string');
        $this->setState('filter.state', $published);

        

        // Load the parameters.
        $params = JComponentHelper::getParams('com_industry_data_table');
        $this->setState('params', $params);

        // List state information.
        parent::populateState('a.msn', 'asc');
    }

    /**
     * Method to get a store id based on model configuration state.
     *
     * This is necessary because the model is used by the component and
     * different modules that might need different sets of data or different
     * ordering requirements.
     *
     * @param	string		$id	A prefix for the store id.
     * @return	string		A store id.
     * @since	1.6
     */
    protected function getStoreId($id = '') {
        // Compile the store id.
        $id.= ':' . $this->getState('filter.search');
        $id.= ':' . $this->getState('filter.state');

        return parent::getStoreId($id);
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return	JDatabaseQuery
     * @since	1.6
     */
    protected function getListQuery() {
    	$jinput = JFactory::getApplication()->input;
    	$ReadytoImport = $jinput->get('task', null, 'ALNUM');
    	$File = JRequest::getVar('uploadFile', null, 'files','array');
    	
    	if ($ReadytoImport=='import') {
    		list_prices_and_lease_ratesModelimportlistpricesandleaserates::getFile($ReadytoImport);
    	}elseif($File!=null){
    		$Error = list_prices_and_lease_ratesModelimportlistpricesandleaserates::checkFile($File);
    		if ($Error)	JError::raiseWarning( $File['error'], $Error);
    			else list_prices_and_lease_ratesModelimportlistpricesandleaserates::getFile($ReadytoImport);
    	}else {
    		list_prices_and_lease_ratesModelimportlistpricesandleaserates::getRows();
    	}
    	
    	/* 
    	
    	$File = JRequest::getVar('uploadFile', null, 'files','array');
    	//Check File
    	if ($File!=null) $message =  	
    	if (!empty($message)) {
    	 JError::raiseWarning( $File['error'], $message);
    	}else{
    	 $data = list_prices_and_lease_ratesModelimportlistpricesandleaserates::getFile($File); 
    	}
    			*/
    	/*
    	echo $foo; */
		 $db		= $this->getDbo();
		$query	= $db->getQuery(true);
		$query->select('COUNT(*) as TotalRows');
		$query->from('`#__com_list_prices_and_lease_rate`');
		$db->setQuery($query);  
		return $query; 
	}

protected function getRows() {
		try{
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);
		$query->select('COUNT(*) as TotalRows');
		$query->from('`#__com_list_prices_and_lease_rate`');
		$db->setQuery($query);
		$result = $db->loadObject();  
		JFactory::getApplication()->enqueueMessage('Everything looks fine! I founded '.$result->TotalRows.' diferent MSN. Ready to get more!');
		}catch (Exception $e){
			JError::raiseWarning( 100,'Error with conexion on Database: '.$e );
		}
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
		
	public function getFile($ReadytoImport=null) {
	$header=null;
	$message=null;
	$data=null;
	$dest='/Applications/XAMPP/xamppfiles/temp/file.csv';
	ini_set('auto_detect_line_endings',TRUE);
	if (file_exists($dest)) {
	if (($handle = fopen($dest, 'r')) !== FALSE)
	    {
	        while (($row = fgetcsv($handle, 1000)) !== FALSE)
	        {
	            if(!$header)
	                $header = $row;
	            else
	            	if ($ReadytoImport=='import') 	list_prices_and_lease_ratesModelimportlistpricesandleaserates::InsertRow($header,$row);
	                $data[] = array_combine($header, $row);
	        }
	        fclose($handle);
	    }
	 }   
	 if ($ReadytoImport=='import') list_prices_and_lease_ratesModelimportlistpricesandleaserates::DeleteFile($dest);
return $data;
	}
	
	
	protected function InsertRow($header,$row) {
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);
		// Insert columns.
		if ($header!=$row){
		$columns = $header;
		// Insert values.
		$values = $row;
		$values = implode('\',\'', $values);
		$values = "'".$values."'";
		//echo $values;
		
		$query
		    ->insert($db->quoteName('#__com_list_prices_and_lease_rate'))
		    ->columns($db->quoteName($columns))
		    ->values($values);
		$db->setQuery($query);
		//echo $query;
	    $db->query();
	    }
	}
	
	protected function DeleteFile($dest) {
	if (file_exists($dest)) unlink($dest);
	}
	public function getItems() {
        $items = parent::getItems();
        
        return $items;
    }


}
