<?php

/**
 * @version     1.2.0
 * @package     com_programme
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
// No direct access
defined('_JEXEC') or die;

/**
 * programme Table class
 */
class ProgrammeTableprogramme extends JTable {

    /**
     * Constructor
     *
     * @param JDatabase A database connector object
     */
    public function __construct(&$db) {
        parent::__construct('#__com_programme', 'id', $db);
    }

    /**
     * Overloaded bind function to pre-process the params.
     *
     * @param	array		Named array
     * @return	null|string	null is operation was satisfactory, otherwise returns an error
     * @see		JTable:bind
     * @since	1.5
     */
    public function bind($array, $ignore = '') {

        
		$input = JFactory::getApplication()->input;
		$task = $input->getString('task', '');
		if(($task == 'save' || $task == 'apply') && (!JFactory::getUser()->authorise('core.edit.state','com_programme') && $array['state'] == 1)){
			$array['state'] = 0;
		}
		if($array['id'] == 0){
			$array['created_by'] = JFactory::getUser()->id;
		}

		//Support for multiple SQL field: chairman
			if(isset($array['chairman'])){
				if(is_array($array['chairman'])){
					$array['chairman'] = implode(',',$array['chairman']);
				}
				else if(strrpos($array['chairman'], ',') != false){
					$array['chairman'] = explode(',',$array['chairman']);
				}
				else if(empty($array['chairman'])) {
					$array['chairman'] = '';
				}
			}

		//Support for multiple SQL field: moderator
			if(isset($array['moderator'])){
				if(is_array($array['moderator'])){
					$array['moderator'] = implode(',',$array['moderator']);
				}
				else if(strrpos($array['moderator'], ',') != false){
					$array['moderator'] = explode(',',$array['moderator']);
				}
				else if(empty($array['moderator'])) {
					$array['moderator'] = '';
				}
			}

		//Support for multiple SQL field: speaker1
			if(isset($array['speaker1'])){
				if(is_array($array['speaker1'])){
					$array['speaker1'] = implode(',',$array['speaker1']);
				}
				else if(strrpos($array['speaker1'], ',') != false){
					$array['speaker1'] = explode(',',$array['speaker1']);
				}
				else if(empty($array['speaker1'])) {
					$array['speaker1'] = '';
				}
			}

		//Support for multiple SQL field: speaker2
			if(isset($array['speaker2'])){
				if(is_array($array['speaker2'])){
					$array['speaker2'] = implode(',',$array['speaker2']);
				}
				else if(strrpos($array['speaker2'], ',') != false){
					$array['speaker2'] = explode(',',$array['speaker2']);
				}
				else if(empty($array['speaker2'])) {
					$array['speaker2'] = '';
				}
			}

		//Support for multiple SQL field: speaker3
			if(isset($array['speaker3'])){
				if(is_array($array['speaker3'])){
					$array['speaker3'] = implode(',',$array['speaker3']);
				}
				else if(strrpos($array['speaker3'], ',') != false){
					$array['speaker3'] = explode(',',$array['speaker3']);
				}
				else if(empty($array['speaker3'])) {
					$array['speaker3'] = '';
				}
			}

		//Support for multiple SQL field: speaker4
			if(isset($array['speaker4'])){
				if(is_array($array['speaker4'])){
					$array['speaker4'] = implode(',',$array['speaker4']);
				}
				else if(strrpos($array['speaker4'], ',') != false){
					$array['speaker4'] = explode(',',$array['speaker4']);
				}
				else if(empty($array['speaker4'])) {
					$array['speaker4'] = '';
				}
			}

		//Support for multiple SQL field: speaker5
			if(isset($array['speaker5'])){
				if(is_array($array['speaker5'])){
					$array['speaker5'] = implode(',',$array['speaker5']);
				}
				else if(strrpos($array['speaker5'], ',') != false){
					$array['speaker5'] = explode(',',$array['speaker5']);
				}
				else if(empty($array['speaker5'])) {
					$array['speaker5'] = '';
				}
			}

		//Support for multiple SQL field: speaker6
			if(isset($array['speaker6'])){
				if(is_array($array['speaker6'])){
					$array['speaker6'] = implode(',',$array['speaker6']);
				}
				else if(strrpos($array['speaker6'], ',') != false){
					$array['speaker6'] = explode(',',$array['speaker6']);
				}
				else if(empty($array['speaker6'])) {
					$array['speaker6'] = '';
				}
			}

        if (isset($array['params']) && is_array($array['params'])) {
            $registry = new JRegistry();
            $registry->loadArray($array['params']);
            $array['params'] = (string) $registry;
        }

        if (isset($array['metadata']) && is_array($array['metadata'])) {
            $registry = new JRegistry();
            $registry->loadArray($array['metadata']);
            $array['metadata'] = (string) $registry;
        }
        if (!JFactory::getUser()->authorise('core.admin', 'com_programme.programme.' . $array['id'])) {
            $actions = JFactory::getACL()->getActions('com_programme', 'programme');
            $default_actions = JFactory::getACL()->getAssetRules('com_programme.programme.' . $array['id'])->getData();
            $array_jaccess = array();
            foreach ($actions as $action) {
                $array_jaccess[$action->name] = $default_actions[$action->name];
            }
            $array['rules'] = $this->JAccessRulestoArray($array_jaccess);
        }
        //Bind the rules for ACL where supported.
        if (isset($array['rules']) && is_array($array['rules'])) {
            $this->setRules($array['rules']);
        }

        return parent::bind($array, $ignore);
    }

