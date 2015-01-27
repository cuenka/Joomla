<?php

/**
 * @version     1.2.0
 * @package     com_download
 * @copyright   Aviation Media (TM) Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
// No direct access
defined('_JEXEC') or die;

/**
 * @param	array	A named array
 * @return	array
 */
function DownloadBuildRoute(&$query) {
    $segments = array();

    if (isset($query['task'])) {
        $segments[] = implode('/', explode('.', $query['task']));
        unset($query['task']);
    }
    if (isset($query['view'])) {
        $segments[] = $query['view'];
        unset($query['view']);
    }
    if (isset($query['id'])) {
        $segments[] = $query['id'];
        unset($query['id']);
    }

    return $segments;
}

/**
 * @param	array	A named array
 * @param	array
 *
 * Formats:
 *
 * index.php?/download/task/id/Itemid
 *
 * index.php?/download/id/Itemid
 */
function DownloadParseRoute($segments) {
    $vars = array();
    $count = 0;

    // view is always the first element of the array
    $vars['view'] = $segments[$count];
    $count++;

    if ($count < count($segments)) {
        $segment = $segments[$count];
        if (is_numeric($segment)) {
            $vars['id'] = $segment;
        } else {
            $count++;
            $vars['task'] = $segments[$count] . '.' . $segment;
        }
    }

    if ($count < count($segments)) {
        $vars['task'] = implode('.', $segments);
    }
    return $vars;
}
