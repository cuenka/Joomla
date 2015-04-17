<?php

/**
 * @version     1.2.0
 * @package     com_programme
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
defined('_JEXEC') or die; ?>

<h1 class="title programmeb">PROGRAMME</h1>
<?php $category=""; ?>
<?php foreach ($this->items as $item) : ?>


	<?php if ($item->day != $category): ?>
 		<h2 class="" id="programme"><?php echo $item->day; ?></h2>
 		<?php $category = $item->day; ?>
 	<?php endif; ?>
	
	<?php if ($item->style=="daymodified") : ?>
	<div class="bluebox">
		<h6 class="<?php echo $item->style; ?>"><?php echo $item->sessiontime; ?></h6>	
	</div>
	<? endif; ?>
	
	
	
	<?php if ($item->style=="title") : ?>
	<div class="bluebox">
		<h3 class="<?php echo $this->escape($item->style); ?>"><?php echo $item->title; ?></h3>
		
	</div>
	<? endif; ?>
	
	
	
	
	<?php if ($this->escape($item->style) =="break") : ?>
	<div class="bluebox">
		<h3 class="<?php echo $item->style; ?>">
		<?php if ($item->refreshmentlogo !="") : ?>
			<span><?php echo $item->title; ?></span>
			<span>
				<a style="color:#f0f0f0;" href="<?php echo $item->refreshmentlink; ?>">
					<img src="<?php echo $item->refreshmentlogo; ?>" alt="<?php echo $item->refreshmentlink; ?>"/>
				</a>	
			</span>
		<? else: ?>
			<?php echo $item->title; ?>
		<? endif; ?>
		</h3>
		
	</div>
	<div class="clear"></div>
	<? endif; ?>


	<?php if ($item->style == "session") : ?>
	
	<div class="bluebox">
	  <h3 class="<?php echo $item->style; ?>"><?php echo $item->title; ?></h3>
		<?php if ($item->subtitle): ?>
			<div class="subtitle"><?php echo $item->subtitle; ?></div>
		<? endif; ?> 
		
		<?php if ($item->information): ?>
			<div class="information"><?php echo $item->information; ?></div>
		<? endif; ?> 	  


		
		
		<ul class="Speakerlist">
		<?php if ($item->chairman-1!=""  && $item->chairman-1!=-1) : ?>
			<li>
				<h4>CHAIRMAN</h4>
				<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->chairman); ?>">
				<?php if ($item->chairmanisairportspeaker) echo  '<i class="fa fa-plane" style="color: #1978A4;"> </i> '; ?>
				<?php echo '<span style="color:#1978A4;">'.$this->speakers[$item->chairman-1]["name"]." ".$this->speakers[$item->chairman-1]["surname"].",</span> ".
				$this->speakers[$item->chairman-1]["job_title"].", ".
				$this->speakers[$item->chairman-1]["company"]; ?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($item->moderator-1!="" && $item->moderator-1!=-1) : ?>
			<li>
				<h4>MODERATOR</h4>
				<?php echo $item->moderator-1; ?>
				<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->moderator); ?>">
				<?php if ($item->moderatorisairportspeaker) echo  '<i class="fa fa-plane" style="color: #1978A4;"> </i> '; ?>
				<?php echo '<span style="color:#1978A4;">'.$this->speakers[$item->moderator-1]["name"]." ".$this->speakers[$item->moderator-1]["surname"].",</span> ".
				$this->speakers[$item->moderator-1]["job_title"].", ".
				$this->speakers[$item->moderator-1]["company"]; ?>
				</a>
			</li>
		<?php endif; ?>
		<h4>SPEAKERS</h4>		
		<?php if ($item->speaker1!=""  && $item->speaker1-1!=-1) : ?>
			<li>
			<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->speaker1); ?>">
				<?php if ($item->isairportspeaker1) echo  '<i class="fa fa-plane" style="color: #1978A4;"> </i> '; ?>
				<?php echo '<span style="color:#1978A4;">'.$this->speakers[$item->speaker1-1]["name"]." ".$this->speakers[$item->speaker1-1]["surname"].",</span> ".
				$this->speakers[$item->speaker1-1]["job_title"].", ".
				$this->speakers[$item->speaker1-1]["company"]; ?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($item->speaker2!=""  && $item->speaker2-1!=-1) : ?>
			<li>
			<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->speaker2); ?>">
				<?php if ($item->isairportspeaker2) echo  '<i class="fa fa-plane" style="color: #1978A4;"> </i> '; ?>
				<?php echo '<span style="color:#1978A4;">'.$this->speakers[$item->speaker2-1]["name"]." ".$this->speakers[$item->speaker2-1]["surname"].",</span> ".
				$this->speakers[$item->speaker2-1]["job_title"].", ".
				$this->speakers[$item->speaker2-1]["company"]; ?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($item->speaker3!=""  && $item->speaker3-1!=-1) : ?>
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->speaker3); ?>">
				<?php if ($item->isairportspeaker3) echo  '<i class="fa fa-plane" style="color: #1978A4;"> </i> '; ?>
				<?php echo '<span style="color:#1978A4;">'.$this->speakers[$item->speaker3-1]["name"]." ".$this->speakers[$item->speaker3-1]["surname"].",</span> ".
				$this->speakers[$item->speaker3-1]["job_title"].", ".
				$this->speakers[$item->speaker3-1]["company"]; ?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($item->speaker4!=""  && $item->speaker4-1!=-1) : ?>
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->speaker4); ?>">
				<?php if ($item->isairportspeaker4) echo  '<i class="fa fa-plane" style="color: #1978A4;"> </i> '; ?>
				<?php echo '<span style="color:#1978A4;">'.$this->speakers[$item->speaker4-1]["name"]." ".$this->speakers[$item->speaker4-1]["surname"].",</span> ".
				$this->speakers[$item->speaker4-1]["job_title"].", ".
				$this->speakers[$item->speaker4-1]["company"]; ?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($item->speaker5!=""  && $item->speaker5-1!=-1) : ?>
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->speaker5); ?>">
				<?php if ($item->isairportspeaker5) echo  '<i class="fa fa-plane" style="color: #1978A4;"> </i> '; ?>
				<?php echo '<span style="color:#1978A4;">'.$this->speakers[$item->speaker5-1]["name"]." ".$this->speakers[$item->speaker5-1]["surname"].",</span> ".
				$this->speakers[$item->speaker5-1]["job_title"].", ".
				$this->speakers[$item->speaker5-1]["company"]; ?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($item->speaker6!=""  && $item->speaker6-1!=-1) : ?>
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->speaker6); ?>">
				<?php if ($item->isairportspeaker6) echo  '<i class="fa fa-plane" style="color: #1978A4;"> </i> '; ?>
				<?php echo '<span style="color:#1978A4;">'.$this->speakers[$item->speaker6-1]["name"]." ".$this->speakers[$item->speaker6-1]["surname"].",</span> ".
				$this->speakers[$item->speaker6-1]["job_title"].", ".
				$this->speakers[$item->speaker6-1]["company"]; ?>
				</a>
			</li>
		<?php endif; ?>
		</ul>
	
	</div>
    
    <?php endif; ?>         					

<?php endforeach; ?>
<div class="clear"></div>