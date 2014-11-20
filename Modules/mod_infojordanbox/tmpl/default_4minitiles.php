<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );?>
<div class="list-tile mango">
	<ul class="flip-list fourTiles exclude" data-mode="flip-list" data-delay="2000">
    	<li style="margin: 0px 5px 5px 0;">
        	<div style="background-color:<? echo $minitiles[0]["Colour"]; ?>;">
        		<a href="<? echo $minitiles[0]["Link"]; ?>" style="text-decoration: none;">
            	<img src="<? echo $minitiles[0]["Image"]; ?>" alt="<? echo $minitiles[0]["Name"]; ?>" class="img-responsive" style="width: 80%;height: 80%;margin: 0 auto;"/>
            	<h5><? echo $minitiles[0]["Name"]; ?></h5>
            	</a>
            </div>
        </li>
        <li style="margin: 0px 0px 5px 5px;">
			<div style="background-color:<? echo $minitiles[1]["Colour"]; ?>;">
				<a href="<? echo $minitiles[1]["Link"]; ?>" style="text-decoration: none;">
				<img src="<? echo $minitiles[1]["Image"]; ?>" alt="<? echo $minitiles[1]["Name"]; ?>" class="img-responsive" style="width: 80%;height: 80%;margin: 0 auto;"/>
				<h5><? echo $minitiles[1]["Name"]; ?></h5>
				</a>
			</div>

        </li>
        <li style="margin: 5px 5px 0px 0px;">
			<div style="background-color:<? echo $minitiles[2]["Colour"]; ?>;">
				<a href="<? echo $minitiles[2]["Link"]; ?>" style="text-decoration: none;">
				<img src="<? echo $minitiles[2]["Image"]; ?>" alt="<? echo $minitiles[2]["Name"]; ?>" class="img-responsive" style="width: 80%;height: 80%;margin: 0 auto;"/>
				<h5><? echo $minitiles[2]["Name"]; ?></h5>
				</a>
			</div>
        </li>
        <li style="margin: 5px 0px 0px 5px;" data-direction="horizontal">
			<div style="background-color:<? echo $minitiles[3]["Colour"]; ?>;">
				<a href="<? echo $minitiles[3]["Link"]; ?>" style="text-decoration: none;">
				<img src="<? echo $minitiles[3]["Image"]; ?>" alt="<? echo $minitiles[3]["Name"]; ?>" class="img-responsive" style="width: 80%;height: 80%;margin: 0 auto;"/>
				<h5><? echo $minitiles[3]["Name"]; ?></h5>
				</a>
			</div>
    	</li>
	</ul>
</div>
