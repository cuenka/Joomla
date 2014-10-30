<?php
/**
 * @version     1.0.0
 * @package     com_available_assets
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.afm.aero
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
$canCreate = $user->authorise('core.create', 'com_available_assets');
$canEdit = $user->authorise('core.edit', 'com_available_assets');
$canCheckin = $user->authorise('core.manage', 'com_available_assets');
$canChange = $user->authorise('core.edit.state', 'com_available_assets');
$canDelete = $user->authorise('core.delete', 'com_available_assets');
?>

<form action="<?php echo JRoute::_('index.php?option=com_available_assets&view=aircraftlist'); ?>" method="post" name="adminForm" id="adminForm">

    
    <table class="table table-striped" id = "aircraftformList" >
        <thead >
            <tr >

    				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_AVAILABLE_ASSETS_AIRCRAFTLIST_DBLINK', 'a.dblink', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_AVAILABLE_ASSETS_AIRCRAFTLIST_SERIES', 'a.series', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_AVAILABLE_ASSETS_AIRCRAFTLIST_MODEL', 'a.model', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_AVAILABLE_ASSETS_AIRCRAFTLIST_YOM', 'a.yom', $listDirn, $listOrder); ?>
				</th>				
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_AVAILABLE_ASSETS_AIRCRAFTLIST_MSN', 'a.msn', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_AVAILABLE_ASSETS_AIRCRAFTLIST_TFHS_TFCS', 'a.tfhs_tfc', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_AVAILABLE_ASSETS_AIRCRAFTLIST_ENGINES', 'a.engines', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_AVAILABLE_ASSETS_AIRCRAFTLIST_CABIN', 'a.cabin', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_AVAILABLE_ASSETS_AIRCRAFTLIST_OL_A_S', 'a.ol_a_s', $listDirn, $listOrder); ?>
				</th>
				
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_AVAILABLE_ASSETS_AIRCRAFTLIST_LU', 'a.lu', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_AVAILABLE_ASSETS_AIRCRAFTLIST_AD', 'a.ad', $listDirn, $listOrder); ?>
				</th>
				<?php /* ?>
				
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_AVAILABLE_ASSETS_AIRCRAFTLIST_COMPANY_LOGO', 'a.company_logo', $listDirn, $listOrder); ?>
				</th>
				<?php */ ?>




    				<?php if ($canEdit || $canDelete): ?>
					<th class="center">
				<?php echo JText::_('COM_AVAILABLE_ASSETS_AIRCRAFTLIST_ACTIONS'); ?>
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
        <?php $canEdit = $user->authorise('core.edit', 'com_available_assets'); ?>

        
        <tr class="row<?php echo $i % 2; ?>">
       				<td>
				<?php if (isset($item->checked_out) && $item->checked_out) : ?>
					<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'aircraftlist.', $canCheckin); ?>
				<?php endif; ?>
				<a href="<?php echo JRoute::_('index.php?option=com_available_assets&view=aircraftformform&id='.(int) $item->id); ?>">
				<?php //echo $this->escape($item->dblink); ?>Link</a>
				</td>
				<td>

					<?php echo $item->series; ?>
				</td>
				<td>

					<?php echo $item->model; ?>
				</td>
				<td>
					<?php echo $item->yom; ?>
				</td>
				<td>

					<?php echo $item->msn; ?>
				</td>
				<td>

					<?php echo $item->tfhs_tfcs; ?>
				</td>
				<td>

					<?php echo $item->engines; ?>
				</td>
				<td>

					<?php echo $item->cabin; ?>
				</td>
				<td>

					<?php echo $item->ol_a_s; ?>
				</td>
				<td>

					<?php echo $item->lu; ?>
				</td>				
				<td>

					<?php echo $item->ad; ?>
				</td>
				<?php /* ?>
				<td>

					<?php echo $item->company_logo; ?>
				</td>
				<?php */ ?>
            				<?php if ($canEdit || $canDelete): ?>
					<td class="center">
					</td>
				<?php endif; ?>

        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>

    <?php if ($canCreate): ?>
        <a href="<?php echo JRoute::_('index.php?option=com_available_assets&task=aircraftformform.edit&id=0', false, 2); ?>"
           class="btn btn-success btn-small"><i
                class="icon-plus"></i> <?php echo JText::_('COM_AVAILABLE_ASSETS_ADD_ITEM'); ?></a>
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
        if (confirm("<?php echo JText::_('COM_AVAILABLE_ASSETS_DELETE_MESSAGE'); ?>")) {
            window.location.href = '<?php echo JRoute::_('index.php?option=com_available_assets&task=aircraftformform.remove&id=', false, 2) ?>' + item_id;
        }
    }
</script>


