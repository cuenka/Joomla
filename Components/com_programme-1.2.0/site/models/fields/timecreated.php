<?php
/**
 * @version     1.2.0
 * @package     com_programme
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

/**
 * Supports an HTML select list of categories
 */
class JFormFieldTimecreated extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'timecreated';

	/**
	 * Method to get the field input markup.
	 *
	 * @return	string	The field input markup.
	 * @since	1.6
	 */
	protected function getInput() {
        // Initialize variables.
        $html = array();

        $time_created = $this->value;
        if (!strtotime($time_created)) {
            $time_created = JFactory::getDate()->toSql();
            $html[] = '<input type="hidden" name="' . $this->name . '" value="' . $time_created . '" />';
        }
        $hidden = (boolean) $this->element['hidden'];
        if ($hidden == null || !$hidden) {
            $jdate = new JDate($time_created);
            $pretty_date = $jdate->format(JText::_('DATE_FORMAT_LC2'));
            $html[] = "<div>" . $pretty_date . "</div>";
        }
        return implode($html);
    }
}