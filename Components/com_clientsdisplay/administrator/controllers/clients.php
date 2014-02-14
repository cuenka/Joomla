<?php
/**
 * @version     1.1.1
 * @package     com_clientsdisplay
 * @copyright   Aviation Media (TM)Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Clients controller class.
 */
class ClientsdisplayControllerClients extends JControllerForm
{

    function __construct() {
        $this->view_list = 'clientss';
        parent::__construct();
    }

}