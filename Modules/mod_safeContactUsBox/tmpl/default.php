<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<?php foreach ($Contacts as $Contact): ?>
	<?php if (($Contact->name!=NULL)): ?>
		<div id="" style="border-bottom: 1px solid #feb715;">
				<h4><?php echo $Contact->position; ?></h4>
				<h4><?php echo $Contact->name; ?></h4>
				<p><?php echo JHtml::_('email.cloak', $Contact->email); ?><br />
				<?php echo $Contact->phone; ?></p>
		</div>
	<?php endif; ?>	
<?php endforeach; ?>	
