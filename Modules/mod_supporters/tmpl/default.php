<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); ?>



<?php foreach ($supporters as $supporter) : ?>
<div class="sponsors-home">
	<a href="<?php echo $supporter->website; ?>" target="_blank" title="<?php echo $supporter->company; ?>" rel="follow">
		<img alt="<?php echo $supporter->company; ?>" src="<?php echo JURI::root() .$supporter->logo; ?>" style="width: 110px;height: 80px;">
	</a>
</div>
<?php endforeach; ?>
<div class="sponsors-home"><a href="/China/sponsorship-opportunities" target="_self" title="Click" here="" to="" become="" a="" sponsor="" rel="follow"><img alt="CLICK-TO-SPONSOR" src="/China/images/logos/CLICK-TO-SPONSOR.gif" width="110" height="80" 110px="" height:="" 80px=""></a></div>

