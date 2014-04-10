<?php
/**
 * @version     1.0.2
 * @package     com_engine_data
 * @copyright   Copyright Aviation Media (TM) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
// no direct access
defined('_JEXEC') or die;
?>
<script type="text/javascript">
    function deleteItem(item_id){
        if(confirm("<?php echo JText::_('COM_ENGINE_DATA_DELETE_MESSAGE'); ?>")){
            document.getElementById('form--delete-' + item_id).submit();
        }
    }
</script>

<div class="items">
    <ul class="items_list">
<?php $show = false; ?>
        <?php foreach ($this->items as $item) : ?>

            
				<?php
					if($item->state == 1 || ($item->state == 0 && JFactory::getUser()->authorise('core.edit.own',' com_engine_data..'.$item->id))):
						$show = true;
						?>
							<li><?php echo $item->type; ?>
								<?php
									if(JFactory::getUser()->authorise('core.edit.state','com_engine_data..'.$item->id)):
									?>
										<a href="javascript:document.getElementById('form--state-<?php echo $item->id; ?>').submit()"><?php if($item->state == 1): echo JText::_("COM_ENGINE_DATA_UNPUBLISH_ITEM"); else: echo JText::_("COM_ENGINE_DATA_PUBLISH_ITEM"); endif; ?></a>
										<form id="form--state-<?php echo $item->id ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_engine_data&task=.save'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
											<input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>" />
											<input type="hidden" name="jform[state]" value="<?php echo (int)!((int)$item->state); ?>" />
											<input type="hidden" name="option" value="com_engine_data" />
											<input type="hidden" name="task" value=".publish" />
											<?php echo JHtml::_('form.token'); ?>
										</form>
									<?php
									endif;
									if(JFactory::getUser()->authorise('core.delete','com_engine_data..'.$item->id)):
									?>
										<a href="javascript:deleteItem(<?php echo $item->id; ?>);"><?php echo JText::_("COM_ENGINE_DATA_DELETE_ITEM"); ?></a>
										<form id="form--delete-<?php echo $item->id; ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_engine_data&task=.remove'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
											<input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>" />
											<input type="hidden" name="option" value="com_engine_data" />
											<input type="hidden" name="task" value=".remove" />
											<?php echo JHtml::_('form.token'); ?>
										</form>
									<?php
									endif;
								?>
							</li>
						<?php endif; ?>

<?php endforeach; ?>
        <?php
        if (!$show):
            echo JText::_('COM_ENGINE_DATA_NO_ITEMS');
        endif;
        ?>
    </ul>
</div>
<?php if ($show): ?>
    <div class="pagination">
        <p class="counter">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
<?php endif; ?>


									<?php if(JFactory::getUser()->authorise('core.create','com_engine_data')): ?><a href="<?php echo JRoute::_('index.php?option=com_engine_data&task=.edit&id=0'); ?>"><?php echo JText::_("COM_ENGINE_DATA_ADD_ITEM"); ?></a>
	<?php endif; ?>