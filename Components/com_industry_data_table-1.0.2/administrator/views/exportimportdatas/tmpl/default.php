<?php
/**
 * @version     1.0.0
 * @package     com_industry_data_table
 * @copyright   Copyright Aviation Media (TM) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_industry_data_table/assets/css/industry_data_table.css');

?>
<?php if(!empty($this->sidebar)): ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
<?php endif; ?>
<div class="span10">
	<h1>Import CSV File</h1>
	<form name="import" method="post" enctype="multipart/form-data" 
	action="<?php echo JRoute::_('index.php?option=com_industry_data_table&view=exportimportdatas'); ?>">
		<input type="hidden" name="mode" value="import" >
		<input type="file" name="uploadFile"><input type="submit" name="sub" value="Upload" >
		</form>
		


<?php if (is_null($this->data)):?>
<h2>Upload a file and you will see a preview here</h2>
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
</div>
