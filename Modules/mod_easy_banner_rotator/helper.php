<?php

defined('_JEXEC') or die;


class ModeasybannerrotatorHelper
{
	
	
	
		public static function getBanners($params)
		{
			
			$category = (int) $params->get('category', 0);
			$db = JFactory::getDbo();
			$query	= $db->getQuery(true)
					->select($db->quoteName(array('name','clickurl', 'description', 'custombannercode','params','ordering')))
					->from($db->quoteName('#__banners'))
					->where($db->quoteName('state') . '=1')
					->where($db->quoteName('catid') . '=' . $db->quote($category))
					->order('ordering ASC');
			$db->setQuery($query);
	
			$result = $db->loadObjectList();
			
			return($result);
			
		}
		public static function decodeJson($Banners)
		{
		
		$i=0;
		foreach ($Banners as $Banner) {
			$obj[$i] = json_decode($Banner->params);
			$Banner->imgpath = $obj[$i]->imageurl;
			$Banner->width = $obj[$i]->width;
			$Banner->height = $obj[$i]->height;
			unset($Banner->params);
			$i++;
		}
		}
}
/*
class Banner {
	public $name;
	public $url;
	public $img_path;
	public $width;
	public $height;
	
	function __construct($n,$u,$i,$w,$h) {
		$this->name=$n;
		$this->url=$u;
		$this->img_path=$i;
		$this->width=$w;
		$this->height=$h;
	}
} */
?>