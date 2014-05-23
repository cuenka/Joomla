<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
?>
<?php // The menu class is deprecated. Use nav instead. ?>

<!-- Fixed navbar -->
  <div class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">BRAND</a>
      </div>
      <div class="collapse navbar-collapse menu_style">
        <ul class="nav navbar-nav"> 
 
 <?php
 foreach ($list as $i => &$item) :
 	$cl="";
 	// class
 	$classlink = 'class="menu-'.$item->id.' ';
 	if ($item->id == $active_id) $classlink .= 'active ';
 	//if ($item->parent) echo $item->title.' is parent<br />';
 	if ($item->deeper) $classlink .= 'dropdown ';
 	//if ($item->shallower) echo $item->title.' is shallower<br />';
if (   $item->type == 'alias' &&
      in_array($item->params->get('aliasoptions'),$path)
   ||   in_array($item->id, $path)) $cl = 'selected ';
  
	
	// Menu
	 	if ($item->deeper) {
	  	echo '<li class="dropdown '.$cl.'">
	 	  <a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$item->title.'<b class="caret"></b></a>
	 	  <ul class="dropdown-menu">';
	 	  if ($item->type=="heading"){ echo '<li '.$classlink.'" style="display:none;">';}
	 	   
	 	}else{
			echo '<li '.$classlink.'" >';
		}

	switch ($item->type) :
		case 'separator':
		case 'url':
		case 'component':
		case 'heading':
			require JModuleHelper::getLayoutPath('mod_menu', 'default_'.$item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
			break;
	endswitch;
	if ($item->type!="heading") echo '</li>';
	if ($item->shallower){
	//echo '</li>';
	echo str_repeat('</ul></li>', $item->level_diff);
	}
 endforeach;
?>
		</ul>
		</div>
	</div>
</div>