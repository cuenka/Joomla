<?php
/**
 * @version     1.0.0
 * @package     com_available_assets
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.afm.aero
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Aircraftform controller class.
 */
class Available_assetsControllerAircraftform extends JControllerForm
{

    function __construct() {
        $this->view_list = 'aircraftlist';
        parent::__construct();
    }

}