    /**
     * This function convert an array of JAccessRule objects into an rules array.
     * @param type $jaccessrules an arrao of JAccessRule objects.
     */
    private function JAccessRulestoArray($jaccessrules) {
        $rules = array();
        foreach ($jaccessrules as $action => $jaccess) {
            $actions = array();
            foreach ($jaccess->getData() as $group => $allow) {
                $actions[$group] = ((bool) $allow);
            }
            $rules[$action] = $actions;
        }
        return $rules;
    }

    /**
     * Overloaded check function
     */
    public function check() {

        //If there is an ordering column and this is a new row then get the next ordering value
        if (property_exists($this, 'ordering') && $this->id == 0) {
            $this->ordering = self::getNextOrder();
        }

        return parent::check();
    }

    /**
     * Method to set the publishing state for a row or list of rows in the database
     * table.  The method respects checked out rows by other users and will attempt
     * to checkin rows that it can after adjustments are made.
     *
     * @param    mixed    An optional array of primary key values to update.  If not
     *                    set the instance property value is used.
     * @param    integer The publishing state. eg. [0 = unpublished, 1 = published]
     * @param    integer The user id of the user performing the operation.
     * @return    boolean    True on success.
     * @since    1.0.4
     */
    public function publish($pks = null, $state = 1, $userId = 0) {
        // Initialise variables.
        $k = $this->_tbl_key;

        // Sanitize input.
        JArrayHelper::toInteger($pks);
        $userId = (int) $userId;
        $state = (int) $state;

        // If there are no primary keys set check to see if the instance key is set.
        if (empty($pks)) {
            if ($this->$k) {
                $pks = array($this->$k);
            }
            // Nothing to set publishing state on, return false.
            else {
                $this->setError(JText::_('JLIB_DATABASE_ERROR_NO_ROWS_SELECTED'));
                return false;
            }
        }

        // Build the WHERE clause for the primary keys.
        $where = $k . '=' . implode(' OR ' . $k . '=', $pks);

        // Determine if there is checkin support for the table.
        if (!property_exists($this, 'checked_out') || !property_exists($this, 'checked_out_time')) {
            $checkin = '';
        } else {
            $checkin = ' AND (checked_out = 0 OR checked_out = ' . (int) $userId . ')';
        }

        // Update the publishing state for rows with the given primary keys.
        $this->_db->setQuery(
                'UPDATE `' . $this->_tbl . '`' .
                ' SET `state` = ' . (int) $state .
                ' WHERE (' . $where . ')' .
                $checkin
        );
        $this->_db->query();

        // Check for a database error.
        if ($this->_db->getErrorNum()) {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }

        // If checkin is supported and all rows were adjusted, check them in.
        if ($checkin && (count($pks) == $this->_db->getAffectedRows())) {
            // Checkin each row.
            foreach ($pks as $pk) {
                $this->checkin($pk);
            }
        }

        // If the JTable instance value is in the list of primary keys that were set, set the instance.
        if (in_array($this->$k, $pks)) {
            $this->state = $state;
        }

        $this->setError('');
        return true;
    }

    /**
     * Define a namespaced asset name for inclusion in the #__assets table
     * @return string The asset name 
     *
     * @see JTable::_getAssetName 
     */
    protected function _getAssetName() {
        $k = $this->_tbl_key;
        return 'com_programme.programme.' . (int) $this->$k;
    }

    /**
     * Returns the parent asset's id. If you have a tree structure, retrieve the parent's id using the external key field
     *
     * @see JTable::_getAssetParentId 
     */
    protected function _getAssetParentId(JTable $table = null, $id = null) {
        // We will retrieve the parent-asset from the Asset-table
        $assetParent = JTable::getInstance('Asset');
        // Default: if no asset-parent can be found we take the global asset
        $assetParentId = $assetParent->getRootId();
        // The item has the component as asset-parent
        $assetParent->loadByName('com_programme');
        // Return the found asset-parent-id
        if ($assetParent->id) {
            $assetParentId = $assetParent->id;
        }
        return $assetParentId;
    }

    public function delete($pk = null) {
        $this->load($pk);
        $result = parent::delete($pk);
        if ($result) {
            
            
        }
        return $result;
    }

}
