<div id="footer"class="row col-md-12">
	<div class="col-md-2 footerlinks">
		<div class="linkcon">
		<?php if ($this->tank_auth->is_logged_in()) {?>
	<?="<div><center><a class='font' href='".base_url("index.php/auth/logout")."'>Logout</a></center></div>";?>
	<?="<div><center><a class='font' href='".base_url("index.php/auth/unregister")."'>Unregister</a></center></div>";?>
	<?php }?>
	<div><center>
		<a href="mailto:ander562@uwm.edu" target="_top">Contact Us</a>
</center></div>
</div>
	</div>
	<div class="col-md-10"><h4 class="monktext">The Monk Bunker</h4></div>
</div><!--div for mainwrapper-->
	<div class="clearfix"></div>
</div>
</body>
</html>