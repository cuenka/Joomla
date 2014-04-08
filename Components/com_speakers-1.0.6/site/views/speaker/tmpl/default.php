<?php
/**
 * @version     1.0.6
 * @package     com_speakers
 * @copyright   Jose Cuenca - 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
// no direct access
defined('_JEXEC') or die;

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_speakers', JPATH_ADMINISTRATOR);
$canEdit = JFactory::getUser()->authorise('core.edit', 'com_speakers.' . $this->item->id);
if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_speakers' . $this->item->id)) {
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>
<?php if ($this->item) : ?>
	<?php 
switch ( $this->params->get('TitleFormat')) {
	case 'NameSurname':
		$TitleFormat = $this->item->name." ".$this->item->surname;
		break;
	case 'SurnameName':
		$TitleFormat= $this->item->surname.", ".$this->item->name;
		break;
	case 'NaSurJob':
		$TitleFormat= $this->item->name." ".$this->item->surname.", ".$this->item->job_title;
		break;	
	case 'SurNaJob':
		$TitleFormat= $this->item->surname." ".$this->item->name.", ".$this->item->job_title;
		break;
	default:
		$TitleFormat= $this->item->name." ".$this->item->surname.", ".$this->item->job_title;
		break;		
}
?>
<h1 style="color:<?php echo $this->params->get('linktitle');?>;"><?php echo $TitleFormat;?></h1>
    <div class="item_fields">
<div align="center">
<img src="<?php echo $this->item->photo; ?>" alt="<?php echo $TitleFormat;?> photo" style="max-width: 100%;"/>
</div>
<div id="">
<p><?php echo $this->item->intro_biography; ?></p>
<p><?php echo $this->item->full_biography; ?></p>
</div>
</div>
    <?php if($canEdit && $this->item->checked_out == 0): ?>
		<a href="<?php echo JRoute::_('index.php?option=com_speakers&task=speaker.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_SPEAKERS_EDIT_ITEM"); ?></a>
	<?php endif; ?>
								<?php if(JFactory::getUser()->authorise('core.delete','com_speakers.speaker.'.$this->item->id)):
								?>
									<a href="javascript:document.getElementById('form-speaker-delete-<?php echo $this->item->id ?>').submit()"><?php echo JText::_("COM_SPEAKERS_DELETE_ITEM"); ?></a>
									<form id="form-speaker-delete-<?php echo $this->item->id; ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_speakers&task=speaker.remove'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
										<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
										<input type="hidden" name="option" value="com_speakers" />
										<input type="hidden" name="task" value="speaker.remove" />
										<?php echo JHtml::_('form.token'); ?>
									</form>
								<?php
								endif;
							?>
<?php
else:
    echo JText::_('COM_SPEAKERS_ITEM_NOT_LOADED');
endif;
?>
<?php echo $this->navigation; ?>