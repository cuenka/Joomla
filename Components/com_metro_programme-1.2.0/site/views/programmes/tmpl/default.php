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
<div style="background-color: #A7CADA !important;color: #060C0E;margin-right: 10px;">
<h2 style="padding: 5px 0px 0px 5px;">Pre-conference day</h2>
<h3 style="padding: 5px 0px 5px 5px;">Monday, May 4, Welcome Reception 17.00 - 19.00</h3>
</div>
<div class="red tile-group">
    <div class="clear">
	
	  <?php //var_dump($this->items[1]);
	  $category=""; ?>
	    <?php foreach ($this->items as $i => $item) : ?>
	    <?php //var_dump($item); ?>
	    	<?php if ($item->day != $category): ?>
	    	 	<h2 class="item title programmeb <?php if ($i==0) echo "accentColor"; ?>" id="programme<?php echo $i;?>"><?php echo $item->day; ?> 
	    	 	<?php switch ($item->day) {
	    	 		case 'Day 1':
	    	 			echo"<br /><span style='font-size:10px'></span>Tue, May 5";
	    	 			break;
					case 'Day 2 - Stream 1':
						echo"<br /><span style='font-size:10px'></span>Wed, May 6";
						break;
					case 'Day 2 - Stream 2':
						echo"<br /><span style='font-size:10px'></span>Wed, May 6";
						break;	    	 		
	    	 	} ?>
	    	 	
	    	 	<i class="fa fa-arrow-down arrow"></i></h2>
	    	 	<?php $category = $item->day; ?>
	    	 <?php endif; ?>	
	    <?php endforeach; ?>
     </div>

