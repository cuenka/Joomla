<?php
/**
 * @version     1.1.0
 * @package     com_download
 * @copyright   Aviation Media (TM) Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
// no direct access
defined('_JEXEC') or die;

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_download', JPATH_ADMINISTRATOR);

?>
<?php if ($this->item) : ?>

    <div class="item_fields">

        <ul class="fields_list">

            			<li><?php echo JText::_('COM_DOWNLOAD_FORM_LBL_FILES_ID'); ?>:
			<?php echo $this->item->id; ?></li>
			<li><?php echo JText::_('COM_DOWNLOAD_FORM_LBL_FILES_ORDERING'); ?>:
			<?php echo $this->item->ordering; ?></li>
			<li><?php echo JText::_('COM_DOWNLOAD_FORM_LBL_FILES_STATE'); ?>:
			<?php echo $this->item->state; ?></li>
			<li><?php echo JText::_('COM_DOWNLOAD_FORM_LBL_FILES_CHECKED_OUT'); ?>:
			<?php echo $this->item->checked_out; ?></li>
			<li><?php echo JText::_('COM_DOWNLOAD_FORM_LBL_FILES_CHECKED_OUT_TIME'); ?>:
			<?php echo $this->item->checked_out_time; ?></li>
			<li><?php echo JText::_('COM_DOWNLOAD_FORM_LBL_FILES_CREATED_BY'); ?>:
			<?php echo $this->item->created_by; ?></li>
			<li><?php echo JText::_('COM_DOWNLOAD_FORM_LBL_FILES_NAME'); ?>:
			<?php echo $this->item->name; ?></li>
			<li><?php echo JText::_('COM_DOWNLOAD_FORM_LBL_FILES_CATEGORY'); ?>:
			<?php echo $this->item->category_title; ?></li>
			<li><?php echo JText::_('COM_DOWNLOAD_FORM_LBL_FILES_BANNER'); ?>:
			<?php echo $this->item->banner; ?></li>
			<li><?php echo JText::_('COM_DOWNLOAD_FORM_LBL_FILES_FILE'); ?>:
			<?php echo $this->item->file; ?></li>
			<li><?php echo JText::_('COM_DOWNLOAD_FORM_LBL_FILES_WHATBANNER'); ?>:
			<?php echo $this->item->whatbanner; ?></li>


        </ul>

    </div>
    
<?php
else:
    echo JText::_('COM_DOWNLOAD_ITEM_NOT_LOADED');
endif;
?>
