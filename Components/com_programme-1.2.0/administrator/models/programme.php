<?php
/**
 * @version     1.2.0
 * @package     com_programme
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');

/**
 * Programme model.
 */
class ProgrammeModelProgramme extends JModelAdmin
{
	/**
	 * @var		string	The prefix to use with controller messages.
	 * @since	1.6
	 */
	protected $text_prefix = 'COM_PROGRAMME';


	/**
	 * Returns a reference to the a Table object, always creating it.
	 *
	 * @param	type	The table type to instantiate
	 * @param	string	A prefix for the table class name. Optional.
	 * @param	array	Configuration array for model. Optional.
	 * @return	JTable	A database object
	 * @since	1.6
	 */
	public function getTable($type = 'Programme', $prefix = 'ProgrammeTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Method to get the record form.
	 *
	 * @param	array	$data		An optional array of data for the form to interogate.
	 * @param	boolean	$loadData	True if the form is to load its own data (default case), false if not.
	 * @return	JForm	A JForm object on success, false on failure
	 * @since	1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Initialise variables.
		$app	= JFactory::getApplication();

		// Get the form.
		$form = $this->loadForm('com_programme.programme', 'programme', array('control' => 'jform', 'load_data' => $loadData));
        
        
		if (empty($form)) {
			return false;
		}

		return $form;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return	mixed	The data for the form.
	 * @since	1.6
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_programme.edit.programme.data', array());

		if (empty($data)) {
			$data = $this->getItem();
            

			//Support for multiple or not foreign key field: chairman
			$array = array();
			foreach((array)$data->chairman as $value): 
				if(!is_array($value)):
					$array[] = $value;
				endif;
			endforeach;
			$data->chairman = implode(',',$array);

			//Support for multiple or not foreign key field: moderator
			$array = array();
			foreach((array)$data->moderator as $value): 
				if(!is_array($value)):
					$array[] = $value;
				endif;
			endforeach;
			$data->moderator = implode(',',$array);

			//Support for multiple or not foreign key field: speaker1
			$array = array();
			foreach((array)$data->speaker1 as $value): 
				if(!is_array($value)):
					$array[] = $value;
				endif;
			endforeach;
			$data->speaker1 = implode(',',$array);

			//Support for multiple or not foreign key field: speaker2
			$array = array();
			foreach((array)$data->speaker2 as $value): 
				if(!is_array($value)):
					$array[] = $value;
				endif;
			endforeach;
			$data->speaker2 = implode(',',$array);

			//Support for multiple or not foreign key field: speaker3
			$array = array();
			foreach((array)$data->speaker3 as $value): 
				if(!is_array($value)):
					$array[] = $value;
				endif;
			endforeach;
			$data->speaker3 = implode(',',$array);

			//Support for multiple or not foreign key field: speaker4
			$array = array();
			foreach((array)$data->speaker4 as $value): 
				if(!is_array($value)):
					$array[] = $value;
				endif;
			endforeach;
			$data->speaker4 = implode(',',$array);

			//Support for multiple or not foreign key field: speaker5
			$array = array();
			foreach((array)$data->speaker5 as $value): 
				if(!is_array($value)):
					$array[] = $value;
				endif;
			endforeach;
			$data->speaker5 = implode(',',$array);

			//Support for multiple or not foreign key field: speaker6
			$array = array();
			foreach((array)$data->speaker6 as $value): 
				if(!is_array($value)):
					$array[] = $value;
				endif;
			endforeach;
			$data->speaker6 = implode(',',$array);
		}

		return $data;
	}

	/**
	 * Method to get a single record.
	 *
	 * @param	integer	The id of the primary key.
	 *
	 * @return	mixed	Object on success, false on failure.
	 * @since	1.6
	 */
	public function getItem($pk = null)
	{
		if ($item = parent::getItem($pk)) {

			//Do any procesing on fields here if needed

		}

		return $item;
	}

	/**
	 * Prepare and sanitise the table prior to saving.
	 *
	 * @since	1.6
	 */
	protected function prepareTable($table)
	{
		jimport('joomla.filter.output');

		if (empty($table->id)) {

			// Set ordering to the last item if not set
			if (@$table->ordering === '') {
				$db = JFactory::getDbo();
				$db->setQuery('SELECT MAX(ordering) FROM #__com_programme');
				$max = $db->loadResult();
				$table->ordering = $max+1;
			}

		}
	}

}