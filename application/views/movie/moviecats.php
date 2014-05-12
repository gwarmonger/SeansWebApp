<?php
	$attributes = array('class' => 'form-inline');
	$attributes2 = array('class' => 'form-control topmargin', 'name' => 'category', 'placeholder'=>'Add a category');
	$attributes3 = array('userid' => $userid);
		echo form_open('movie/category', $attributes);?>
		<div class="input-group topmargin2">
		<span class="input-group-addon">	
		<button formaction="movie/category" type="submit" formmethod="post" name="result" class="btn btn-primary submitbut">
			<span class="glyphicon glyphicon-upload"></span>
		</button></span>
		<?=form_input($attributes2, '');?>
		</div>
		<?= form_hidden($attributes3,'');
		echo form_close();		
		?>
