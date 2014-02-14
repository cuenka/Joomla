<?php
/**
 * @version     1.0.0
 * @package     com_clientsdisplay
 * @copyright   Aviation Media (TM)Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
// no direct access
defined('_JEXEC') or die;
?>
<style>
.view {
   width: 300px;
   height: 200px;
   margin: 10px;
   float: left;
   border: 10px solid #fff;
   overflow: hidden;
   position: relative;
   text-align: center;
   -webkit-box-shadow: 1px 1px 2px #e6e6e6;
   -moz-box-shadow: 1px 1px 2px #e6e6e6;
   box-shadow: 1px 1px 2px #e6e6e6;
   cursor: default;
   background: #fff url(../images/bgimg.jpg) no-repeat center center;
}
.view .mask,.view .content {
   width: 300px;
   height: 200px;
   position: absolute;
   overflow: hidden;
   top: 0;
   left: 0;
}
.view img {
   display: block;
   position: relative;
}
.view h2 {
   text-transform: uppercase;
   color: #fff;
   text-align: center;
   position: relative;
   font-size: 17px;
   padding: 10px;
   background: rgba(0, 0, 0, 0.8);
   margin: 20px 0 0 0;
}
.view p {
   font-family: Georgia, serif;
   font-style: italic;
   font-size: 12px;
   position: relative;
   color: #fff;
   padding: 10px 20px 20px;
   text-align: center;
}
.view a.info {
   display: inline-block;
   text-decoration: none;
   padding: 7px 14px;
   background: #000;
   color: #fff;
   text-transform: uppercase;
   -webkit-box-shadow: 0 0 1px #000;
   -moz-box-shadow: 0 0 1px #000;
   box-shadow: 0 0 1px #000;
}
.view a.info: hover {
   -webkit-box-shadow: 0 0 5px #000;
   -moz-box-shadow: 0 0 5px #000;
   box-shadow: 0 0 5px #000;
}
.view-fifth img {
   -webkit-transition: all 0.3s ease-in-out;
   -moz-transition: all 0.3s ease-in-out;
   -o-transition: all 0.3s ease-in-out;
   -ms-transition: all 0.3s ease-in-out;
   transition: all 0.3s ease-in-out;
}
.view-fifth .mask {
   background-color: rgba(146,96,91,0.3);
   -webkit-transform: translateX(-300px);
   -moz-transform: translateX(-300px);
   -o-transform: translateX(-300px);
   -ms-transform: translateX(-300px);
   transform: translateX(-300px);
   -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=100)";
   filter: alpha(opacity=100);
   opacity: 1;
   -webkit-transition: all 0.3s ease-in-out;
   -moz-transition: all 0.3s ease-in-out;
   -o-transition: all 0.3s ease-in-out;
   -ms-transition: all 0.3s ease-in-out;
   transition: all 0.3s ease-in-out;
}
.view-fifth h2 {
   background: rgba(255, 255, 255, 0.5);
   color: #000;
   -webkit-box-shadow: 0px 1px 3px rgba(159, 141, 140, 0.5);
   -moz-box-shadow: 0px 1px 3px rgba(159, 141, 140, 0.5);
   box-shadow: 0px 1px 3px rgba(159, 141, 140, 0.5);
}
.view-fifth p {
   -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=0)";
   filter: alpha(opacity=0);
   opacity: 0;
   color: #333;
   -webkit-transition: all 0.2s linear;
   -moz-transition: all 0.2s linear;
   -o-transition: all 0.2s linear;
   -ms-transition: all 0.2s linear;
   transition: all 0.2s linear;
}
.view-fifth:hover .mask {
   -webkit-transform: translateX(0px);
   -moz-transform: translateX(0px);
   -o-transform: translateX(0px);
   -ms-transform: translateX(0px);
   transform: translateX(0px);
}
.view-fifth:hover img {
   -webkit-transform: translateX(300px);
   -moz-transform: translateX(300px);
   -o-transform: translateX(300px);
   -ms-transform: translateX(300px);
   transform: translateX(300px);
}
.view-fifth:hover p {
   -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=100)";
   filter: alpha(opacity=100);
   opacity: 1;
}
</style>
<script type="text/javascript">
    function deleteItem(item_id){
        if(confirm("<?php echo JText::_('COM_CLIENTSDISPLAY_DELETE_MESSAGE'); ?>")){
            document.getElementById('form-clients-delete-' + item_id).submit();
        }
    }
</script>
<div style="clear: both;"></div>
<div class="clients_display" >

        <?php foreach ($this->items as $item) : ?>

            
				<?php
					if($item->state == 1 || ($item->state == 0 && JFactory::getUser()->authorise('core.edit.own',' com_clientsdisplay'))):
						$show = true;
						?>
							<div class="view view-fifth">
							                    <img src="<?php echo $item->logo; ?>">
							                    <div class="mask">
							                        <h2><?php echo $item->client; ?></h2>
							                        <p><?php echo $item->description; ?></p>
							                        <a href="<?php echo $item->clientwebsite; ?>" class="info">Read More</a>
							                    </div>
							                </div>
							
							<?php endif; ?>

<?php endforeach; ?>
</div>
<div style="clear: both;"></div>
