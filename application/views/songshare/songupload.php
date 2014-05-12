<div class="container"><!--closed in musicshare.php-->
<?php
$attributes = array('class' => 'form-control', 'name' => 'songname');
$attributes2 = array('class' => 'form-control', 'name' => 'songdesc', 'rows'=> '2', 'cols'=>'3');


$attributes5 = array('class' => 'btn btn-primary');


echo form_open_multipart('songshare/upload');?>
<input type="file" name="userfile" size="20" class="space"/>
	<span class="label label-default">Song Title</span>
<?php	
	echo form_input($attributes, '');?>
	<span class="label label-default">Song Description</span>
<?php
	echo form_textarea($attributes2, '');
		
	echo form_submit($attributes5, 'Submit');?>

<?=form_close();?>
