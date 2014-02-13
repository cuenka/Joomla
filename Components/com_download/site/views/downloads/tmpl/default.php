<?php
/**
 * @version     1.0.4
 * @package     com_download
 * @copyright   Aviation Media (TM) Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
// no direct access
defined('_JEXEC') or die;
?>
<script type="text/javascript">
    function deleteItem(item_id){
        if(confirm("<?php echo JText::_('COM_DOWNLOAD_DELETE_MESSAGE'); ?>")){
            document.getElementById('form-files-delete-' + item_id).submit();
        }
    }
</script>

<?php $show = false; 
$currentcategory = "Unknown";
//Path Linkable
//echo JRoute::_('index.php?option=com_download&view=files&id=' . (int)$item->id); 
?>
      <?php 
       foreach ($this->items as $item) : ?>
              	
			<?php if ($item->banner=="NO") : ?>
				<?php if ($item->category_title != $currentcategory) echo "<h1>".$item->category_title."</h1>"; ?>
				 
		        <?php if($item->state == 1 || ($item->state == 0 && JFactory::getUser()->authorise('core.edit.own',' com_download'))):
						$show = true;
				?>
					<div style="width: 100%;float: left;">
						<div style="width: 50%;float: left;">
							<h3><?php echo $item->name; ?></h3>
						</div>			
						<div style="width: 50%;float: left;">
							<h3><a href="<?php echo $item->file;?>" target="_blank">DOWNLOAD</a></h3>				
						</div>
					</div>				
				<?php endif; ?>
			<?php else: ?>
			<div style="width: 100%;margin-bottom: 5px;">
			<a href="<?php echo $item->ClickBanner;?>" target="_blank" rel="follow"><img src="images/banners/<?php echo $item->pathBanner;?>" alt="<?php echo $item->name; ?>" /></a>
			</div>
			
			<?php endif; ?>			
			<?php $currentcategory = $item->category_title; ?>
<?php endforeach; ?>
<div style="clear: both;"></div>
        <?php
        if (!$show):
            echo JText::_('COM_DOWNLOAD_NO_ITEMS');
        endif; ?>
<?php if ($show): ?>
    <div class="pagination">
        <p class="counter">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
<?php endif; ?>

