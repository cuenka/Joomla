<?php
/**
 * @version     1.2.0
 * @package     com_floorplan
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */

defined('_JEXEC') or die;

abstract class FloorplanHelper
{
	public static function BuildBooths($Booths,$ReservedColour,$AvailableColour,$RefreshmentColour,$SpecialColour,$mail,$items)
	{
		$Type= array();
		$Booth= array();
		$j=0;
		$totalItems= count($items);
	
		for ($i = 1; $i <= $Booths; $i++) {
			if ($j < $totalItems){
					if ($items[$j]->boothnumber == $i){
						switch ($items[$j]->type) {
							case "Available":
									$m = JHtml::_('email.cloak', $mail, 1, $i,0);
									$Booth[$i]='<div class="booth" style="background-color:'.$AvailableColour.';">A - '.$m.'</div>';	
									break;
							case "Reserved":
									$Booth[$i]='<div class="booth" style="background-color:'.$ReservedColour.';">'.$i.'</div>';
									break;
							case "Refreshment":
									$Booth[$i]='<div class="booth" style="background-color:'.$RefreshmentColour.';">'.$i.'</div>';
									break;
							case "Special":
									break;
							default:
									$m = JHtml::_('email.cloak', $mail, 1, $i,0);
							  		$Booth[$i]='<div class="booth" style="background-color:'.$AvailableColour.';">'.$m.'</div>';							
						}
						
						$j++;
					}else{
					$m = JHtml::_('email.cloak', $mail, 1, $i,0);
					$Booth[$i]='<div class="booth" style="background-color:'.$AvailableColour.';">'.$m.'</div>';
					
					}	
			}else {
				$m = JHtml::_('email.cloak', $mail, 1, $i,0);
				$Booth[$i]='<div class="booth" style="background-color:'.$AvailableColour.';">'.$m.'</div>';
			}
		}
		return $Booth;
	}
	public static function BuildShapeSquare($TotalBooths,$Booths)
	{
	$FirstRow= intval(($TotalBooths/4)+1);
	$side = intval(($TotalBooths/4)-1)*2;
	$lastRow= $FirstRow;
	$Result= '<div class="Square">';
	$Result.= '<div style="float:left;margin: 5% 15%;">';
		for ($i = 1; $i <= $TotalBooths; $i++) {
			if ($i<=$FirstRow) {
				$Result.= $Booths[$i];
			}
			if($i== ($FirstRow + 1)) {
				//$Result.= '</div>';
				if ($i%2==0) {
					$Result.= '<div style="float:right;clear: left;">'.$Booths[$i].'</div><br style="clear:right;"/>';
				}else {
					$Result.= '<div style="float:left;clear: left;">'.$Booths[$i].'</div>';
				}
			}
			if((($i > $FirstRow + 1)) && ($i <= ($FirstRow + $side) )) {
				
				if ($i%2==0) {
					$Result.= '<div style="float:right">'.$Booths[$i].'</div><br style="clear:right;"/>';
				}else {
					$Result.= '<div style="float:left">'.$Booths[$i].'</div>';
				}
				
			}
			if($i > ($TotalBooths - ($lastRow))) {
				
				$Result.= $Booths[$i];
				
			}
			
			
		}
	$Result.='</div></div><div style="clear:both;"></div>';
	return $Result;
	
	}	
	
	
	public static function BuildShapeRectangle($TotalBooths,$Booths)
	{
	$FirstRow= intval($TotalBooths*0.4);
	$side = intval($TotalBooths*0.2);
	$lastRow= $FirstRow;
	$Result= '<div class="Rectangle">';
	$Result.= '<div style="float:left;">';
		for ($i = 1; $i <= $TotalBooths; $i++) {
			if ($i<=$FirstRow) {
				$Result.= $Booths[$i];
			}
			if($i== ($FirstRow + 1)) {
				//$Result.= '</div>';
				if ($i%2==0) {
					$Result.= '<div style="float:right;clear: left;">'.$Booths[$i].'</div><br style="clear:right;"/>';
				}else {
					$Result.= '<div style="float:left;clear: left;">'.$Booths[$i].'</div>';
				}
			}
			if((($i > $FirstRow + 1)) && ($i <= ($FirstRow + $side) )) {
				
				if ($i%2==0) {
					$Result.= '<div style="float:right">'.$Booths[$i].'</div><br style="clear:right;"/>';
				}else {
					$Result.= '<div style="float:left">'.$Booths[$i].'</div>';
				}
				
			}
			if($i > ($TotalBooths - ($lastRow))) {
				
				$Result.= $Booths[$i];
				
			}
			
			
		}
	$Result.='</div></div><div style="clear:both;"></div>';
	return $Result;
	
	}
	public static function BuildShapeL($TotalBooths,$Booths)
	{
	$Column= intval($TotalBooths*0.5);
	$FirstRow = intval($TotalBooths*0.25);
	$lastRow= intval($TotalBooths*0.25);
	$Result= '<div class="Lshape">';
	$Result.= '<div style="float:left;">';
		for ($i = 1; $i <= $TotalBooths; $i++) {
			if ($i<=$Column) {
				if ($i%2==0) {
					$Result.= '<div style="float:left;">'.$Booths[$i].'</div>';
				}else {
					$Result.= '<div style="float:left;clear: left;">'.$Booths[$i].'</div>';
				}
				
			}
			if(($i>$Column) && ($i< ($Column + $FirstRow))) {
					$Result.= '<div style="float:left;">'.$Booths[$i].'</div>';
			
			}
			if($i==($Column + $FirstRow)) {
					$Result.= '<div style="float:left;clear:left">'.$Booths[$i].'</div>';
			
			}
			if ($i > ($Column + $FirstRow)) {
				$Result.= '<div style="float:left">'.$Booths[$i].'</div>';
				
			}
			
			
			
		}
	$Result.='</div></div><div style="clear:both;"></div>';
	return $Result;
	
	}
	public static function BuildShapeLeadership($TotalBooths,$Booths)
	{
	
	
	$Result= '<div class="Leadershipshape">';
	$Result.= '<div style="float:left;margin: 19% 2.5%;">';
		for ($i = 1; $i <= $TotalBooths; $i++) {
			if ($i==1) {
				$Result.= '<div style="float:left;margin-left:103px;margin-right:22px;">'.$Booths[$i].'</div>';
				
			}
			if ($i==2 OR $i==3) {
				$Result.= '<div style="float:left;margin-left:67px;">'.$Booths[$i].'</div>';
				
			}
			if ($i==4) {
				$Result.= '<div style="margin-top: -18px;float: left;clear: left;">'.$Booths[$i].'</div>';
				
			}
			if ($i>4 & $i<=6) {
				$Result.= '<div style="float: left;clear: left;">'.$Booths[$i].'</div>';
				
			}
			if ($i==7) {
				$Result.= '<div style="margin-top: 32px;margin-left: 29px;float: left;clear: left;">'.$Booths[$i].'</div>';
				
			}			
			if ($i>7 & $i<=12) {
				$Result.= '<div style="margin-top: 32px;float: left;">'.$Booths[$i].'</div>';
				
			}		
			if ($i==13) {
				$Result.= '<div style="margin-right:86px;float: right;clear: left;margin-top: 7px;">'.$Booths[$i].'</div>';
				
			}
			if ($i==14) {
				$Result.= '<div style="margin-right: 87px;float: right;margin-top: 4px;clear: both;">'.$Booths[$i].'</div>';
				
			}
			
				
			}
					
			
			
	
	$Result.='</div></div><div style="clear:both;"></div>';
	return $Result;
	
	}
	