<?php $category="Day 1"; ?>
<div id="pivot1" data-mode="carousel" data-start-now="false" data-initdelay="90000" data-direction="horizontal" data-repeat="0">
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
		<h3 class="<?php echo $item->style; ?>"><?php echo $item->title; ?><span class="pull-right"><?php echo $item->sessiontime; ?></span></h3>
		
	</div>
	<? endif; ?>
	
	
	
	
	<?php if ($item->style=="Break") : ?>
	<div class="<?php echo $item->style; ?>">
		<h3>
		<?php if ($item->refreshmentlogo !="") : ?>
			<span><?php echo $item->title; ?></span>
			<span>
				<a href="<?php echo $item->refreshmentlink; ?>">
					<img src="<?php echo $item->refreshmentlogo; ?>" alt="<?php echo $item->refreshmentlink; ?>"/>
				</a>	
			</span>
		<? else: ?>
			<?php echo $item->title; ?>
		<? endif; ?>
		</h3>
	<?php if ($item->subtitle): ?>
		<div class="subtitle"><?php echo $item->subtitle; ?></div>
	<? endif; ?> 	
	</div>
	<div class="clear"></div>
	<? endif; ?>

	
	<?php if ($item->style=="Session") : ?>
	
	<div class="bluebox">
	  <h3 class="<?php echo $item->style; ?>"><?php echo $item->title; ?><span class="pull-right"><?php echo $item->sessiontime; ?></span></h3>
		<?php if ($item->subtitle): ?>
			<div class="subtitle"><?php echo $item->subtitle; ?></div>
		<? endif; ?> 
		
		<?php if ($item->information): ?>
			<div class="information"><?php echo $item->information; ?></div>
		<? endif; ?> 	  


		
		
		<ul class="Speakerlist">
		<?php if ($item->chairman!=""  && $item->chairman!=-1) : ?>
		<?php
		$NotConfirmed = "";
		if (substr($this->speakers[$item->chairman-1]["salutation"], 0, 1)=="*") $NotConfirmed = " * ";
		?>
			<li>
				<h4>CHAIRMAN</h4>
				<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->chairman); ?>">
				<?php if ($item->chairmanisairportspeaker) echo  '<i class="fa fa-plane" style="color: #1978A4;margin-left: -18px;"> </i> '; ?>
				<?php echo '<span style="color:#1978A4;">'.$this->speakers[$item->chairman-1]["name"]." ".$this->speakers[$item->chairman-1]["surname"].",</span> ".
				$this->speakers[$item->chairman-1]["job_title"].", ".
				$this->speakers[$item->chairman-1]["company"]; ?>
				<?php echo $NotConfirmed;?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($item->moderator!="" && $item->moderator!=-1) : ?>
		<?php
		$NotConfirmed = "";
		if (substr($this->speakers[$item->moderator-1]["salutation"], 0, 1)=="*") $NotConfirmed = " * ";
		?>
			<li>
				<h4>MODERATOR</h4>
				<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->moderator); ?>">
				<?php if ($item->moderatorisairportspeaker) echo  '<i class="fa fa-plane" style="color: #1978A4;margin-left: -18px;"> </i> '; ?>
				<?php echo '<span style="color:#1978A4;">'.$this->speakers[$item->moderator-1]["name"]." ".$this->speakers[$item->moderator-1]["surname"].",</span> ".
				$this->speakers[$item->moderator-1]["job_title"].", ".
				$this->speakers[$item->moderator-1]["company"]; ?>
				<?php echo $NotConfirmed;?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($item->moderator2!="" && $item->moderator2!=-1) : ?>
		<?php
		$NotConfirmed = "";
		if (substr($this->speakers[$item->moderator2-1]["salutation"], 0, 1)=="*") $NotConfirmed = " * ";
		?>
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->moderator2); ?>">
				<?php if ($item->moderator2isairportspeaker) echo  '<i class="fa fa-plane" style="color: #1978A4;margin-left: -18px;"> </i> '; ?>
				<?php echo '<span style="color:#1978A4;">'.$this->speakers[$item->moderator2-1]["name"]." ".$this->speakers[$item->moderator2-1]["surname"].",</span> ".
				$this->speakers[$item->moderator2-1]["job_title"].", ".
				$this->speakers[$item->moderator2-1]["company"]; ?>
				<?php echo $NotConfirmed;?>
				</a>
			</li>
		<?php endif; ?>
		<h4>SPEAKERS</h4>		
		<?php if ($item->speaker1!=""  && $item->speaker1!=-1) : ?>
		<?php
		$NotConfirmed = "";
		if (substr($this->speakers[$item->speaker1-1]["salutation"], 0, 1)=="*") $NotConfirmed = " * ";
		?>
			<li>
			<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->speaker1); ?>">
				<?php if ($item->isairportspeaker1) echo  '<i class="fa fa-plane" style="color: #1978A4;margin-left: -18px;"> </i> '; ?>
				<?php echo '<span style="color:#1978A4;">'.$this->speakers[$item->speaker1-1]["name"]." ".$this->speakers[$item->speaker1-1]["surname"].",</span> ".
				$this->speakers[$item->speaker1-1]["job_title"].", ".
				$this->speakers[$item->speaker1-1]["company"]; ?>
				<?php echo $NotConfirmed;?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($item->speaker2!=""  && $item->speaker2!=-1) : ?>
		<?php
		$NotConfirmed = "";
		if (substr($this->speakers[$item->speaker2-1]["salutation"], 0, 1)=="*") $NotConfirmed = " * ";
		?>
			<li>
			<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->speaker2); ?>">
				<?php if ($item->isairportspeaker2) echo  '<i class="fa fa-plane" style="color: #1978A4;margin-left: -18px;"> </i> '; ?>
				<?php echo '<span style="color:#1978A4;">'.$this->speakers[$item->speaker2-1]["name"]." ".$this->speakers[$item->speaker2-1]["surname"].",</span> ".
				$this->speakers[$item->speaker2-1]["job_title"].", ".
				$this->speakers[$item->speaker2-1]["company"]; ?>
				<?php echo $NotConfirmed;?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($item->speaker3!=""  && $item->speaker3!=-1) : ?>
		<?php
		$NotConfirmed = "";
		if (substr($this->speakers[$item->speaker3-1]["salutation"], 0, 1)=="*") $NotConfirmed = " * ";
		?>
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->speaker3); ?>">
				<?php if ($item->isairportspeaker3) echo  '<i class="fa fa-plane" style="color: #1978A4;margin-left: -18px;"> </i> '; ?>
				<?php echo '<span style="color:#1978A4;">'.$this->speakers[$item->speaker3-1]["name"]." ".$this->speakers[$item->speaker3-1]["surname"].",</span> ".
				$this->speakers[$item->speaker3-1]["job_title"].", ".
				$this->speakers[$item->speaker3-1]["company"]; ?>
				<?php echo $NotConfirmed;?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($item->speaker4!=""  && $item->speaker4!=-1) : ?>
		<?php
		$NotConfirmed = "";
		if (substr($this->speakers[$item->speaker4-1]["salutation"], 0, 1)=="*") $NotConfirmed = " * ";
		?>
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->speaker4); ?>">
				<?php if ($item->isairportspeaker4) echo  '<i class="fa fa-plane" style="color: #1978A4;margin-left: -18px;"> </i> '; ?>
				<?php echo '<span style="color:#1978A4;">'.$this->speakers[$item->speaker4-1]["name"]." ".$this->speakers[$item->speaker4-1]["surname"].",</span> ".
				$this->speakers[$item->speaker4-1]["job_title"].", ".
				$this->speakers[$item->speaker4-1]["company"]; ?>
				<?php echo $NotConfirmed;?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($item->speaker5!=""  && $item->speaker5-1!=-1) : ?>
		<?php
		$NotConfirmed = "";
		if (substr($this->speakers[$item->speaker5-1]["salutation"], 0, 1)=="*") $NotConfirmed = " * ";
		?>
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->speaker5); ?>">
				<?php if ($item->isairportspeaker5) echo  '<i class="fa fa-plane" style="color: #1978A4;margin-left: -18px;"> </i> '; ?>
				<?php echo '<span style="color:#1978A4;">'.$this->speakers[$item->speaker5-1]["name"]." ".$this->speakers[$item->speaker5-1]["surname"].",</span> ".
				$this->speakers[$item->speaker5-1]["job_title"].", ".
				$this->speakers[$item->speaker5-1]["company"]; ?>
				<?php echo $NotConfirmed;?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ($item->speaker6!=""  && $item->speaker6!=-1) : ?>
		<?php
		$NotConfirmed = "";
		if (substr($this->speakers[$item->speaker6-1]["salutation"], 0, 1)=="*") $NotConfirmed = " * ";
		?>
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->speaker6); ?>">
				<?php if ($item->isairportspeaker6) echo  '<i class="fa fa-plane" style="color: #1978A4;margin-left: -18px;"> </i> '; ?>
				<?php echo '<span style="color:#1978A4;">'.$this->speakers[$item->speaker6-1]["name"]." ".$this->speakers[$item->speaker6-1]["surname"].",</span> ".
				$this->speakers[$item->speaker6-1]["job_title"].", ".
				$this->speakers[$item->speaker6-1]["company"]; ?>
				<?php echo $NotConfirmed;?>
				</a>
			</li>
		<?php endif; ?>
		
		
		<?php if ($item->speaker7!=""  && $item->speaker7!=-1) : ?>
		<?php
		$NotConfirmed = "";
		if (substr($this->speakers[$item->speaker7-1]["salutation"], 0, 1)=="*") $NotConfirmed = " * ";
		?>
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_speakers&view=speaker&id=' . (int)$item->speaker7); ?>">
				<?php if ($item->isairportspeaker7) echo  '<i class="fa fa-plane" style="color: #1978A4;margin-left: -18px;"> </i> '; ?>
				<?php echo '<span style="color:#1978A4;">'.$this->speakers[$item->speaker7-1]["name"]." ".$this->speakers[$item->speaker7-1]["surname"].",</span> ".
				$this->speakers[$item->speaker7-1]["job_title"].", ".
				$this->speakers[$item->speaker7-1]["company"]; ?>
				<?php echo $NotConfirmed;?>
				</a>
			</li>
		<?php endif; ?>
		
		
		</ul>
	
	</div>
    
    <?php endif; ?>         					

