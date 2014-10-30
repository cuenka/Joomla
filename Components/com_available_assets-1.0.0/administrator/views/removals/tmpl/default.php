<?php
/**
 * @version     1.0.0
 * @package     com_available_assets
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.afm.aero
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_available_assets/assets/css/available_assets.css');

$user	= JFactory::getUser();
$userId	= $user->get('id');
$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
$canOrder	= $user->authorise('core.edit.state', 'com_available_assets');
$saveOrder	= $listOrder == 'a.ordering';
if ($saveOrder)
{
	$saveOrderingUrl = 'index.php?option=com_available_assets&task=aircraftlist.saveOrderAjax&tmpl=component';
	JHtml::_('sortablelist.sortable', 'aircraftformList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
}
$sortFields = $this->getSortFields();
?>
<script type="text/javascript">
	Joomla.orderTable = function() {
		table = document.getElementById("sortTable");
		direction = document.getElementById("directionTable");
		order = table.options[table.selectedIndex].value;
		if (order != '<?php echo $listOrder; ?>') {
			dirn = 'asc';
		} else {
			dirn = direction.options[direction.selectedIndex].value;
		}
		Joomla.tableOrdering(order, dirn, '');
	}
</script>

<?php
//Joomla Component Creator code to allow adding non select list filters
if (!empty($this->extra_sidebar)) {
    $this->sidebar .= $this->extra_sidebar;
}
?>

<form action="<?php echo JRoute::_('index.php?option=com_available_assets&view=removals'); ?>" method="post" name="adminForm" id="adminForm">
<?php if(!empty($this->sidebar)): ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
<?php else : ?>
	<div id="j-main-container">
<?php endif;?>
 <h1>Remove exiting aircraft manually</h1>
 		<input type="hidden" name="mode" value="import" >
 	
 	
 <?php if (is_null($this->data)):?>
 Source: <input type="text" name="source" value="myairlease"><br>
 <?php 
 $jinput = JFactory::getApplication()->input;
 $ReadytoImport = $jinput->get('task', null, 'ALNUM'); 
 if ($ReadytoImport=='import') echo '<div class="alert alert-success">Well done! You successfully import the data.</div>'; 
 ?>
 <?php else: ?>
 <div class="alert">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <strong>Warning!</strong> Just double check! the content below will be added into the DB. what do you want to do?
 </div>
 <button><a href="index.php?option=com_industry_data_table&view=exportimportdatas&task=import">IMPORT THIS CONTENT</a></button>
 
 <?php if (count($this->data)!=1):?>
 <?php $header = array_keys($this->data[0]);?>
 <table class="table table-striped">
               <thead>
                 <tr>
                   <?php for ($i = 0; $i < count($header); $i++) {
                   	echo "<th>$header[$i]</th>";
                   }?>
                  </tr>
               </thead>
               <tbody>
                 <tr>
 				
 				  <?php for ($i = 1; $i <  count($this->data); $i++){
 				  echo"<tr>";
 				  for ($j = 0; $j < count($header); $j++){
 				 	echo"<td>".$this->data[$i][$header[$j]]."</td>";
 				  	}
 				  	 echo"</tr>";	
 				  	}
 				  
 				  	  ?>		
                 </tr>
               </tbody>
             </table>
 <?php else : ?>
 <?php echo "<h2>".$this->data."</h2>"; ?>
 <?php endif;?>
 <?php endif;?>
 		<input type="hidden" name="task" value="" />
 		<input type="hidden" name="boxchecked" value="0" />
 		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
 		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
 		<?php echo JHtml::_('form.token'); ?>
 	</div>
 </form> 
 