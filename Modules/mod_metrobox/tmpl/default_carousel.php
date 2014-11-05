<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );?>


<div class="live-tile" data-mode="carousel" data-direction="horizontal" data-delay="8000">
<?php foreach ($carouseltiles as $k => $v) : ?>
<div style="text-align: center;">
<a href="<? echo $minitiles[$k]["Link"]; ?>" style="text-decoration: none;">
	<span class="tile-title" style="background-color: <?php echo $minitiles[$k]["Colour"]; ?>;"><img src="<?php echo $minitiles[$k]["Image"]; ?>" alt="<?php echo $minitiles[$k]["Name"]; ?>"/>
		<h2><?php echo $minitiles[$k]["Name"]; ?></h2>
	</span>
	</a>
</div>
<?php endforeach; ?>
</div>
