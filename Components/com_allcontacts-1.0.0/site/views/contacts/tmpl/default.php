<?php
/**
 * @version     1.0.0
 * @package     com_allcontacts
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://aviationmedia.aero
 */
// no direct access
defined('_JEXEC') or die;
?><h1 class="itemTitle">Contact us</h1>
<?php $department = ""; ?>

<?php foreach ($this->items as $i => $item) : ?>
	<?php if ($item->departament!=$department) : ?>
     <h2 class="departament" ><?php echo $item->departament; ?></h2>
    <?php $department=$item->departament; ?>
    <?php endif; ?> 
     <?php if ($item->photo):  ?>
	     <div style="width:29%;margin-right:1%;float: left;">
	     	<img src="/<?php echo $item->photo; ?>" alt="" />
	     </div>
	     <div style="width:69%;margin-left:1%;float: left; color: #3d150e;">
     <?php else : ?>
     	<div style="width:100%;color: #3d150e;">
     <?php endif; ?>

     	<h3><i class="fa fa-user"></i> : <?php echo $this->escape($item->name); ?>
     	<?php if ($item->jobtitle!="") : ?>
	    <br />
	     	<span style="margin-left: 28px;"><?php echo $item->jobtitle; ?></span>
     	<?php endif; ?>
     	</h3>
     	
     	<?php if ($item->phone!="") : ?>
     		<p><i class="fa fa-phone"></i> : <?php echo $item->phone; ?></p>
     	<?php endif; ?>
     	<?php if ($item->email!="") : ?>
     		<p class="mailstyle"><i class="fa fa-envelope-o"></i> : <?php echo JHtml::_('email.cloak', $item->email); ?></p>
     	<?php endif; ?>
     </div>
      <div class="clr"></div>
      <hr class="long"/>
    <?php endforeach; ?>
