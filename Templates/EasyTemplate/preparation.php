<?php defined('_JEXEC') or die;

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$params = $app->getParams();
$headdata = $doc->getHeadData();
$menu = $app->getMenu();
$active = $app->getMenu()->getActive();
$pageclass = $params->get('pageclass_sfx');
$tpath = $this->baseurl.'/templates/'.$this->template;
$jinput = $app->input;

// Get URL parameters
$itemId = (int) $jinput->get('Itemid', 0);
$option = $jinput->get('option', '');
// parameter
$modernizr = $this->params->get('modernizr');
$css = $this->params->get('css');
$bootstrap = $this->params->get('bootstrap');
$fontawesome = $this->params->get('fontawesome');
$jquery = $this->params->get('jquery');
$googlefont = $this->params->get('googlefont');
$mootoolsItemids = $this->params->get('mootoolsItemids');
$editingMootools = $this->params->get('editingMootools');
$nocss = $this->params->get('nocss');
$nojs = $this->params->get('nojs');
$disablejs = $this->params->get('disablejs');
$disablecss = $this->params->get('disablecss');
$mootools = $this->params->get('mootools',0);

//First Unset unnecesary options

if ($mootools==0) {
	unset($doc->_scripts[$this->baseurl . '/media/system/js/mootools-core.js']);
	unset($doc->_scripts[$this->baseurl . '/media/system/js/mootools-more.js']);
	unset($doc->_scripts[$this->baseurl . '/media/system/js/core.js']);
	unset($doc->_scripts[$this->baseurl . '/media/system/js/caption.js']);
	unset($doc->_scripts[$this->baseurl . '/media/system/js/modal.js']);
	unset($doc->_scripts[$this->baseurl . '/media/system/js/mootools.js']);
	unset($doc->_scripts[$this->baseurl . '/plugins/system/mtupgrade/mootools.js']);
}
// If the itemId isn't in items that need mootools disable mootools
if (!$editingMootools && (empty($enabledItemids) || empty($itemId) || !in_array($itemId, $enabledItemids)))
{
		// Disable mootools javascript
		unset($doc->_scripts[$this->baseurl . '/media/system/js/mootools-core.js']);
		unset($doc->_scripts[$this->baseurl . '/media/system/js/mootools-more.js']);
		unset($doc->_scripts[$this->baseurl . '/media/system/js/core.js']);
		unset($doc->_scripts[$this->baseurl . '/media/system/js/caption.js']);
		unset($doc->_scripts[$this->baseurl . '/media/system/js/modal.js']);
		unset($doc->_scripts[$this->baseurl . '/media/system/js/mootools.js']);
		unset($doc->_scripts[$this->baseurl . '/plugins/system/mtupgrade/mootools.js']);

		// Disable css stylesheets
		unset($doc->_styleSheets[$this->baseurl . '/media/system/css/modal.css']);
}

/* Remove custom scripts
if ($app->isSite()) {
  // disable js
  if ( $this->params->get('disablejs') ) {
     if (trim($nojs) != '') {
      $filesjs=explode(',', $nojs);
      $head = (array) $headdata['scripts'];
      $newhead = array();         
      foreach($head as $key => $elm) {
        $add = true;
        foreach ($filesjs as $dis) {
          if (strpos($key,$dis) !== false) {
            $add=false;
            break;
          } 
        }
        if ($add) $newhead[$key] = $elm;
      }
      $headdata['scripts'] = $newhead;
    } 
  } 
  // disable css
  if ( $this->params->get('disablecss') ) {
    if (trim($nocss) != '') {
      $filescss=explode(',', $nocss);
      $head = (array) $headdata['styleSheets'];
      $newhead = array();         
      foreach($head as $key => $elm) {
        $add = true;
        foreach ($filescss as $dis) {
          if (strpos($key,$dis) !== false) {
            $add=false;
            break;
          } 
        }
        if ($add) $newhead[$key] = $elm;
      }
      $headdata['styleSheets'] = $newhead;
    } 
  }
  $doc->setHeadData($headdata); 
}
*/

