<?php
/**
 * @version     1.0.0
 * @package     com_timeline_portfolio
 * @copyright   Copyright (C) 2014. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Jose Cuenca <jose@josecuenca.info> - http://www.josecuenca.info/
 */
// no direct access
defined('_JEXEC') or die;


?>
<div class="panel panel-default">
	<h1>
    	<i class="fa fa-clock-o fa-fw"></i><?php echo $this->title; ?>
    </h1>
    <hr />
    <div class="timeline-badge" style="text-align: center;margin-bottom: -15px;font-size: 20px;font-weight: bold;">NOW
        </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <ul class="timeline">
        <?php $previousdate = date("Y-m-d");
        $numItems = count($this->items);
        $i = 0;
        ?>
        <?php foreach ($this->items as $i => $item) : ?>
        	<?php
        	$datetime1 = new DateTime($item->date);
        	$datetime2 = new DateTime($previousdate);			          
        	$interval = $datetime1->diff($datetime2);
        	
        	?>
			<li <?php if(($i % 2)==0) echo 'class="timeline-inverted"'; ?> 
			style="margin-bottom: <?php 
			//Check last element
			if(++$i != $numItems) echo $interval->format('%R%a')- 180;			
			?>px;">
			<div class="timeline-badge <?php echo str_replace("fa-", " ", $item->type); ?>"><i class="fa <?php echo str_replace(",", " ", $item->type); ?>"></i>
			    </div>
			    <div class="timeline-panel">
			        <div class="timeline-heading">
			            <h4 class="timeline-title"><?php echo $this->escape($item->project); ?></h4>
			            <p><small class="text-muted"><i class="fa fa-clock-o"></i> <?php echo $item->date; ?></small> 
			            
			            </p>
			        </div>
			        <div class="timeline-body">
			            <div  <?php if(($i % 2)==0) echo 'class="pull-right col-md-4"'; 
			            else ; echo 'class="pull-left col-md-4"'; ?>  style="padding: 0;"><img src="<?php echo JURI::root().$item->image; ?>" 
			            alt="<?php echo $this->escape($item->project); ?>" style="max-width: 220px;" /></div>
			            <div
			            <?php if(($i % 2)==0) echo 'class="col-md-8"'; 
			            else ; echo 'class="col-md-8"'; ?>
			            style="padding: 0;"
			            ><p><?php echo $item->information; ?></p>
			            <p><a href="<?php echo $item->website; ?>" target="_blank">Website</a>
			            </p>
			            </div>
			        </div>
			    </div>
			</li>
			<?php $previousdate = $item->date; ?>
	 <?php endforeach; ?>
       
