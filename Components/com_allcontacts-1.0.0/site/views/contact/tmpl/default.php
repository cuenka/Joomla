<?php
/**
 * @version     1.0.0
 * @package     com_allcontacts
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://aviationmedia.aero
 */
// no direct access
defined('_JEXEC') or die;

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_allcontacts', JPATH_ADMINISTRATOR);

?>
<?php if ($this->item) : ?>

    <div class="item_fields">
        <table class="table">
            <tr>
			<th><?php echo JText::_('COM_ALLCONTACTS_FORM_LBL_CONTACT_ID'); ?></th>
			<td><?php echo $this->item->id; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_ALLCONTACTS_FORM_LBL_CONTACT_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_ALLCONTACTS_FORM_LBL_CONTACT_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_ALLCONTACTS_FORM_LBL_CONTACT_DEPARTAMENT'); ?></th>
			<td><?php echo $this->item->departament_title; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_ALLCONTACTS_FORM_LBL_CONTACT_NAME'); ?></th>
			<td><?php echo $this->item->name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_ALLCONTACTS_FORM_LBL_CONTACT_JOBTITLE'); ?></th>
			<td><?php echo $this->item->jobtitle; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_ALLCONTACTS_FORM_LBL_CONTACT_PHONE'); ?></th>
			<td><?php echo $this->item->phone; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_ALLCONTACTS_FORM_LBL_CONTACT_EMAIL'); ?></th>
			<td><?php echo $this->item->email; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_ALLCONTACTS_FORM_LBL_CONTACT_PHOTO'); ?></th>
			<td><?php echo $this->item->photo; ?></td>
</tr>

        </table>
    </div>
    
    <?php
else:
    echo JText::_('COM_ALLCONTACTS_ITEM_NOT_LOADED');
endif;
?>
