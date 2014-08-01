<?php

/**
 * @version     1.0.0
 * @package     com_timeline_portfolio
 * @copyright   Copyright (C) 2014. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Jose Cuenca <jose@josecuenca.info> - http://www.josecuenca.info/
 */
defined('_JEXEC') or die;

class Timeline_portfolioFrontendHelper {
    
    public function SetScripts() {
    	$doc = JFactory::getDocument();
    	$doc->addStyleSheet(JURI::base( true ).'/media/com_timeline_portfolio/css/portfolio.css');
    }
}
