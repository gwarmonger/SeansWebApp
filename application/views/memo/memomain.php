		<!-- Modal -->
<div class="modal fade" id="addmemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">New memo</h4>
      </div>
      <div class="modal-body">
	<?php 
		$attributes = array('class' => 'form-control', 'name' => 'title');
		$attributes2 = array('class' => 'form-control','rows'=>'2', 'name' => 'memo');
		$attributes3 = array('id' => 'memoform');
		$attributes4 = array('name'=>'memosubmit','class' => 'btn btn-primary', 'value'=>'Submit');
		echo form_open('memo/memoform', $attributes3);?>
		<span class="label label-default">Title</span>
	<?php	
		echo form_input($attributes, '');?>
		<span class="label label-default">Memo</span>
	<?php
		echo form_textarea($attributes2, '', 'memo');
		echo form_hidden('id', $userid);
		echo form_hidden('thedate', date('Y-m-d'));
		echo form_submit( $attributes4);
	?>
<?=form_close();?>
</div>
</div>
 </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  
</div>
<div class="row">
	<div class="col-md-2 sidecontainer">
<button class="btn btn-primary addmemobutton"value="" data-toggle="modal" data-target="#addmemo">Add Memo</button>
