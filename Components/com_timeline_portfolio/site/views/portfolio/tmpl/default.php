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
<style>

.css3{
	background-color: orange !important;
}
.joomla{
	background-color: blue !important;
}
.file-code-o{
	background-color: black !important;
}
.timeline {
    position: relative;
    padding: 20px 0 20px;
    list-style: none;
}

.timeline:before {
    content: " ";
    position: absolute;
    top: 0;
    bottom: 0;
    left: 50%;
    width: 3px;
    margin-left: -1.5px;
    background-color: #eeeeee;
}

.timeline > li {
    position: relative;
    margin-bottom: 20px;
}

.timeline > li:before,
.timeline > li:after {
    content: " ";
    display: table;
}

.timeline > li:after {
    clear: both;
}

.timeline > li:before,
.timeline > li:after {
    content: " ";
    display: table;
}

.timeline > li:after {
    clear: both;
}

.timeline > li > .timeline-panel {
    float: left;
    position: relative;
    width: 46%;
    padding: 20px;
    border: 1px solid #d4d4d4;
    border-radius: 2px;
    -webkit-box-shadow: 0 1px 6px rgba(0,0,0,0.175);
    box-shadow: 0 1px 6px rgba(0,0,0,0.175);
}

.timeline > li > .timeline-panel:before {
    content: " ";
    display: inline-block;
    position: absolute;
    top: 26px;
    right: -15px;
    border-top: 15px solid transparent;
    border-right: 0 solid #ccc;
    border-bottom: 15px solid transparent;
    border-left: 15px solid #ccc;
}

.timeline > li > .timeline-panel:after {
    content: " ";
    display: inline-block;
    position: absolute;
    top: 27px;
    right: -14px;
    border-top: 14px solid transparent;
    border-right: 0 solid #fff;
    border-bottom: 14px solid transparent;
    border-left: 14px solid #fff;
}

.timeline > li > .timeline-badge {
    z-index: 100;
    position: absolute;
    top: 16px;
    left: 50%;
    width: 50px;
    height: 50px;
    margin-left: -25px;
    border-radius: 50% 50% 50% 50%;
    text-align: center;
    font-size: 1.4em;
    line-height: 50px;
    color: #fff;
    background-color: #999999;
}

.timeline > li.timeline-inverted > .timeline-panel {
    float: right;
}

.timeline > li.timeline-inverted > .timeline-panel:before {
    right: auto;
    left: -15px;
    border-right-width: 15px;
    border-left-width: 0;
}

.timeline > li.timeline-inverted > .timeline-panel:after {
    right: auto;
    left: -14px;
    border-right-width: 14px;
    border-left-width: 0;
}

.timeline-badge.primary {
    background-color: #2e6da4 !important;
}

.timeline-badge.success {
    background-color: #3f903f !important;
}

.timeline-badge.warning {
    background-color: #f0ad4e !important;
}

.timeline-badge.danger {
    background-color: #d9534f !important;
}

.timeline-badge.info {
    background-color: #5bc0de !important;
}

.timeline-title {
    margin-top: 0;
    color: inherit;
}

.timeline-body > p,
.timeline-body > ul {
    margin-bottom: 0;
}

.timeline-body > p + p {
    margin-top: 5px;
}

@media(max-width:767px) {
    ul.timeline:before {
        left: 40px;
    }

    ul.timeline > li > .timeline-panel {
        width: calc(100% - 90px);
        width: -moz-calc(100% - 90px);
        width: -webkit-calc(100% - 90px);
    }

    ul.timeline > li > .timeline-badge {
        top: 16px;
        left: 15px;
        margin-left: 0;
    }

    ul.timeline > li > .timeline-panel {
        float: right;
    }

    ul.timeline > li > .timeline-panel:before {
        right: auto;
        left: -15px;
        border-right-width: 15px;
        border-left-width: 0;
    }

    ul.timeline > li > .timeline-panel:after {
        right: auto;
        left: -14px;
        border-right-width: 14px;
        border-left-width: 0;
    }
}
</style>
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
        <?php foreach ($this->items as $i => $item) : ?>
        	
			<li <?php if(($i % 2)==0) echo 'class="timeline-inverted"'; ?>>
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
			
	 <?php endforeach; ?>
       
