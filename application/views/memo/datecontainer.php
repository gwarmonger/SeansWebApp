	<h4>Recent Memos</h4>
	<div class="panel panel-default">
  <div class="panel-body">
	<?php foreach ($thedate as $date):?>
	<div id="thismemo_<?=$date['memoid']?>">
	<button class="btn btn-primary"id="item2_<?=$date['memoid']?>"onclick="getMemoLink('<?=$date['thedate']?>')"><div><?=$date['thedate']?></div></button>
	<div><h4><?=$date['title']?><h4></div>
</div>
<?php endforeach;?>
</div>
</div>
</div>
<script>
		function getMemoLink(date){
					var jdate = date;
			      		$.ajax({
						url: "memo/getmemo/",
						type: "POST",
						data: { "jdate" : jdate },
						dataType: "html",
						success: function(p){
							$( "#thememo" ).html( p ); //send the memo to #thememo in memomain.php
						}
						});
						console.log(jdate);
			      	}
			</script>