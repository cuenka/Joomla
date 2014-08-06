<?php // no direct access
defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');
?>
<div class="row-striped">
	<?php if (count($items)) : ?>
		<?php foreach ($items as $item) : ?>
			
			<div class="row-fluid">
				<div class="span2">
				<span class="big"><?php echo $item->id; ?></span>
				</div>
				<div class="span7">
				<span class="big"><?php echo $item->title; ?></span>
				</div>
				<div class="span3">
					<span class="small"><i
							class="icon-calendar"></i> <?php echo JHtml::_('date', $item->publish_up, 'Y-m-d'); ?></span>
				</div>
			</div>
		<?php endforeach; ?>
	<?php else : ?>
		<div class="row-fluid">
			<div class="span12">
				<div class="alert"><?php echo JText::_('MOD_LATEST_NO_MATCHING_RESULTS');?></div>
			</div>
		</div>
	<?php endif; ?>
</div>
