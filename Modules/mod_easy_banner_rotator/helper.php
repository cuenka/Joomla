<?php

defined('_JEXEC') or die;


class ModeasybannerrotatorHelper
{
	
	
	
		public static function getBannersbycategory($params)
		{
			
			$category = (int) $params->get('category', 0);
			$db = JFactory::getDbo();
			$query	= $db->getQuery(true)
					->select($db->quoteName(array('name','clickurl', 'description', 'custombannercode','params','ordering')))
					->from($db->quoteName('#__banners'))
					->where($db->quoteName('state') . '=1')
					->where($db->quoteName('catid') . '=' . $db->quote($category));
			if ((int) $params->get('display', 0)==1) {
				$query->order('ordering ASC');
			}
			
			$db->setQuery($query);
	
			$result = $db->loadObjectList();
			
			return($result);
			
		}
		
	public static function getBannersbyid($params)
	{
		$idbanners = ModeasybannerrotatorHelper::getids($params);
		$db = JFactory::getDbo();
		$query	= $db->getQuery(true)
				->select($db->quoteName(array('id','name','clickurl', 'description', 'custombannercode','params','ordering')))
				->from($db->quoteName('#__banners'))
				->where($db->quoteName('state') . '=1')
				->where($db->quoteName('id') . $idbanners);
		if ((int) $params->get('display', 0)==1) {
			$query->order('ordering ASC');
		}
		
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
	
	public static function getids($params)
	{
		// 6 is the maxium of indiviudal banners
		$ids="IN (";
		for ($i = 1; $i <= 6; $i++) {
			$getparam = "mybanner".$i;
			if ((int) $params->get($getparam, 0)!=0){
				$ids.=$params->get($getparam, 0).",";
			}
		}
		$ids.="0 )";
		return ($ids);
	}	
	
	public static function shufflebanners(&$array)
	{
		 $keys = array_keys($array);
		
		        shuffle($keys);
		
		        foreach($keys as $key) {
		            $new[$key] = $array[$key];
		        }
		
		        $array = $new;
		
		        return true;
	}
	public static function shufflepaidbanners(&$array)
	{
		 
		 $keys = array_keys($array);
			
		        shuffle($keys);
		
		        foreach($keys as $key) {
		            $new[$key] = $array[$key];
		        }
		
		        $array = $new;
		
		        return true;
	}
	
	public static function addpaidstatus($banners,$params)
	{
/*	var_dump($banners);
	echo "<br />---------<br />";
	var_dump($params);
	
	for ($i = 1; $i <= 6; $i++) {
		$getparamid = "mybanner".$i;
		$getparampaid = "paid".$i;
		
		if (((int) $params->get($getparampaid, 0)!=0) AND ((int) $params->get($getparamid, 0)!=0)){
			
			echo "<br />",$getparampaid." - PAID!<br />";
		
		}else {
		
			echo "<br />",$getparampaid." -NOT PAID!<br />";
		}
	} */
	return $banners;
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