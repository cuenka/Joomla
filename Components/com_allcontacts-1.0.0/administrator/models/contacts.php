<?php

/**
 * @version     1.0.0
 * @package     com_allcontacts
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://aviationmedia.aero
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Allcontacts records.
 */
class AllcontactsModelContacts extends JModelList {

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
                                'id', 'a.id',
                'ordering', 'a.ordering',
                'state', 'a.state',
                'created_by', 'a.created_by',
                'departament', 'a.departament',
                'name', 'a.name',
                'jobtitle', 'a.jobtitle',
                'phone', 'a.phone',
                'email', 'a.email',
                'photo', 'a.photo',

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

        
		//Filtering departament
		$this->setState('filter.departament', $app->getUserStateFromRequest($this->context.'.filter.departament', 'filter_departament', '', 'string'));

		//Filtering name
		$this->setState('filter.name', $app->getUserStateFromRequest($this->context.'.filter.name', 'filter_name', '', 'string'));

		//Filtering jobtitle
		$this->setState('filter.jobtitle', $app->getUserStateFromRequest($this->context.'.filter.jobtitle', 'filter_jobtitle', '', 'string'));

		//Filtering phone
		$this->setState('filter.phone', $app->getUserStateFromRequest($this->context.'.filter.phone', 'filter_phone', '', 'string'));

		//Filtering email
		$this->setState('filter.email', $app->getUserStateFromRequest($this->context.'.filter.email', 'filter_email', '', 'string'));

		//Filtering photo
		$this->setState('filter.photo', $app->getUserStateFromRequest($this->context.'.filter.photo', 'filter_photo', '', 'string'));


        // Load the parameters.
        $params = JComponentHelper::getParams('com_allcontacts');
        $this->setState('params', $params);

        // List state information.
        parent::populateState('a.id', 'asc');
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
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        // Select the required fields from the table.
        $query->select(
                $this->getState(
                        'list.select', 'DISTINCT a.*'
                )
        );
        $query->from('`#__allcontacts` AS a');

        
		// Join over the users for the checked out user
		$query->select("uc.name AS editor");
		$query->join("LEFT", "#__users AS uc ON uc.id=a.checked_out");
		// Join over the user field 'created_by'
		$query->select('created_by.name AS created_by');
		$query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');
		// Join over the category 'departament'
		$query->select('departament.title AS departament');
		$query->join('LEFT', '#__categories AS departament ON departament.id = a.departament');

        

		// Filter by published state
		$published = $this->getState('filter.state');
		if (is_numeric($published)) {
			$query->where('a.state = ' . (int) $published);
		} else if ($published === '') {
			$query->where('(a.state IN (0, 1))');
		}

        // Filter by search in title
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $query->where('a.id = ' . (int) substr($search, 3));
            } else {
                $search = $db->Quote('%' . $db->escape($search, true) . '%');
                
            }
        }

        

		//Filtering departament
		$filter_departament = $this->state->get("filter.departament");
		if ($filter_departament) {
			$query->where("a.departament = '".$db->escape($filter_departament)."'");
		}

		//Filtering name

		//Filtering jobtitle

		//Filtering phone

		//Filtering email

		//Filtering photo


        // Add the list ordering clause.
        $orderCol = $this->state->get('list.ordering');
        $orderDirn = $this->state->get('list.direction');
        if ($orderCol && $orderDirn) {
            $query->order($db->escape($orderCol . ' ' . $orderDirn));
        }

        return $query;
    }

    public function getItems() {
        $items = parent::getItems();
        
        return $items;
    }

}
