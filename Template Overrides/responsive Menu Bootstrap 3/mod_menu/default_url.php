<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_menu
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
$class = $item->anchor_css ? 'class="'.$item->anchor_css.'" ' : '';
$title = $item->anchor_title ? 'title="'.$item->anchor_title.'" ' : '';
$scroll="";


$arraytitle = explode("||",$item->title);
if(count($arraytitle)>1){
	$item->title=$arraytitle[1];
	switch($arraytitle[0]){
		case "**":
			$linktype="<strong>".$arraytitle[1]."</strong>";
			break;
		case "scroll":
			$linktype= $arraytitle[1];
			$scroll = 'class="scroll"';
			break;
		default:
			$linktype="<span class=\"title\">".$arraytitle[0]."</span><span class=\"subtitle\">".$arraytitle[1]."</span>";
			break;
	}
}
else $linktype = $item->title;

if ($item->menu_image) {
	$item->params->get('menu_text', 1 ) ?
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" /><span class="image-title">'.$item->title.'</span> ' :
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" />';
}


$flink = $item->flink;
$flink = JFilterOutput::ampReplace(htmlspecialchars($flink));

switch ($item->browserNav) :
	default:
	case 0:
		?><a <?php echo $class; ?>href="<?php echo $flink; ?>" <?php echo $title; ?> <?php echo $scroll; ?>><span><?php echo $linktype; ?></span></a><?php
		break;
	case 1:
		// _blank
		?><a <?php echo $class; ?>href="<?php echo $flink; ?>" target="_blank" <?php echo $title; ?> <?php echo $scroll; ?>><?php echo $linktype; ?></a><?php
		break;
	case 2:
		// window.open
		$options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,'.$params->get('window_open');
		?><a <?php echo $class; ?>href="<?php echo $flink; ?>" onclick="window.open(this.href,'targetWindow','<?php echo $options;?>');return false;" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
		break;
endswitch;
