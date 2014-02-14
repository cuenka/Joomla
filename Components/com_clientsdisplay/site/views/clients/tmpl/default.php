<?php
/**
 * @version     1.1.1
 * @package     com_clientsdisplay
 * @copyright   Aviation Media (TM)Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
// no direct access
defined('_JEXEC') or die;

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_clientsdisplay', JPATH_ADMINISTRATOR);

?>
<?php if ($this->item) : ?>

    <div class="item_fields">

        <ul class="fields_list">

            			<li><?php echo JText::_('COM_CLIENTSDISPLAY_FORM_LBL_CLIENTS_ID'); ?>:
			<?php echo $this->item->id; ?></li>
			<li><?php echo JText::_('COM_CLIENTSDISPLAY_FORM_LBL_CLIENTS_ORDERING'); ?>:
			<?php echo $this->item->ordering; ?></li>
			<li><?php echo JText::_('COM_CLIENTSDISPLAY_FORM_LBL_CLIENTS_STATE'); ?>:
			<?php echo $this->item->state; ?></li>
			<li><?php echo JText::_('COM_CLIENTSDISPLAY_FORM_LBL_CLIENTS_CHECKED_OUT'); ?>:
			<?php echo $this->item->checked_out; ?></li>
			<li><?php echo JText::_('COM_CLIENTSDISPLAY_FORM_LBL_CLIENTS_CHECKED_OUT_TIME'); ?>:
			<?php echo $this->item->checked_out_time; ?></li>
			<li><?php echo JText::_('COM_CLIENTSDISPLAY_FORM_LBL_CLIENTS_CREATED_BY'); ?>:
			<?php echo $this->item->created_by; ?></li>
			<li><?php echo JText::_('COM_CLIENTSDISPLAY_FORM_LBL_CLIENTS_CLIENT'); ?>:
			<?php echo $this->item->client; ?></li>
			<li><?php echo JText::_('COM_CLIENTSDISPLAY_FORM_LBL_CLIENTS_DESCRIPTION'); ?>:
			<?php echo $this->item->description; ?></li>
			<li><?php echo JText::_('COM_CLIENTSDISPLAY_FORM_LBL_CLIENTS_LOGO'); ?>:
			<?php echo $this->item->logo; ?></li>
			<li><?php echo JText::_('COM_CLIENTSDISPLAY_FORM_LBL_CLIENTS_CLIENTWEBSITE'); ?>:
			<?php echo $this->item->clientwebsite; ?></li>


        </ul>

    </div>
    
<?php
else:
    echo JText::_('COM_CLIENTSDISPLAY_ITEM_NOT_LOADED');
endif;
?>
