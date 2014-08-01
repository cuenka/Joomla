<?php
/**
 * @version     1.0.0
 * @package     com_timeline_portfolio
 * @copyright   Copyright (C) 2014. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Jose Cuenca <jose@josecuenca.info> - http://www.josecuenca.info/
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Editarportfolio controller class.
 */
class Timeline_portfolioControllerEditarportfolio extends JControllerForm
{

    function __construct() {
        $this->view_list = 'portfolio';
        parent::__construct();
    }

}