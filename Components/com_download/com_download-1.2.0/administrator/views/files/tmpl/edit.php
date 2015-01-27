<?php
/**
 * @version     1.2.0
 * @package     com_download
 * @copyright   Aviation Media (TM) Copyright (C) 2014. All rights reserved.
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
$document->addStyleSheet('components/com_download/assets/css/download.css');
?>
<script type="text/javascript">
    js = jQuery.noConflict();
    js(document).ready(function() {
        
	js('input:hidden.whatbanner').each(function(){
		var name = js(this).attr('name');
		if(name.indexOf('whatbannerhidden')){
			js('#jform_whatbanner option[value="'+js(this).val()+'"]').attr('selected',true);
		}
	});
	js("#jform_whatbanner").trigger("liszt:updated");
    });

    Joomla.submitbutton = function(task)
    {
        if (task == 'files.cancel') {
            Joomla.submitform(task, document.getElementById('files-form'));
        }
        else {
            
				js = jQuery.noConflict();
				if(js('#jform_file').val() != ''){
					js('#jform_file_hidden').val(js('#jform_file').val());
				}
            if (task != 'files.cancel' && document.formvalidator.isValid(document.id('files-form'))) {
                
                Joomla.submitform(task, document.getElementById('files-form'));
            }
            else {
                alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
            }
        }
    }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_download&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="files-form" class="form-validate">

    <div class="form-horizontal">
        <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>

        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_DOWNLOAD_TITLE_FILES', true)); ?>
        <div class="row-fluid">
            <div class="span10 form-horizontal">
                <fieldset class="adminform">

                    			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('id'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('id'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('state'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('state'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('created_by'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('created_by'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('name'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('name'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('category'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('category'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('banner'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('banner'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('file'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('file'); ?></div>
			</div>

				<?php if (!empty($this->item->file)) : ?>
						<a href="<?php echo JRoute::_(JUri::base() . 'components' . DIRECTORY_SEPARATOR . 'com_download' . DIRECTORY_SEPARATOR . 'images/Downloads' .DIRECTORY_SEPARATOR . $this->item->file, false);?>">[View File]</a>
				<?php endif; ?>
				<input type="hidden" name="jform[file]" id="jform_file_hidden" value="<?php echo $this->item->file ?>" />			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('whatbanner'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('whatbanner'); ?></div>
			</div>

			<?php
				foreach((array)$this->item->whatbanner as $value): 
					if(!is_array($value)):
						echo '<input type="hidden" class="whatbanner" name="jform[whatbannerhidden]['.$value.']" value="'.$value.'" />';
					endif;
				endforeach;
			?>			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('url'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('url'); ?></div>
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