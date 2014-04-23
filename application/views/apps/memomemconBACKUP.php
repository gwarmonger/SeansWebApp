 <script>


 $(function() {
$( "#draggable" ).draggable();
});



</script>

<div class="container">
<div class="panel panel-default" id="memocontainer">
	<div class="panel-body">
		
<ul id="draggable" class="list-group">
<?php
foreach ($memo as $memoitem)
{?>
	<li id="sort-<?=$memoitem['memoid'];?>" class="list-group-item"><h4><?=$memoitem['title'];?></h4>
	<?=$memoitem['thedate'];?>
	<?=$memoitem['memo'];?></li>

<?php }?>
</ul>
		</div>
	</div>
</div>