	public static function Race2015Shape($TotalBooths,$Booths)
	{
	
	$Result= '<div class="Race2015shape">';
	$Result.= '<div class="firstrow">';
		for ($i = 1; $i <= $TotalBooths; $i++) {
			if ($i<=8) {
					if ($i==1) {
						$Result.= '<div style="float:left;margin-right:35px;">'.$Booths[$i].'</div>';
					}elseif ($i==4) {
						$Result.= '<div style="float:left;margin-right:5px;">'.$Booths[$i].'</div>';
					}else	{
						$Result.= '<div style="float:left;">'.$Booths[$i].'</div>';
					}
			}
			if ($i==9) {
					$Result.='</div><div style="clear:both;"></div>';
					$Result.='<div id="turn30">';
					$Result.= '<div style="float:left;">'.$Booths[$i].'</div>';
			}
			if ($i>9) {
					$Result.= '<div style="float:left;">'.$Booths[$i].'</div>';
			}			
			
		}
	$Result.='</div></div><div style="clear:both;"></div>';
	return $Result;
	
	}
	
	public static function BuildFloorplan($params,$items)
	{
		$Booths = FloorplanHelper::BuildBooths(
					$params->get( 'TotalBooths', '0' ),
					$params->get( 'ReservedColour', '0' ),
					$params->get( 'EmptyColour', '0' ),
					$params->get( 'RefreshmentColour', '0' ),
					$params->get( 'SpecialColour', '0' ),
					$params->get( 'Mailto', 'jose@aviationmedia.aero' ),
					$items);
		$Shape = $params->get( 'Shape', 'Square' );
		switch ($Shape) {
			case  "Square":
				$result = FloorplanHelper::BuildShapeSquare($params->get( 'TotalBooths', '0' ),$Booths);
				break;
			case "Rectangle":
				$result = FloorplanHelper::BuildShapeRectangle($params->get( 'TotalBooths', '0' ),$Booths);
				break;
			case "LShape":
				$result = FloorplanHelper::BuildShapeL($params->get( 'TotalBooths', '0' ),$Booths);
				break;
			case "leadership":
				$result = FloorplanHelper::BuildShapeLeadership($params->get( 'TotalBooths', '0' ),$Booths);
				break;
			case "rac":
				$result = FloorplanHelper::Race2015Shape($params->get( 'TotalBooths', '0' ),$Booths);
				break;	
		}
							
		return $result;
	}
	
}

