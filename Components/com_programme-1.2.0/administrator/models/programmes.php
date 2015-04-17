<?php

/**
 * @version     1.2.0
 * @package     com_programme
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Programme records.
 */
class ProgrammeModelProgrammes extends JModelList {

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
                'title', 'a.title',
                'style', 'a.style',
                'day', 'a.day',
                'sessiontime', 'a.sessiontime',
                'subtitle', 'a.subtitle',
                'information', 'a.information',
                'refreshmentlogo', 'a.refreshmentlogo',
                'refreshmentlink', 'a.refreshmentlink',
                'refreshmentname', 'a.refreshmentname',
                'chairman', 'a.chairman',
                'chairmanisairportspeaker', 'a.chairmanisairportspeaker',
                'moderator', 'a.moderator',
                'moderatorisairportspeaker', 'a.moderatorisairportspeaker',
                'speaker1', 'a.speaker1',
                'isairportspeaker1', 'a.isairportspeaker1',
                'speaker2', 'a.speaker2',
                'isairportspeaker2', 'a.isairportspeaker2',
                'speaker3', 'a.speaker3',
                'isairportspeaker3', 'a.isairportspeaker3',
                'speaker4', 'a.speaker4',
                'isairportspeaker4', 'a.isairportspeaker4',
                'speaker5', 'a.speaker5',
                'isairportspeaker5', 'a.isairportspeaker5',
                'speaker6', 'a.speaker6',
                'isairportspeaker6', 'a.isairportspeaker6',

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
        $params = JComponentHelper::getParams('com_programme');
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
        $query->from('`#__com_programme` AS a');

        
		// Join over the users for the checked out user
		$query->select("uc.name AS editor");
		$query->join("LEFT", "#__users AS uc ON uc.id=a.checked_out");
		// Join over the user field 'created_by'
		$query->select('created_by.name AS created_by');
		$query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');
		// Join over the category 'day'
		$query->select('day.title AS day');
		$query->join('LEFT', '#__categories AS day ON day.id = a.day');

        

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
        
