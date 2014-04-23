<?php
$attributes = array('class' => 'form-control', 'name' => 'songname');
$attributes2 = array('class' => 'form-control', 'name' => 'songdesc', 'rows'=> '2', 'cols'=>'3');
$attributes3 = array('userid' => $userid);

$attributes5 = array('class' => 'btn btn-primary', 'name' => 'addcategory');
echo form_open_multipart('songshare/upload');?>
<input type="file" name="userfile" size="20" />
	<span class="label label-default">Song Title</span>
<?php	
	echo form_input($attributes, '');?>
	<span class="label label-default">Song Description</span>
<?php
	echo form_textarea($attributes2, '');
	echo form_hidden($attributes3, '');
		
	echo form_submit($attributes5, 'Submit');?>

<?=form_close();?>
