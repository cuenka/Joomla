<?php
/**
 * @version     1.2.0
 * @package     com_programme
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Programme controller class.
 */
class ProgrammeControllerProgramme extends JControllerForm
{

    function __construct() {
        $this->view_list = 'programmes';
        parent::__construct();
    }

}