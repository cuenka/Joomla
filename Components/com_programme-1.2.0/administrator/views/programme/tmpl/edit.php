<?php
/**
 * @version     1.2.0
 * @package     com_programme
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_programme/assets/css/metro_programme.css');
?>
<script type="text/javascript">
    js = jQuery.noConflict();
    js(document).ready(function() {
        
	js('input:hidden.chairman').each(function(){
		var name = js(this).attr('name');
		if(name.indexOf('chairmanhidden')){
			js('#jform_chairman option[value="'+js(this).val()+'"]').attr('selected',true);
		}
	});
	js("#jform_chairman").trigger("liszt:updated");
	js('input:hidden.moderator').each(function(){
		var name = js(this).attr('name');
		if(name.indexOf('moderatorhidden')){
			js('#jform_moderator option[value="'+js(this).val()+'"]').attr('selected',true);
		}
	});
	js("#jform_moderator").trigger("liszt:updated");
	js('input:hidden.speaker1').each(function(){
		var name = js(this).attr('name');
		if(name.indexOf('speaker1hidden')){
			js('#jform_speaker1 option[value="'+js(this).val()+'"]').attr('selected',true);
		}
	});
	js("#jform_speaker1").trigger("liszt:updated");
	js('input:hidden.speaker2').each(function(){
		var name = js(this).attr('name');
		if(name.indexOf('speaker2hidden')){
			js('#jform_speaker2 option[value="'+js(this).val()+'"]').attr('selected',true);
		}
	});
	js("#jform_speaker2").trigger("liszt:updated");
	js('input:hidden.speaker3').each(function(){
		var name = js(this).attr('name');
		if(name.indexOf('speaker3hidden')){
			js('#jform_speaker3 option[value="'+js(this).val()+'"]').attr('selected',true);
		}
	});
	js("#jform_speaker3").trigger("liszt:updated");
	js('input:hidden.speaker4').each(function(){
		var name = js(this).attr('name');
		if(name.indexOf('speaker4hidden')){
			js('#jform_speaker4 option[value="'+js(this).val()+'"]').attr('selected',true);
		}
	});
	js("#jform_speaker4").trigger("liszt:updated");
	js('input:hidden.speaker5').each(function(){
		var name = js(this).attr('name');
		if(name.indexOf('speaker5hidden')){
			js('#jform_speaker5 option[value="'+js(this).val()+'"]').attr('selected',true);
		}
	});
	js("#jform_speaker5").trigger("liszt:updated");
	js('input:hidden.speaker6').each(function(){
		var name = js(this).attr('name');
		if(name.indexOf('speaker6hidden')){
			js('#jform_speaker6 option[value="'+js(this).val()+'"]').attr('selected',true);
		}
	});
	js("#jform_speaker6").trigger("liszt:updated");
    });

    Joomla.submitbutton = function(task)
    {
        if (task == 'programme.cancel') {
            Joomla.submitform(task, document.getElementById('programme-form'));
        }
        else {
            
            if (task != 'programme.cancel' && document.formvalidator.isValid(document.id('programme-form'))) {
                
                Joomla.submitform(task, document.getElementById('programme-form'));
            }
            else {
                alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
            }
        }
    }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_programme&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="programme-form" class="form-validate">
<div class="control-group">
	<div style="float: left;padding-right: 10px;"><?php echo $this->form->getLabel('title'); ?></div>
	 <?php echo $this->form->getInput('title'); ?>
</div>





<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>

<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_PROGRAMME_TITLE_GENERAL')); ?>
 	<div class="row-fluid">
    	<div class="span6 form-horizontal">
        	<fieldset class="adminform">
	   			<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('id'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('id'); ?></div>
				</div>
				<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
				<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
				<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
				<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />

				<?php if(empty($this->item->created_by)){ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo JFactory::getUser()->id; ?>" />

				<?php } 
				else{ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />

				<?php } ?>

			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('style'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('style'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('day'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('day'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('sessiontime'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('sessiontime'); ?></div>
			</div>			
			</fieldset>
			</div>
</div>

<?php echo JHtml::_('bootstrap.endTab'); ?>




  		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'information', JText::_('COM_PROGRAMME_TITLE_INFORMATION')); ?>      
        
        <div class="span6 form-horizontal">
            <fieldset class="adminform">
		        <div class="control-group">
		        	<div class="control-label"><?php echo $this->form->getLabel('subtitle'); ?></div>
		        	<div class="controls"><?php echo $this->form->getInput('subtitle'); ?></div>
		        </div>
            </fieldset>
        </div> 
        <div class="span6 form-horizontal">
            <fieldset class="adminform">
		        <div class="control-group">
		        	<div class="control-label"><?php echo $this->form->getLabel('information'); ?></div>
		        	<div class="controls"><?php echo $this->form->getInput('information'); ?></div>
		        </div>
            </fieldset>
        </div> 

		<?php echo JHtml::_('bootstrap.endTab'); ?>






<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'speakers', JText::_('COM_PROGRAMME_TITLE_SPEAKERS')); ?>
			<div class="span6 form-horizontal">
			    <fieldset class="adminform">
					<div class="control-group">
				    <div class="control-label"><?php echo $this->form->getLabel('chairman'); ?></div>
			    	<div class="controls"><?php echo $this->form->getInput('chairman'); ?></div>
			   
			    <?php
			    foreach((array)$this->item->chairman as $value): 
			    	if(!is_array($value)):
			    		echo '<input type="hidden" class="chairman" name="jform[chairmanhidden]['.$value.']" value="'.$value.'" />';
			    	endif;
			    endforeach;
			    ?>
			    </div>
			    <div class="control-group">
			    	<div class="control-label"><?php echo $this->form->getLabel('chairmanisairportspeaker'); ?></div>
			    	<div class="controls"><?php echo $this->form->getInput('chairmanisairportspeaker'); ?></div>
			    </div>
			    <div class="control-group">
			    	<div class="control-label"><?php echo $this->form->getLabel('moderator'); ?></div>
			    	<div class="controls"><?php echo $this->form->getInput('moderator'); ?></div>
			    </div>
			    <?php
			    foreach((array)$this->item->moderator as $value): 
			    	if(!is_array($value)):
			    		echo '<input type="hidden" class="moderator" name="jform[moderatorhidden]['.$value.']" value="'.$value.'" />';
			    	endif;
			    endforeach;
			    ?>
			    <div class="control-group">
			    	<div class="control-label"><?php echo $this->form->getLabel('moderatorisairportspeaker'); ?></div>
			    	<div class="controls"><?php echo $this->form->getInput('moderatorisairportspeaker'); ?></div>
			    </div>
			    <div class="control-group">
			    	<div class="control-label"><?php echo $this->form->getLabel('speaker1'); ?></div>
			    	<div class="controls"><?php echo $this->form->getInput('speaker1'); ?></div>
			    </div>
			    <?php
			    	foreach((array)$this->item->speaker1 as $value): 
			    	if(!is_array($value)):
			    		echo '<input type="hidden" class="speaker1" name="jform[speaker1hidden]['.$value.']" value="'.$value.'" />';
			    	endif;
			    	endforeach;
			    	?>
			    	
			    	<div class="control-group">
			    		<div class="control-label"><?php echo $this->form->getLabel('isairportspeaker1'); ?></div>
			    		<div class="controls"><?php echo $this->form->getInput('isairportspeaker1'); ?></div>
			    	</div>
			    	<div class="control-group">
			    		<div class="control-label"><?php echo $this->form->getLabel('speaker2'); ?></div>
			    		<div class="controls"><?php echo $this->form->getInput('speaker2'); ?></div>
			    	</div>
			    	<?php
			    	foreach((array)$this->item->speaker2 as $value): 
			    		if(!is_array($value)):
			    			echo '<input type="hidden" class="speaker2" name="jform[speaker2hidden]['.$value.']" value="'.$value.'" />';
			    		endif;
			    	endforeach;
			    	?>
			    	<div class="control-group">
			    		<div class="control-label"><?php echo $this->form->getLabel('isairportspeaker2'); ?></div>
			    		<div class="controls"><?php echo $this->form->getInput('isairportspeaker2'); ?></div>
			    	</div>
			    	<div class="control-group">
			    		<div class="control-label"><?php echo $this->form->getLabel('speaker3'); ?></div>
			    		<div class="controls"><?php echo $this->form->getInput('speaker3'); ?></div>
			    	</div>
			    	<?php
			    	foreach((array)$this->item->speaker3 as $value): 
			    	if(!is_array($value)):
			    		echo '<input type="hidden" class="speaker3" name="jform[speaker3hidden]['.$value.']" value="'.$value.'" />';
			    	endif;
			    	endforeach;
			    	?>
			    	<div class="control-group">
			    		<div class="control-label"><?php echo $this->form->getLabel('isairportspeaker3'); ?></div>
			    		<div class="controls"><?php echo $this->form->getInput('isairportspeaker3'); ?></div>
			    	</div>
			    	<div class="control-group">
			    		<div class="control-label"><?php echo $this->form->getLabel('speaker4'); ?></div>
			    		<div class="controls"><?php echo $this->form->getInput('speaker4'); ?></div>
			    	</div>
			    	<?php
			    	foreach((array)$this->item->speaker4 as $value): 
			    		if(!is_array($value)):
			    			echo '<input type="hidden" class="speaker4" name="jform[speaker4hidden]['.$value.']" value="'.$value.'" />';
			    		endif;
			    	endforeach;
			    	?>
			    	<div class="control-group">
			    		<div class="control-label"><?php echo $this->form->getLabel('isairportspeaker4'); ?></div>
			    		<div class="controls"><?php echo $this->form->getInput('isairportspeaker4'); ?></div>
			    	</div>
			    	<div class="control-group">
			    		<div class="control-label"><?php echo $this->form->getLabel('speaker5'); ?></div>
			    		<div class="controls"><?php echo $this->form->getInput('speaker5'); ?></div>
			    	</div>
			    	<?php
			    	foreach((array)$this->item->speaker5 as $value): 
			    		if(!is_array($value)):
			    			echo '<input type="hidden" class="speaker5" name="jform[speaker5hidden]['.$value.']" value="'.$value.'" />';
			    		endif;
			    	endforeach;
			    	?>
			    	<div class="control-group">
			    		<div class="control-label"><?php echo $this->form->getLabel('isairportspeaker5'); ?></div>
			    		<div class="controls"><?php echo $this->form->getInput('isairportspeaker5'); ?></div>
			    	</div>
			    	<div class="control-group">
			    		<div class="control-label"><?php echo $this->form->getLabel('speaker6'); ?></div>
			    		<div class="controls"><?php echo $this->form->getInput('speaker6'); ?></div>
			    	</div>
			    	<?php
			    	foreach((array)$this->item->speaker6 as $value): 
			    		if(!is_array($value)):
			    			echo '<input type="hidden" class="speaker6" name="jform[speaker6hidden]['.$value.']" value="'.$value.'" />';
			    		endif;
			    	endforeach;
			    	?>
			    	<div class="control-group">
			    		<div class="control-label"><?php echo $this->form->getLabel('isairportspeaker6'); ?></div>
			    		<div class="controls"><?php echo $this->form->getInput('isairportspeaker6'); ?></div>
			    	</div>
			    
			    </fieldset>
            </div>
        <?php echo JHtml::_('bootstrap.endTab'); ?>
        
        
        
        
        





<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'break', JText::_('COM_PROGRAMME_TITLE_BREAK')); ?>
 	<div class="row-fluid">
    	<div class="span6 form-horizontal">
    	  	<fieldset class="adminform">
			<div class="control-group">
			<div class="control-label"><?php echo $this->form->getLabel('refreshmentlogo'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('refreshmentlogo'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('refreshmentlink'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('refreshmentlink'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('refreshmentname'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('refreshmentname'); ?></div>
			</div>
			
			</fieldset>
			</div>
</div>

<?php echo JHtml::_('bootstrap.endTab'); ?>








		<?php echo JHtml::_('bootstrap.endTabSet'); ?>




        <input type="hidden" name="task" value="" />
 
        <?php echo JHtml::_('form.token'); ?>

    </div>
</form>
<script type="text/javascript"></script>