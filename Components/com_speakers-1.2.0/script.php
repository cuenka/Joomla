<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * Script file of HelloWorld component
 */
class com_speakersInstallerScript
{
        /**
         * method to install the component
         *
         * @return void
         */
        function install($parent) 
        {
                // $parent is the class calling this method
                $parent->getParent()->setRedirectURL('index.php?option=com_speakers');
                $path=JPATH_SITE."/images/speakers";
                echo $path;
               /* if(!(JFolder::exists($path)){
                	JFolder::create($path, $mode);
                }*/
                
                
        }
 
        /**
         * method to uninstall the component
         *
         * @return void
         */
        function uninstall($parent) 
        {
                // $parent is the class calling this method
                echo '<p>' . JText::_('com_speakers_UNINSTALL_TEXT') . '</p>';
        }
 
        /**
         * method to update the component
         *
         * @return void
         */
        function update($parent) 
        {
                // $parent is the class calling this method
                echo '<p>' . JText::sprintf('com_speakers_UPDATE_TEXT', $parent->get('manifest')->version) . '</p>';
        }
 
        /**
         * method to run before an install/update/uninstall method
         *
         * @return void
         */
        function preflight($type, $parent) 
        {
        		$path=JPATH_SITE."/images/speakers";
                echo $path;
               if(!(JFolder::exists($path))){
                	echo "speakers folder doesn't exists<br />";
                	JFolder::create($path);
                	echo "speakers folder created!<br />";
                }
                
                
                // $parent is the class calling this method
                // $type is the type of change (install, update or discover_install)
                echo '<p>' . JText::_('com_speakers_PREFLIGHT_' . $type . '_TEXT') . '</p>';
        }
 
        /**
         * method to run after an install/update/uninstall method
         *
         * @return void
         */
        function postflight($type, $parent) 
        {
                // $parent is the class calling this method
                // $type is the type of change (install, update or discover_install)
                echo '<p>' . JText::_('com_speakers_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
        }
}