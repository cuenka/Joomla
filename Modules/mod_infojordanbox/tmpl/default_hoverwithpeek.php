<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );?>
<div class="tiles red">
    <div class="live-tile" id="tile<?php echo $module->id; ?>1" data-mode="flip">        
        <div style="background-color:<?php echo $hoverpeektiles[0]["Colour"]; ?>;">
            <a href="<?php echo $hoverpeektiles[0]["Link"]; ?>"><img src="<?php echo $hoverpeektiles[0]["Image"]; ?>" alt="<?php echo $hoverpeektiles[0]["Name"]; ?>"/></a>
            <h2><?php echo $hoverpeektiles[0]["Name"]; ?></h2>
        </div>
        <div>
<a href="<?php echo $hoverpeektiles[0]["Link"]; ?>" style="text-decoration: none;"><h2 style="margin: 5px 0px;padding:10px;"><? echo $params->get("activatehovertile1title"); ?></h2> 
<h3 style="margin: 5px 0px;padding:10px;"><? echo $params->get("activatehovertile1text"); ?></h3></a> 
        </div>
    </div>
    <div class="live-tile green" id="tile<?php echo $module->id; ?>2" data-mode="slide">
        <div style="background-color:<?php echo $hoverpeektiles[1]["Colour"]; ?>;">
           <a href="<?php echo $hoverpeektiles[1]["Link"]; ?>"><img src="<?php echo $hoverpeektiles[1]["Image"]; ?>" alt="<?php echo $hoverpeektiles[1]["Name"]; ?>"/></a>
           <h2><?php echo $hoverpeektiles[1]["Name"]; ?></h2>
        </div>
        <div>
<a href="<?php echo $hoverpeektiles[1]["Link"]; ?>" style="text-decoration: none;"><h2 style="margin: 5px 0px;padding:10px;"><? echo $params->get("activatehovertile2title"); ?></h2> 
<h3 style="margin: 5px 0px;padding:10px;"><? echo $params->get("activatehovertile2text"); ?></h3></a> 
        </div>
    </div>
    
    <div class="live-tile blue" id="tile<?php echo $module->id; ?>3" data-mode="slide" data-stops="50%" data-stack="true">  
        <div style="background-color:<?php echo $hoverpeektiles[2]["Colour"]; ?>;">
           <a href="<?php echo $hoverpeektiles[2]["Link"]; ?>"><img src="<?php echo $hoverpeektiles[2]["Image"]; ?>" alt="<?php echo $hoverpeektiles[2]["Name"]; ?>"/></a>
           <h2><?php echo $hoverpeektiles[2]["Name"]; ?></h2>
        </div>
        <div style="background-color:navy;">
            <a href="<?php echo $hoverpeektiles[2]["Link"]; ?>" style="text-decoration: none;"><h2 style="margin: 5px 0px;padding:10px;"><? echo $params->get("activatehovertile3title"); ?></h2> 
            <h3 style="margin: 5px 0px;padding:10px;"><? echo $params->get("activatehovertile3text"); ?></h3></a>            
        </div>
    </div>
</div>
<script type="text/javascript">
//play on hover with initial play
var $tiles<?php echo $module->id; ?> = jQuery("#tile<?php echo $module->id; ?>1, #tile<?php echo $module->id; ?>2, #tile<?php echo $module->id; ?>3").liveTile({ 
    playOnHover: true,
    repeatCount: 3,
    delay: 6000,
    initDelay: 10000,
    startNow: false
});
/* ORIGINAL CODE
//play on hover with initial play
var $tiles = $("#tile1, #tile2, #tile3").liveTile({ 
    playOnHover:true,
    repeatCount: 0,
    delay: 0,
    initDelay: 0,
    startNow: false,
    animationComplete: function(tileData){
        $(this).liveTile("play");
        tileData.animationComplete = function(){};
    }
}).each(function(idx, ele){
   var delay = idx * 1000; 
    $(ele).liveTile("play", delay);
});
*/
</script>