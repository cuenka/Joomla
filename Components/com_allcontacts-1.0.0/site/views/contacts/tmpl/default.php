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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

$user = JFactory::getUser();
$userId = $user->get('id');
$listOrder = $this->state->get('list.ordering');
$listDirn = $this->state->get('list.direction');
$canCreate = $user->authorise('core.create', 'com_allcontacts');
$canEdit = $user->authorise('core.edit', 'com_allcontacts');
$canCheckin = $user->authorise('core.manage', 'com_allcontacts');
$canChange = $user->authorise('core.edit.state', 'com_allcontacts');
$canDelete = $user->authorise('core.delete', 'com_allcontacts');
?>

<form action="<?php echo JRoute::_('index.php?option=com_allcontacts&view=contacts'); ?>" method="post" name="adminForm" id="adminForm">

    <?php echo JLayoutHelper::render('default_filter', array('view' => $this), dirname(__FILE__)); ?>
    <table class="table table-striped" id = "contactList" >
        <thead >
            <tr >
                <?php if (isset($this->items[0]->state)): ?>
        <th width="1%" class="nowrap center">
            <?php echo JHtml::_('grid.sort', 'JSTATUS', 'a.state', $listDirn, $listOrder); ?>
        </th>
    <?php endif; ?>

    				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ALLCONTACTS_CONTACTS_CREATED_BY', 'a.created_by', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ALLCONTACTS_CONTACTS_DEPARTAMENT', 'a.departament', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ALLCONTACTS_CONTACTS_NAME', 'a.name', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ALLCONTACTS_CONTACTS_JOBTITLE', 'a.jobtitle', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ALLCONTACTS_CONTACTS_PHONE', 'a.phone', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ALLCONTACTS_CONTACTS_EMAIL', 'a.email', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_ALLCONTACTS_CONTACTS_PHOTO', 'a.photo', $listDirn, $listOrder); ?>
				</th>


    <?php if (isset($this->items[0]->id)): ?>
        <th width="1%" class="nowrap center hidden-phone">
            <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
        </th>
    <?php endif; ?>

    				<?php if ($canEdit || $canDelete): ?>
					<th class="center">
				<?php echo JText::_('COM_ALLCONTACTS_CONTACTS_ACTIONS'); ?>
				</th>
				<?php endif; ?>

    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="<?php echo isset($this->items[0]) ? count(get_object_vars($this->items[0])) : 10; ?>">
            <?php echo $this->pagination->getListFooter(); ?>
        </td>
    </tr>
    </tfoot>
    <tbody>
    <?php foreach ($this->items as $i => $item) : ?>
        <?php $canEdit = $user->authorise('core.edit', 'com_allcontacts'); ?>

        
        <tr class="row<?php echo $i % 2; ?>">

            <?php if (isset($this->items[0]->state)): ?>
                <?php $class = ($canEdit || $canChange) ? 'active' : 'disabled'; ?>
                <td class="center">
                    <a class="btn btn-micro <?php echo $class; ?>"
                       href="<?php echo ($canEdit || $canChange) ? JRoute::_('index.php?option=com_allcontacts&task=contactform.publish&id=' . $item->id . '&state=' . (($item->state + 1) % 2), false, 2) : '#'; ?>">
                        <?php if ($item->state == 1): ?>
                            <i class="icon-publish"></i>
                        <?php else: ?>
                            <i class="icon-unpublish"></i>
                        <?php endif; ?>
                    </a>
                </td>
            <?php endif; ?>

            				<td>

							<?php echo JFactory::getUser($item->created_by)->name; ?>				</td>
				<td>

					<?php echo $item->departament; ?>
				</td>
				<td>
				<?php if (isset($item->checked_out) && $item->checked_out) : ?>
					<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'contacts.', $canCheckin); ?>
				<?php endif; ?>
				<a href="<?php echo JRoute::_('index.php?option=com_allcontacts&view=contact&id='.(int) $item->id); ?>">
				<?php echo $this->escape($item->name); ?></a>
				</td>
				<td>

					<?php echo $item->jobtitle; ?>
				</td>
				<td>

					<?php echo $item->phone; ?>
				</td>
				<td>

					<?php echo $item->email; ?>
				</td>
				<td>

					<?php echo $item->photo; ?>
				</td>


            <?php if (isset($this->items[0]->id)): ?>
                <td class="center hidden-phone">
                    <?php echo (int)$item->id; ?>
                </td>
            <?php endif; ?>

            				<?php if ($canEdit || $canDelete): ?>
					<td class="center">
					</td>
				<?php endif; ?>

        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>

    <?php if ($canCreate): ?>
        <a href="<?php echo JRoute::_('index.php?option=com_allcontacts&task=contactform.edit&id=0', false, 2); ?>"
           class="btn btn-success btn-small"><i
                class="icon-plus"></i> <?php echo JText::_('COM_ALLCONTACTS_ADD_ITEM'); ?></a>
    <?php endif; ?>

    <input type="hidden" name="task" value=""/>
    <input type="hidden" name="boxchecked" value="0"/>
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
    <?php echo JHtml::_('form.token'); ?>
</form>

<script type="text/javascript">

    jQuery(document).ready(function () {
        jQuery('.delete-button').click(deleteItem);
    });

    function deleteItem() {
        var item_id = jQuery(this).attr('data-item-id');
        if (confirm("<?php echo JText::_('COM_ALLCONTACTS_DELETE_MESSAGE'); ?>")) {
            window.location.href = '<?php echo JRoute::_('index.php?option=com_allcontacts&task=contactform.remove&id=', false, 2) ?>' + item_id;
        }
    }
</script>


