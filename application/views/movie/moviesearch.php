<div class="col-md-8">
		<div class="topmargin">
		<?php
		$attributes = array('class' => 'form-inline');
		$attributes1 = array('class' => 'form-control', 'name' => 'term', 'placeholder'=>'Search for film');
		echo form_open('movie/search', $attributes);?>
			<div class="input-group">
			<span class="input-group-addon"><button formaction="movie/search" type="submit" formmethod="post" name="result" class="btn btn-primary submitbut">
			<span class="glyphicon glyphicon-search"></span>
			</button></span>
			<?=form_input($attributes1, '');?>
		</div>
		<?=form_close();?>
	</div>