		foreach ($items as $oneItem) {
					$oneItem->style = JText::_('COM_PROGRAMME_PROGRAMMES_STYLE_OPTION_' . strtoupper($oneItem->style));

			if (isset($oneItem->chairman)) {
				$values = explode(',', $oneItem->chairman);

				$textValue = array();
				foreach ($values as $value){
					if(!empty($value)){
						$db = JFactory::getDbo();
						$query = "SELECT * FROM `#__speaker` where `state`=1 HAVING id LIKE '" . $value . "'";
						$db->setQuery($query);
						$results = $db->loadObject();
						if ($results) {
							$textValue[] = $results->name;
						}
					}
				}

			$oneItem->chairman = !empty($textValue) ? implode(', ', $textValue) : $oneItem->chairman;

			}
					$oneItem->chairmanisairportspeaker = JText::_('COM_PROGRAMME_PROGRAMMES_CHAIRMANISAIRPORTSPEAKER_OPTION_' . strtoupper($oneItem->chairmanisairportspeaker));

			if (isset($oneItem->moderator)) {
				$values = explode(',', $oneItem->moderator);

				$textValue = array();
				foreach ($values as $value){
					if(!empty($value)){
						$db = JFactory::getDbo();
						$query = "SELECT * FROM `#__speaker` where `state`=1 HAVING id LIKE '" . $value . "'";
						$db->setQuery($query);
						$results = $db->loadObject();
						if ($results) {
							$textValue[] = $results->name;
						}
					}
				}

			$oneItem->moderator = !empty($textValue) ? implode(', ', $textValue) : $oneItem->moderator;

			}
					$oneItem->moderatorisairportspeaker = JText::_('COM_PROGRAMME_PROGRAMMES_MODERATORISAIRPORTSPEAKER_OPTION_' . strtoupper($oneItem->moderatorisairportspeaker));

			if (isset($oneItem->speaker1)) {
				$values = explode(',', $oneItem->speaker1);

				$textValue = array();
				foreach ($values as $value){
					if(!empty($value)){
						$db = JFactory::getDbo();
						$query = "SELECT * FROM `#__speaker` where `state`=1 HAVING id LIKE '" . $value . "'";
						$db->setQuery($query);
						$results = $db->loadObject();
						if ($results) {
							$textValue[] = $results->name;
						}
					}
				}

			$oneItem->speaker1 = !empty($textValue) ? implode(', ', $textValue) : $oneItem->speaker1;

			}
					$oneItem->isairportspeaker1 = JText::_('COM_PROGRAMME_PROGRAMMES_ISAIRPORTSPEAKER1_OPTION_' . strtoupper($oneItem->isairportspeaker1));

			if (isset($oneItem->speaker2)) {
				$values = explode(',', $oneItem->speaker2);

				$textValue = array();
				foreach ($values as $value){
					if(!empty($value)){
						$db = JFactory::getDbo();
						$query = "SELECT * FROM `#__speaker` where `state`=1 HAVING id LIKE '" . $value . "'";
						$db->setQuery($query);
						$results = $db->loadObject();
						if ($results) {
							$textValue[] = $results->name;
						}
					}
				}

			$oneItem->speaker2 = !empty($textValue) ? implode(', ', $textValue) : $oneItem->speaker2;

			}
					$oneItem->isairportspeaker2 = JText::_('COM_PROGRAMME_PROGRAMMES_ISAIRPORTSPEAKER2_OPTION_' . strtoupper($oneItem->isairportspeaker2));

			if (isset($oneItem->speaker3)) {
				$values = explode(',', $oneItem->speaker3);

				$textValue = array();
				foreach ($values as $value){
					if(!empty($value)){
						$db = JFactory::getDbo();
						$query = "SELECT * FROM `#__speaker` where `state`=1 HAVING id LIKE '" . $value . "'";
						$db->setQuery($query);
						$results = $db->loadObject();
						if ($results) {
							$textValue[] = $results->name;
						}
					}
				}

			$oneItem->speaker3 = !empty($textValue) ? implode(', ', $textValue) : $oneItem->speaker3;

			}
					$oneItem->isairportspeaker3 = JText::_('COM_PROGRAMME_PROGRAMMES_ISAIRPORTSPEAKER3_OPTION_' . strtoupper($oneItem->isairportspeaker3));

			if (isset($oneItem->speaker4)) {
				$values = explode(',', $oneItem->speaker4);

				$textValue = array();
				foreach ($values as $value){
					if(!empty($value)){
						$db = JFactory::getDbo();
						$query = "SELECT * FROM `#__speaker` where `state`=1 HAVING id LIKE '" . $value . "'";
						$db->setQuery($query);
						$results = $db->loadObject();
						if ($results) {
							$textValue[] = $results->name;
						}
					}
				}

			$oneItem->speaker4 = !empty($textValue) ? implode(', ', $textValue) : $oneItem->speaker4;

			}
					$oneItem->isairportspeaker4 = JText::_('COM_PROGRAMME_PROGRAMMES_ISAIRPORTSPEAKER4_OPTION_' . strtoupper($oneItem->isairportspeaker4));

			if (isset($oneItem->speaker5)) {
				$values = explode(',', $oneItem->speaker5);

				$textValue = array();
				foreach ($values as $value){
					if(!empty($value)){
						$db = JFactory::getDbo();
						$query = "SELECT * FROM `#__speaker` where `state`=1 HAVING id LIKE '" . $value . "'";
						$db->setQuery($query);
						$results = $db->loadObject();
						if ($results) {
							$textValue[] = $results->name;
						}
					}
				}

			$oneItem->speaker5 = !empty($textValue) ? implode(', ', $textValue) : $oneItem->speaker5;

			}
					$oneItem->isairportspeaker5 = JText::_('COM_PROGRAMME_PROGRAMMES_ISAIRPORTSPEAKER5_OPTION_' . strtoupper($oneItem->isairportspeaker5));

			if (isset($oneItem->speaker6)) {
				$values = explode(',', $oneItem->speaker6);

				$textValue = array();
				foreach ($values as $value){
					if(!empty($value)){
						$db = JFactory::getDbo();
						$query = "SELECT * FROM `#__speaker` where `state`=1 HAVING id LIKE '" . $value . "'";
						$db->setQuery($query);
						$results = $db->loadObject();
						if ($results) {
							$textValue[] = $results->name;
						}
					}
				}

			$oneItem->speaker6 = !empty($textValue) ? implode(', ', $textValue) : $oneItem->speaker6;

			}
					$oneItem->isairportspeaker6 = JText::_('COM_PROGRAMME_PROGRAMMES_ISAIRPORTSPEAKER6_OPTION_' . strtoupper($oneItem->isairportspeaker6));
		}
        return $items;
    }

}
