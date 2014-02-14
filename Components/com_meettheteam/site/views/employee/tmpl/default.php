<?php
/**
 * @version     1.0.0
 * @package     com_meettheteam
 * @copyright   Aviation Media Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
// no direct access
defined('_JEXEC') or die;

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_meettheteam', JPATH_ADMINISTRATOR);

?>
<?php if ($this->item) : ?>

    <div class="item_fields">

        <ul class="fields_list">

            			<li><?php echo JText::_('COM_MEETTHETEAM_FORM_LBL_EMPLOYEE_ID'); ?>:
			<?php echo $this->item->id; ?></li>
			<li><?php echo JText::_('COM_MEETTHETEAM_FORM_LBL_EMPLOYEE_ORDERING'); ?>:
			<?php echo $this->item->ordering; ?></li>
			<li><?php echo JText::_('COM_MEETTHETEAM_FORM_LBL_EMPLOYEE_STATE'); ?>:
			<?php echo $this->item->state; ?></li>
			<li><?php echo JText::_('COM_MEETTHETEAM_FORM_LBL_EMPLOYEE_CHECKED_OUT'); ?>:
			<?php echo $this->item->checked_out; ?></li>
			<li><?php echo JText::_('COM_MEETTHETEAM_FORM_LBL_EMPLOYEE_CHECKED_OUT_TIME'); ?>:
			<?php echo $this->item->checked_out_time; ?></li>
			<li><?php echo JText::_('COM_MEETTHETEAM_FORM_LBL_EMPLOYEE_CREATED_BY'); ?>:
			<?php echo $this->item->created_by; ?></li>
			<li><?php echo JText::_('COM_MEETTHETEAM_FORM_LBL_EMPLOYEE_NAME'); ?>:
			<?php echo $this->item->name; ?></li>
			<li><?php echo JText::_('COM_MEETTHETEAM_FORM_LBL_EMPLOYEE_POSITION'); ?>:
			<?php echo $this->item->position; ?></li>
			<li><?php echo JText::_('COM_MEETTHETEAM_FORM_LBL_EMPLOYEE_JOBDESCRIPTION'); ?>:
			<?php echo $this->item->jobdescription; ?></li>
			<li><?php echo JText::_('COM_MEETTHETEAM_FORM_LBL_EMPLOYEE_PHOTO'); ?>:
			<?php echo $this->item->photo; ?></li>


        </ul>

    </div>
    
<?php
else:
    echo JText::_('COM_MEETTHETEAM_ITEM_NOT_LOADED');
endif;
?>
