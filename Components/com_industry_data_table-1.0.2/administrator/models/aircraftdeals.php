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
class Industry_data_tableModelAircraftdeals extends JModelList {

    /**
     * Constructor.
     *
     * @param    array    An optional associative array of configuration settings.
     * @see        JController
     * @since    1.6
     */
    public function __construct($config = array()) {
        $config['filter_fields'] = array('msn','manufacturer','model','event','owner');
        parent::__construct($config);
        
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since	1.6
     */
    protected function populateState($ordering = null, $direction = null) {

        // Initialise variables.
        $app = JFactory::getApplication();
		parent::populateState('default_column_name', 'ASC');
        // List state information
        $limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'));
        $this->setState('list.limit', $limit);

        $limitstart = JFactory::getApplication()->input->getInt('limitstart', 0);
        $this->setState('list.start', $limitstart);

        
		if(empty($ordering)) {
			$ordering = 'a.ordering';
		}

        // List state information.
        parent::populateState($ordering, $direction);
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return	JDatabaseQuery
     * @since	1.6
     */
    protected function getListQuery() {
    	//searchBOX
    	$search = JRequest::getString( 'search', '','GET' );
    	
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        // Select the required fields from the table.
        $query->select(
                $this->getState(
                        'list.select', 'a.*'
                )
        );

        $query->from('`#__industry_data_table_aircraft_deals` AS a');

        

    // Join over the users for the checked out user.

    $query->select('uc.name AS editor');

    $query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');

    
		// Join over the created by field 'created_by'
		$query->select('created_by.name AS created_by');
		$query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');
        $query->order($db->escape($this->getState('list.ordering', 'default_sort_column')).' '.
                       $db->escape($this->getState('list.direction', 'ASC')));
        

        // Filter by search in title
       // $search = $this->getState('filter.search');
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $query->where('a.id = ' . (int) substr($search, 3));
            } else {
                $search = $db->Quote('%' . $db->escape($search, true) . '%');
                $query->where('( a.msn LIKE '.$search.'  OR  a.manufacturer LIKE '.$search.'  OR  a.model LIKE '.$search.'  OR  a.event LIKE '.$search.'  OR  a.owner LIKE '.$search.'  OR  a.operator LIKE '.$search.' OR  a.date LIKE '.$search.' )');
            }
        }
        $query->searchterm =  $search;
		return $query;
    }

    public function getItems() {
        return parent::getItems();
    }
	public function getSearch() {
		return JRequest::getString( 'search', '','GET' );
	}
}
