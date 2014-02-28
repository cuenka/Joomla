<?php
/**
 * @version     1.0.0
 * @package     com_meettheteam
 * @copyright   Aviation Media Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jose Cuenca <jose@aviationmedia.aero> - http://www.aviationmedia.aero
 */
// no direct access
defined('_JEXEC') or die;
$path = JURI::root();
?>
<script type="text/javascript">
    function deleteItem(item_id){
        if(confirm("<?php echo JText::_('COM_MEETTHETEAM_DELETE_MESSAGE'); ?>")){
            document.getElementById('form-employee-delete-' + item_id).submit();
        }
    }
</script>
<style>
.og-grid {
	list-style: none;
	padding: 20px 0;
	margin: 0 auto;
	text-align: center;
	width: 100%;
}

.og-grid li {
	display: inline-block;
	margin: 10px 5px 0 5px;
	vertical-align: top;
	height: 250px;
}

.og-grid li > a,
.og-grid li > a img {
	border: none;
	outline: none;
	display: block;
	position: relative;
}

.og-grid li.og-expanded > a::after {
	top: auto;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
	border-bottom-color: #ddd;
	border-width: 15px;
	left: 50%;
	margin: -20px 0 0 -15px;
}

.og-expander {
z-index: 1;
	position: absolute;
	background: #ddd;
	top: auto;
	left: 0;
	width: 100%;
	margin-top: 10px;
	text-align: left;
	height: 0;
	overflow: hidden;
}

.og-expander-inner {
	padding: 50px 30px;
	height: 100%;
}

.og-close {
	position: absolute;
	width: 40px;
	height: 40px;
	top: 20px;
	right: 20px;
	cursor: pointer;
}

.og-close::before,
.og-close::after {
	content: '';
	position: absolute;
	width: 100%;
	top: 50%;
	height: 1px;
	background: #888;
	-webkit-transform: rotate(45deg);
	-moz-transform: rotate(45deg);
	transform: rotate(45deg);
}

.og-close::after {
	-webkit-transform: rotate(-45deg);
	-moz-transform: rotate(-45deg);
	transform: rotate(-45deg);
}

.og-close:hover::before,
.og-close:hover::after {
	background: #333;
}

.og-fullimg,
.og-details {
	width: 45%;
	float: left;
	height: 100%;
	overflow: hidden;
	position: relative;
}

.og-details {
	padding: 0 40px 0 20px;
}

.og-fullimg {
	text-align: center;
}

.og-fullimg img {
	display: inline-block;
	max-height: 100%;
	max-width: 100%;
}

.og-details h3 {
	font-weight: 300;
	font-size: 52px;
	padding: 40px 0 10px;
	margin-bottom: 10px;
}

.og-details p {
	font-weight: 400;
	font-size: 16px;
	line-height: 22px;
	color: #999;
}

.og-details a {
	font-weight: 700;
	font-size: 16px;
	color: #333;
	text-transform: uppercase;
	letter-spacing: 2px;
	padding: 10px 20px;
	border: 3px solid #333;
	display: inline-block;
	margin: 30px 0 0;
	outline: none;
}

.og-details a::before {
	content: '\2192';
	display: inline-block;
	margin-right: 10px;
}

.og-details a:hover {
	border-color: #999;
	color: #999;
}

.og-loading {
	width: 20px;
	height: 20px;
	border-radius: 50%;
	background: #ddd;
	box-shadow: 0 0 1px #ccc, 15px 30px 1px #ccc, -15px 30px 1px #ccc;
	position: absolute;
	top: 50%;
	left: 50%;
	margin: -25px 0 0 -25px;
	-webkit-animation: loader 0.5s infinite ease-in-out both;
	-moz-animation: loader 0.5s infinite ease-in-out both;
	animation: loader 0.5s infinite ease-in-out both;
}

@-webkit-keyframes loader {
	0% { background: #ddd; }
	33% { background: #ccc; box-shadow: 0 0 1px #ccc, 15px 30px 1px #ccc, -15px 30px 1px #ddd; }
	66% { background: #ccc; box-shadow: 0 0 1px #ccc, 15px 30px 1px #ddd, -15px 30px 1px #ccc; }
}

@-moz-keyframes loader {
	0% { background: #ddd; }
	33% { background: #ccc; box-shadow: 0 0 1px #ccc, 15px 30px 1px #ccc, -15px 30px 1px #ddd; }
	66% { background: #ccc; box-shadow: 0 0 1px #ccc, 15px 30px 1px #ddd, -15px 30px 1px #ccc; }
}

@keyframes loader {
	0% { background: #ddd; }
	33% { background: #ccc; box-shadow: 0 0 1px #ccc, 15px 30px 1px #ccc, -15px 30px 1px #ddd; }
	66% { background: #ccc; box-shadow: 0 0 1px #ccc, 15px 30px 1px #ddd, -15px 30px 1px #ccc; }
}

@media screen and (max-width: 830px) {

	.og-expander h3 { font-size: 32px; }
	.og-expander p { font-size: 13px; }
	.og-expander a { font-size: 12px; }

}

@media screen and (max-width: 650px) {

	.og-fullimg { display: none; }
	.og-details { float: none; width: 100%; }
	
}
</style>
<?php $show = false; ?>
<div class="main">
	<ul id="og-grid" class="og-grid">
        <?php foreach ($this->items as $item) : ?>

            
				<?php
					if($item->state == 1 || ($item->state == 0 && JFactory::getUser()->authorise('core.edit.own',' com_meettheteam'))):
						$show = true;
						?>
								<li>
									<a href="#" data-largesrc="<?php echo $path.$item->photo;?>" data-title="<?php echo $item->name;?>" data-description="<?php echo $item->jobdescription;?>">
										<img src="<?php echo $path.$item->photo;?>" alt="<?php echo $item->name;?>"/>
									</a>
								</li>
				<?php endif; ?>				
<?php endforeach; ?>
        </ul>
        </div>
        <?php
        if (!$show):
            echo JText::_('COM_MEETTHETEAM_NO_ITEMS');
        endif;
        ?>
        <script src="<?php echo $path;?>media/com_meettheteam/js/modernizr.custom.js"></script>
		<script src="<?php echo $path;?>media/com_meettheteam/js/grid.js"></script>
	<script>
	jQuery.noConflict();
	 jQuery( document ).ready(function(  ) {
			Grid.init();
		});
	</script>
	
</body>

