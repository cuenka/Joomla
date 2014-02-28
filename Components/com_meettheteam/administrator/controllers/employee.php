<?php
/**
 * @version     1.0.2
 * @package     com_meettheteam
 * @copyright   Aviation Media Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Employee controller class.
 */
class MeettheteamControllerEmployee extends JControllerForm
{

    function __construct() {
        $this->view_list = 'employees';
        parent::__construct();
    }

}