//Modernizr
if ($modernizr==1) $doc->addScript($tpath.'/js/modernizr-2.7.1.js');

//bootstrap

switch ($css) {
	case "CDN":
		$doc->addStyleSheet('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.css');
		$doc->addStyleSheet($tpath.'/css/custom.css');

		break;
	case "SERVER":
		$doc->addStyleSheet($tpath.'/css/bootstrap.min.css');
		$doc->addStyleSheet($tpath.'/css/custom.css');
		break;
	case "JOOMLA":
		//JHtml::_('jquery.framework');
		//JHtml::_('bootstrap.framework');
		break;
	case "MANUAL":
		break;
}

//JS bootstrap
$loadBootstrap="";

switch ($bootstrap) {
	case "CDN":
		$loadBootstrap='<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>';
		unset($doc->_scripts[$this->baseurl . '/media/jui/js/bootstrap.min.js']);
		break;
	case "SERVER":
		$loadBootstrap= '<script src="'.$tpath.'/js/bootstrap.min.js"></script>';
		unset($doc->_scripts[$this->baseurl . '/media/jui/js/bootstrap.min.js']);
		break;
	case "JOOMLA":
		$loadBootstrap="";
		JHtml::_('jquery.framework');
		JHtml::_('bootstrap.framework');
		break;
	case "NO":
		$loadBootstrap="";
		break;
}
  
//FONT AWESOME
 if ($fontawesome==1) $doc->addStyleSheet('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css');


//JS JQUERY
$loadJQUERY="";
switch ($jquery) {
	case "CDN":
		$loadJQUERY='<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>';
		unset($doc->_scripts[$this->baseurl . '/media/jui/js/jquery.min.js']);
		break;
	case "SERVER":
		$loadJQUERY= '<script src="'.$tpath.'/js/jquery.min.js"></script>';
		unset($doc->_scripts[$this->baseurl . '/media/jui/js/jquery.min.js']);
		break;
	case "JOOMLA":
		$loadJQUERY="";
		JHtml::_('jquery.framework');
		JHtml::_('bootstrap.framework');
		break;
	case "NO":
		$loadJQUERY="";
		break;
}

/**
 * ==================================================
 * Disable mootools-more except for selected itemids to solve bootstrap conflicts
 * ==================================================
 */
$enabledItemids        = array();
$enabledMootoolsString = $this->params->get('mootoolsItemids', '');
$editingMootools       = $this->params->get('editingMootools', 1);

// Decode the enabled Itemids array
if ($enabledMootoolsString != '')
{
	$enabledItemids = explode(',', $enabledMootoolsString);
}

if ($editingMootools && ($option != 'com_content'))
{
	$editingMootools = 0;
}

if ($this->params->get('metrojs',0)==1) {
	$doc->addStyleSheet($tpath.'/css/MetroJs.min.css');
	$loadBootstrap.= '<script src="'.$tpath.'/js/MetroJs.min.js"></script>';
	
}

/**
 * ==================================================
 * Load Google font
 * ==================================================
 */
 
if ($googlefont!="") {

			$doc->addStyleSheet('//fonts.googleapis.com/css?family='.$googlefont);
}


/**
 * ==================================================
 * Remove JS Conflicts
 * ==================================================
 */


//UNSET newJCAPTION
if ($this->params->get('removecaptionjs',0)==1) {
	if (isset($this->_script['text/javascript']))
	{ $this->_script['text/javascript'] = preg_replace('%window\.addEvent\    (\'load\',\s*function\(\)\s*{\s*new\s*JCaption\(\'img.caption\'\);\s*}\);\s*%',     '', $this->_script['text/javascript']);
	if (empty($this->_script['text/javascript']))
	unset($this->_script['text/javascript']);}
}


// force latest IE & chrome frame
$doc->setMetadata('x-ua-compatible', 'IE=edge,chrome=1');
?>
