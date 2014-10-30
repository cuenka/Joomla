<?php
// No direct access to this file
defined('_JEXEC') or die;
 
/**
 * Script file of HelloWorld module
 */
class mod_jcmultiplebackgroundsInstallerScript
{
        /**
         * Method to install the extension
         * $parent is the class calling this method
         *
         * @return void
         */
        function install($parent) 
        {
                echo '<p>The module has been installed</p>';
        }
 
        /**
         * Method to uninstall the extension
         * $parent is the class calling this method
         *
         * @return void
         */
        function uninstall($parent) 
        {
                echo '<p>The module has been uninstalled</p>';
        }
 
        /**
         * Method to update the extension
         * $parent is the class calling this method
         *
         * @return void
         */
        function update($parent) 
        {
                echo '<p>The module has been updated to version ' . $parent->get('manifest')->version . '</p>';
        }
 
        /**
         * Method to run before an install/update/uninstall method
         * $parent is the class calling this method
         * $type is the type of change (install, update or discover_install)
         *
         * @return void
         */
        function preflight($type, $parent) 
        {
                echo '<p>Installing module</p>';
                $path=JPATH_SITE."/images/background";
                echo "Checking if folder exist in the following path >> ".$path."<br />";
              	 if(!(JFolder::exists($path))){
                	echo "background folder doesn't exists<br />";
                	JFolder::create($path);
                	echo "background folder created!<br />";
                 }else{
                	echo "background folder exist!<br />";
                 } 
        }
 
        /**
         * Method to run after an install/update/uninstall method
         * $parent is the class calling this method
         * $type is the type of change (install, update or discover_install)
         *
         * @return void
         */
        function postflight($type, $parent) 
        {
                echo '<p>Module installed succesfully</p>';
        }
}

