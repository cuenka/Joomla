<?php
/**
 * @version     1.0.0
 * @package     com_allcontacts
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://aviationmedia.aero
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Contact controller class.
 */
class AllcontactsControllerContact extends JControllerForm
{

    function __construct() {
        $this->view_list = 'contacts';
        parent::__construct();
    }

}