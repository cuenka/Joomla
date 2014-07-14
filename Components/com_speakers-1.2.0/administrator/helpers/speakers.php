<?php

/**
 * @version     1.2.0
 * @package     com_speakers
 * @copyright   Jose Cuenca - 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Speakers helper.
 */
class SpeakersBackendHelper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '') {
        		JHtmlSidebar::addEntry(
			JText::_('COM_SPEAKERS_TITLE_SPEAKERS'),
			'index.php?option=com_speakers&view=speakers',
			$vName == 'speakers'
		);

    }

    /**
     * Gets a list of the actions that can be performed.
     *
     * @return	JObject
     * @since	1.6
     */
    public static function getActions() {
        $user = JFactory::getUser();
        $result = new JObject;

        $assetName = 'com_speakers';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }
	
		public static function ResizeImage($Img, $w)
		{

		$filename= $_SERVER["DOCUMENT_ROOT"].JURI::root( true )."/".$Img ;
		$images = $filename;
		
		$new_images = $_SERVER["DOCUMENT_ROOT"].JURI::root( true )."/thumb/".$Img ;
		
		//copy("/images/thumb/"$_FILES,"Photos/".$_FILES["userfile"]["name"]);
		$width=$w; //*** Fix Width & Heigh (Autu caculate) ***//
		$size=GetimageSize($images);
		$height=round($width*$size[1]/$size[0]);

		if ($size[0]=="250") return "The logo has the right width. Doesn't make sense resize it! Good job!";
		$images_orig = ImageCreateFromJPEG($images);
		$photoX = ImagesX($images_orig);
		$photoY = ImagesY($images_orig);
		$images_fin = ImageCreateTrueColor($width, $height);
		$result = ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
		ImageJPEG($images_fin,$filename);
		ImageDestroy($images_orig);
		ImageDestroy($images_fin);
		if ($result) return "Logo resized to ".$width."px by ".$height."px";
		else return "mmm It looks like something unexpected just happened, ask Jose!";
	
		}

}