<?php endforeach; ?>
</div>

</div></div>
<p>* Speaker not confirmed</p>
<div class="clear"></div>
<script type="text/javascript">
// carousel mode: Pivot
// some options for the pivot
// the class that will symbolize the active pivot
var activeClass = 'accentColor';
// a placeholder for the active index
var currentIndex = 0;

var start = 0;
// the default direction
var aniDirection = 'forward';
// change the animationDirection based on the index
var toggleDirection = false;
// setup the pivot content using a carousel tile
// im using animationComplete as a primitive queue for speedy clickers

// other tiles
jQuery(".live-tile").not(".exclude").liveTile();

jQuery("h2.item").click(function(){
    var newIndex = jQuery(this).index();
    pivotSelected(newIndex);
});
jQuery("#pivot1").liveTile({
    animationComplete:function(tileData, $front, $back){
        var tmp,newIndex = tileData.currentIndex;
        console.log(newIndex);
        if(newIndex != currentIndex){
            tmp = currentIndex;
            currentIndex = newIndex;
            pivotSelected(tmp);
        }else{
            // do cool stuff with tiles and things!
        }
    }
});
function pivotSelected(newIndex){
    console.log("PivotSelected");
    console.log(currentIndex);
    console.log(newIndex);
    console.log("------");
    if(newIndex == currentIndex){
        return;    
        }
    jQuery("h2." + activeClass).removeClass(activeClass);
    jQuery("h2.item").eq(newIndex).addClass(activeClass);
    if(toggleDirection)
        aniDirection = (newIndex > currentIndex) ? 'forward' : 'backward';
    currentIndex = newIndex;
    jQuery("#pivot1").liveTile("goto", { index: currentIndex, animationDirection: aniDirection });
}
</script>


