<?php
/**
 * @version     1.0.4
 * @package     com_supporters
 * @copyright   Aviation Media (TM) Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
// no direct access
defined('_JEXEC') or die;
?>
<script type="text/javascript">
    function deleteItem(item_id){
        if(confirm("<?php echo JText::_('COM_SUPPORTERS_DELETE_MESSAGE'); ?>")){
            document.getElementById('form-list-delete-' + item_id).submit();
        }
    }
</script>

<?php $show = false; 
	  $currentcategory = 0;
?>
	<div class="page-header">
		<h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
	</div>
<?php foreach ($this->items as $item) : ?>

            
<?php
if($item->state == 1 || ($item->state == 0 && JFactory::getUser()->authorise('core.edit.own',' com_supporters'))):
				$show = true;
?>

<?php if ($item->category!= $currentcategory) echo '<h3>'.$item->category_title.'</h3>'; ?>
<div style="width: 100%; float: left; margin-bottom: 20px;">
	<div style="width: 30%; float: left; padding:20px 0px 0px 5px;">
		<?php echo $item->company; ?>
	</div>
	<div style="width: 30%; float: left; padding: 20px 0px 0px 5px;">
		<a id="myHeader<?php echo $item->id; ?>" class="show_info" href="javascript:toggle('myContent<?php echo $item->id; ?>','myHeader<?php echo $item->id; ?>');">More Information</a><br><a class="visit_website" href="<?php echo $item->website; ?>" target="_blank">Visit Website</a>
	</div>
	<div style="width: 30%; float: left;padding: 20px 0px 5px 5px;">
		<img src="<?php echo $item->logo; ?>" alt="<?php echo $item->company; ?> Logo" style="max-height:180px;max-width:100%;">
	</div>
	<div id="myContent<?php echo $item->id; ?>" style="display: none; width: 100%; float: left;">
		<?php echo $item->more_information; ?>
	</div>
</div>						
<?php endif; ?>
<?php $currentcategory = $item->category; ?>						
<?php endforeach; ?>						

<?php if (!$show):
            echo JText::_('COM_SUPPORTERS_NO_ITEMS');
        endif;
?>

<?php if ($show): ?>
    <div class="pagination">
        <p class="counter">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
<?php endif; ?>
<script language="javascript"> 
function toggle(showHideDiv, switchTextDiv) {
  var ele = document.getElementById(showHideDiv);
  var text = document.getElementById(switchTextDiv);
  if(ele.style.display == "block") {
        ele.style.display = "none";
    text.innerHTML = "More Information";
    }
  else {
    ele.style.display = "block";
    text.innerHTML = "Hide";
  }
} 
</script>
