<?php
/**
 * @version     1.1.1
 * @package     com_metro_programme
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
// no direct access
defined('_JEXEC') or die; ?>
<h1 class="title programmeb">PROGRAMME</h1>
<div class="red tile-group">
    <div class="clear">
	
	  <?php //var_dump($this->items[1]);
	  $category=""; ?>
	    <?php foreach ($this->items as $i => $item) : ?>
	    <?php //var_dump($item); ?>
	    	<?php if ($item->day != $category): ?>
	    	 	<h2 class="item title programmeb <?php if ($i==0) echo "accentColor"; ?>" id="programme<?php echo $i;?>"><?php echo $item->day; ?> <i class="fa fa-arrow-down arrow"></i></h2>
	    	 	<?php $category = $item->day; ?>
	    	 <?php endif; ?>	
	    <?php endforeach; ?>
     </div>

<?php $category="Day 1"; ?>
<div id="pivot1" data-mode="carousel" data-start-now="false" data-direction="horizontal" data-repeat="0">
<div>   
<?php foreach ($this->items as $i => $item) : ?>
	<?php if ($item->day != $category): ?>
	</div>
	<div><div class="clear"></div>
	<?php $category = $item->day; ?>
<?php endif; ?>  
	
	<?php if ($item->style=="daymodified") : ?>
	<div class="bluebox">
		<h6 class="<?php echo $item->style; ?>"><?php echo $item->sessiontime; ?></h6>	
	</div>
	<? endif; ?>
	
	
	
	<?php if ($item->style=="Title") : ?>
	<div class="bluebox">
		<h3 class="<?php echo $item->style; ?>"><?php echo $item->title; ?></h3>
		
	</div>
	<? endif; ?>
	
	
	
	
	<?php if ($item->style=="Break") : ?>
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
	
	<?php if ($item->style=="Session") : ?>
	
	<div class="bluebox">
	  <h3 class="<?php echo $item->style; ?>"><?php echo $item->title; ?></h3>
		<?php if ($item->subtitle): ?>
			<div class="subtitle"><?php echo $item->subtitle; ?></div>
		<? endif; ?> 
		
		<?php if ($item->information): ?>
			<div class="information"><?php echo $item->information; ?></div>
		<? endif; ?> 	  


		
		<h3 class="Session">Speakers</h3>
		<ul style="list-style: none;">
		<?php if ($item->chairman!="") : ?>
			<li>
				<a style="color:#f0f0f0;" href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->chairman); ?>">
				<?php if ($item->chairmanisairportspeaker) echo  '<i class="fa fa-plane" style="color: #fff;margin-left: -18px;"> </i> '; ?>
				<?php echo "<b>".$this->speakers[$item->chairman]["name"].",</b> ".
				$this->speakers[$item->chairman]["job_title"].", ".
				$this->speakers[$item->chairman]["company"]; ?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($item->moderator!="") : ?>
			<li>
				<a style="color:#f0f0f0;" href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->moderator); ?>">
				<?php if ($item->moderatorisairportspeaker) echo  '<i class="fa fa-plane" style="color: #fff;margin-left: -18px;"> </i> '; ?>
				<?php echo "<b>".$this->speakers[$item->moderator]["name"].",</b> ".
				$this->speakers[$item->chairman]["job_title"].", ".
				$this->speakers[$item->chairman]["company"]; ?>
				</a>
			</li>
		<?php endif; ?>		
		<?php if ($item->speaker1!="") : ?>
			<li>
			<a style="color:#f0f0f0;" href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->speaker1); ?>">
				<?php if ($item->isairportspeaker1) echo  '<i class="fa fa-plane" style="color: #fff;margin-left: -18px;"> </i> '; ?>
				<?php echo "<b>".$this->speakers[$item->speaker1]["name"].",</b> ".
				$this->speakers[$item->chairman]["job_title"].", ".
				$this->speakers[$item->chairman]["company"]; ?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($item->speaker2!="") : ?>
			<li>
			<a style="color:#f0f0f0;" href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->speaker2); ?>">
				<?php if ($item->isairportspeaker2) echo  '<i class="fa fa-plane" style="color: #fff;margin-left: -18px;"> </i> '; ?>
				<?php echo "<b>".$this->speakers[$item->speaker2]["name"].",</b> ".
				$this->speakers[$item->chairman]["job_title"].", ".
				$this->speakers[$item->chairman]["company"]; ?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($item->speaker3!="") : ?>
			<li>
				<a style="color:#f0f0f0;" href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->speaker3); ?>">
				<?php if ($item->isairportspeaker3) echo  '<i class="fa fa-plane" style="color: #fff;margin-left: -18px;"> </i> '; ?>
				<?php echo "<b>".$this->speakers[$item->speaker3]["name"].",</b> ".
				$this->speakers[$item->chairman]["job_title"].", ".
				$this->speakers[$item->chairman]["company"]; ?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($item->speaker4!="") : ?>
			<li>
				<a style="color:#f0f0f0;" href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->speaker4); ?>">
				<?php if ($item->isairportspeaker4) echo  '<i class="fa fa-plane" style="color: #fff;margin-left: -18px;"> </i> '; ?>
				<?php echo "<b>".$this->speakers[$item->speaker4]["name"].",</b> ".
				$this->speakers[$item->chairman]["job_title"].", ".
				$this->speakers[$item->chairman]["company"]; ?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($item->speaker5!="") : ?>
			<li>
				<a style="color:#f0f0f0;" href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->speaker5); ?>">
				<?php if ($item->isairportspeaker5) echo  '<i class="fa fa-plane" style="color: #fff;margin-left: -18px;"> </i> '; ?>
				<?php echo "<b>".$this->speakers[$item->speaker5]["name"].",</b> ".
				$this->speakers[$item->chairman]["job_title"].", ".
				$this->speakers[$item->chairman]["company"]; ?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($item->speaker6!="") : ?>
			<li>
				<a style="color:#f0f0f0;" href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->speaker6); ?>">
				<?php if ($item->isairportspeaker6) echo  '<i class="fa fa-plane" style="color: #fff;margin-left: -18px;"> </i> '; ?>
				<?php echo "<b>".$this->speakers[$item->speaker6]["name"].",</b> ".
				$this->speakers[$item->chairman]["job_title"].", ".
				$this->speakers[$item->chairman]["company"]; ?>
				</a>
			</li>
		<?php endif; ?>
		</ul>
	
	</div>
    
    <?php endif; ?>         					

<?php endforeach; ?>
</div>
</div></div>
<div class="clear"></div>
<script type="text/javascript">
// carousel mode: Pivot
// some options for the pivot
// the class that will symbolize the active pivot
var activeClass = 'accentColor';
// a placeholder for the active index
var currentIndex = 0;
// the default direction
var aniDirection = 'forward';
// change the animationDirection based on the index
var toggleDirection = false;
// setup the pivot content using a carousel tile
// im using animationComplete as a primitive queue for speedy clickers
jQuery("#pivot1").liveTile({
    animationComplete:function(tileData, $front, $back){
        var tmp,newIndex = tileData.currentIndex;
        if(newIndex != currentIndex){
            tmp = currentIndex;
            currentIndex = newIndex;
            pivotSelected(tmp);
        }else{
            // do cool stuff with tiles and things!
        }
    }
});
// other tiles
jQuery(".live-tile").not(".exclude").liveTile();

jQuery("h2.item").click(function(){
    var newIndex = jQuery(this).index();
    pivotSelected(newIndex);
});

function pivotSelected(newIndex){
    if(newIndex == currentIndex)
        return;    
    jQuery("h2." + activeClass).removeClass(activeClass);
    jQuery("h2.item").eq(newIndex).addClass(activeClass);
    if(toggleDirection)
        aniDirection = (newIndex > currentIndex) ? 'forward' : 'backward';
    currentIndex = newIndex;
    jQuery("#pivot1").liveTile("goto", { index: currentIndex, animationDirection: aniDirection });
}
</script>


