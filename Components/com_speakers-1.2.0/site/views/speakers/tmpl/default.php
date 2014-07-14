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
?>

<script type="text/javascript">
    function deleteItem(item_id){
        if(confirm("<?php echo JText::_('COM_SPEAKERS_DELETE_MESSAGE'); ?>")){
            document.getElementById('form-speaker-delete-' + item_id).submit();
        }
    }
</script>
<?php if ($this->params->get('SpeakersBackgroundColor')): ?>
<div style="padding: 10px;background-color:<?php echo $this->params->get('SpeakerBackgroundColor'); ?>;">
<?php endif; ?>

<?php $show = false; 
$counter="";?>
    
<?php $active = JFactory::getApplication()->getMenu()->getActive(); ?>
<?php  ?>
<h1 class="itemTitle" style="margin: 0;"><?php echo $active->title; ?></h1>

<?php foreach ($this->items as $item) : ?>
<?php
switch ( $this->params->get('TitleFormat')) {
	case 'NameSurname':
		$TitleFormat=  $item->name." ". $item->surname;
		if ($this->params->get('ShowSalutation')) $TitleFormat=  $item->salutation." ". $item->name." ". $item->surname;
		break;
		
	case 'SurnameName':
		$TitleFormat=$item->surname.", ". $item->name;
		if ($this->params->get('ShowSalutation')) $TitleFormat=  $item->salutation." ".$item->surname.", ". $item->name;	
		break;
		
	case 'NaSurJob':
		$TitleFormat= $item->name." ". $item->surname.", ". $item->job_title;
		if ($this->params->get('ShowSalutation'))
		$TitleFormat=$item->salutation." ".$item->name." ". $item->surname.", ".$item->job_title;
		break;	
	
	case 'SurNaJob':
		$TitleFormat=  $item->surname." ". $item->name.", ". $item->job_title;
		if ($this->params->get('ShowSalutation')) $TitleFormat=  $item->salutation." ".$item->surname." ".$item->name.", ". $item->job_title;
		break;
	case 'NaSurJobCom':
		$TitleFormat= $item->name." ". $item->surname.", ". $item->job_title.", ". $item->company;
		if ($this->params->get('ShowSalutation'))
		$TitleFormat=$item->salutation." ".$item->name." ". $item->surname.", ".$item->job_title.", ". $item->company;
		break;	
	
	case 'SurNaJobCom':
		$TitleFormat=  $item->surname." ". $item->name.", ". $item->job_title.", ". $item->company;
		if ($this->params->get('ShowSalutation')) $TitleFormat=  $item->salutation." ".$item->surname." ".$item->name.", ". $item->job_title.", ". $item->company;
		break;
		
	default:
		$TitleFormat=  $item->name." ". $item->surname.", ". $item->job_title;
		if ($this->params->get('ShowSalutation')) $TitleFormat=  $item->salutation." ".$item->name." ". $item->surname.", ". $item->job_title;
		break;		
		
	}


?>


 
<?php if ($counter % $this->params->get('columns') === 0): ?>
<div <?php if($this->params->get('bootstrap'))echo 'class="row"';else echo 'style="width:100%; height:auto;clear:both"'; ?>>
<? endif; ?>
<?php $counter++; ?>

	<div <?php echo $this->params->columnstyle;?>>
			<?php if ($this->params->get('titleAbove') == 1): ?>
			<h3 class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="color:<?php echo $this->params->get('linktitle');?>;">
				<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->id); ?>" style="color:<?php echo $this->params->get('linktitle');?>;text-decoration: none;">
				<?php echo $TitleFormat;?>
				</a>
				</h3>
		<? endif; ?>
	
	
		<div <?php echo $this->params->PhotoSize; ?> <?php echo $this->params->PositionPhoto; ?>>	
			<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->id); ?>" style="color:<?php echo $this->params->get('linktitle');?>;text-decoration: none;"><img src="<?php echo $item->photo;?>" alt="Photo of <?php echo $item->name." ". $item->surname;?>" style="width: 100%;" /></a>
		</div>
	
	
		<?php if ($this->params->get('ShowBiography')): ?> 
			<div <?php echo $this->params->TextSize; ?>>
				<?php if ($this->params->get('titleAbove') == 0): ?>
					<h3 style="color:<?php echo $this->params->get('linktitle');?>;">
						<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->id); ?>" style="color:<?php echo $this->params->get('linktitle');?>;text-decoration: none;">
						<?php echo $TitleFormat;?>
						</a>
						</h3>
				<? endif; ?>
				<?php echo $item->intro_biography;?>
				<p>
					<?php if (!empty($item->full_biography)) :?>
						<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->id); ?>" style="color:<?php echo $this->params->get('linkcolour');?>;text-decoration: none;">Read more</a>
					<?php endif; ?>
				</p>
			</div>
		<?php endif; ?>
	</div>	

<?php if ($counter % $this->params->get('columns') === 0): ?>
</div>
<? endif; ?>

<?php endforeach; ?>




<?php if ($show): ?>
    <div class="pagination">
        <p class="counter">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
<?php endif; ?>


									<?php if(JFactory::getUser()->authorise('core.create','com_speakers')): ?><a href="<?php echo JRoute::_('index.php?option=com_speakers&task=speaker.edit&id=0'); ?>"><?php echo JText::_("COM_SPEAKERS_ADD_ITEM"); ?></a>
	<?php endif; ?>
<?php if ($this->params->get('SpeakersBackgroundColor')): ?>
</div>
<?php endif; ?>	