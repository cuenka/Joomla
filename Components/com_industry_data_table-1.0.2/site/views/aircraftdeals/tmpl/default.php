<?php
/**
 * @version     1.0.0
 * @package     com_industry_data_table
 * @copyright   Copyright Aviation Media (TM) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
// no direct access
defined('_JEXEC') or die;
?>
<script type="text/javascript">
    function deleteItem(item_id){
        if(confirm("<?php echo JText::_('COM_INDUSTRY_DATA_TABLE_DELETE_MESSAGE'); ?>")){
            document.getElementById('form-deals-delete-' + item_id).submit();
        }
    }
</script>
<form name="searchForm" id="searchForm"  method="get" class="form-inline" action="<?php echo JURI::current(); ?>"  >
<input type="text" name="search" value="<?php echo $this->searchterm; ?>" />
<input type="submit" value="submit" />
<input type="reset" value="clean search" />
</form>
    <div
<div class="items">

<?php $show = false; ?>
<form id="adminForm" method="post" name="adminForm">
<table class="table table-striped" style="-webkit-user-select: none;-khtml-user-select: none; -moz-user-select: -moz-none; -ms-user-select: none; user-select: none;" oncontextmenu='alert("Unauthorised use and/or duplication of this material without express and written permission from www.afm.aero is strictly prohibited.");return false;'>
      <thead>
        <tr>
          <th><?php echo JHTML::_( 'grid.sort', 'MSN <i class="icon-resize-vertical fa fa-sort"></i>', 'msn', $this->sortDirection, $this->sortColumn); ?></th>
          <th><?php echo JHTML::_( 'grid.sort', 'MANUFACTURER <i class="fa fa-sort"></i>', 'manufacturer', $this->sortDirection, $this->sortColumn); ?></th>
          <th><?php echo JHTML::_( 'grid.sort', 'MODEL <i class="icon-resize-vertical fa fa-sort"></i>', 'model', $this->sortDirection, $this->sortColumn); ?></th>
          <th><?php echo JHTML::_( 'grid.sort', 'EVENT <i class="icon-resize-vertical fa fa-sort"></i>', 'event', $this->sortDirection, $this->sortColumn); ?></th>
          <th><?php echo JHTML::_( 'grid.sort', 'OWNER <i class="icon-resize-vertical fa fa-sort"></i>', 'owner', $this->sortDirection, $this->sortColumn); ?></th>
           <th><?php echo JHTML::_( 'grid.sort', 'OPERATOR <i class="icon-resize-vertical fa fa-sort"></i>', 'operator', $this->sortDirection, $this->sortColumn); ?></th>
          <th><?php echo JHTML::_( 'grid.sort', 'DATE <i class="icon-resize-vertical fa fa-sort"></i>', 'date', $this->sortDirection, $this->sortColumn); ?></th>
        </tr>
       </thead>
       <tbody>
        <?php foreach ($this->items as $item) : ?>
		
                   	<?php
					if($item->state == 1 || ($item->state == 0 && JFactory::getUser()->authorise('core.edit.own',' com_industry_data_table.deals.'.$item->id))):
						$show = true;
						?>
							<?php
									if(JFactory::getUser()->authorise('core.edit.state','com_industry_data_table.deals.'.$item->id)):
									?>
										<a href="javascript:document.getElementById('form-deals-state-<?php echo $item->id; ?>').submit()"><?php if($item->state == 1): echo JText::_("COM_INDUSTRY_DATA_TABLE_UNPUBLISH_ITEM"); else: echo JText::_("COM_INDUSTRY_DATA_TABLE_PUBLISH_ITEM"); endif; ?></a>
										<form id="form-deals-state-<?php echo $item->id ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_industry_data_table&task=deals.save'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
											<input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>" />
											<input type="hidden" name="jform[state]" value="<?php echo (int)!((int)$item->state); ?>" />
											<input type="hidden" name="option" value="com_industry_data_table" />
											<input type="hidden" name="task" value="deals.publish" />
											<?php echo JHtml::_('form.token'); ?>
										</form>
									<?php
									endif;
									if(JFactory::getUser()->authorise('core.delete','com_industry_data_table.deals.'.$item->id)):
									?>
										<a href="javascript:deleteItem(<?php echo $item->id; ?>);"><?php echo JText::_("COM_INDUSTRY_DATA_TABLE_DELETE_ITEM"); ?></a>
										<form id="form-deals-delete-<?php echo $item->id; ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_industry_data_table&task=deals.remove'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
											<input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>" />
											<input type="hidden" name="option" value="com_industry_data_table" />
											<input type="hidden" name="task" value="deals.remove" />
											<?php echo JHtml::_('form.token'); ?>
										</form>
									<?php
									endif;
								?>
						
						<?php endif; ?>
	<?php switch ($item->event) {
		case 'Operating lease':
			echo "<tr class=\"success\" style='background-color: #dff0d8;'>";
			break;
		case 'Returned':
			echo "<tr class=\"danger\" style='background-color: #fcf8e3;'>";
			break;
		case 'Sale & leaseback':
			echo "<tr class=\"warning\" style='background-color: #d9edf7;'>";
			break;		
		case 'Sold off lease':
			echo "<tr class=\"warning\" style='background-color: #FFC0CB;'>";
			break;			
		default:
			echo "<tr>";		
	}?>
	  <td><?php echo $item->msn; ?></td>
	  <td><?php echo $item->manufacturer; ?></td>  
	  <td><?php echo $item->model; ?></td>
	  <td><?php echo $item->event; ?></td>
	  <td><?php echo $item->owner; ?></td>
	  <td><?php echo $item->operator; ?></td>
	  <td><?php echo $item->date; ?></td>
	 </tr>
<?php endforeach; ?>
  </tbody>
</table>
<input type="hidden" name="filter_order" value="<?php echo $this->sortColumn; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->sortDirection; ?>" />
</form>
        <?php
        if (!$show):
            echo JText::_('COM_INDUSTRY_DATA_TABLE_NO_ITEMS');
        endif;
        ?>
   
</div>
<?php if ($show): ?>
    <div class="pagination">
        <p class="counter">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
<?php endif; ?>


									<?php if(JFactory::getUser()->authorise('core.create','com_industry_data_table')): ?><a href="<?php echo JRoute::_('index.php?option=com_industry_data_table&task=deals.edit&id=0'); ?>"><?php echo JText::_("COM_INDUSTRY_DATA_TABLE_ADD_ITEM"); ?></a>
	<?php endif; ?>
	<script language="javascript" type="text/javascript">
	function tableOrdering( order, dir, task )
	{
	        var form = document.adminForm;
	 
	        form.filter_order.value = order;
	        form.filter_order_Dir.value = dir;
	        document.adminForm.submit( task );
	}
	</script>