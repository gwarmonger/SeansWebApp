<?php
		
foreach ($memo as $memoitem)
			{?>
			<div id="<?=$memoitem['memoid'];?>"class="expandable_note_box draggable pull-right">
				<div class="slide<?=$memoitem['memoid'];?> middle">
					<div class="inside"><h5><?=$memoitem['title'];?></h5>
						<button class="<?=$memoitem['memoid'];?> inside"><span class="glyphicon glyphicon-resize-vertical inside"></span></button>
					</div>
					<div class="inside">
						<div class="content<?=$memoitem['memoid'];?> memoclass"><?=$memoitem['memo'];?></div>
					</div>
					<div class="bottom" alt="bottom"></div>
				</div>
			</div>
			<script>
			$( document ).ready(function() {
				$("#<?=$memoitem['memoid'];?>").css({"left": <?=$memoitem['posleft'];?>, "top": <?=$memoitem['postop'];?> });
			});
			$(document).ready(function () {
				$('.content<?=$memoitem['memoid'];?>').hide();
				$('.slide<?=$memoitem['memoid'];?>').click(function () {
				$('.content<?=$memoitem['memoid'];?>').slideToggle(200, function (){
					});
				});
			});
			
			</script>
			<?php }?>
		
<script>
//ask about event
var getStop = function(event, ui){
	var posTop = ui.position.top;
	var posLeft = ui.position.left;
	var memoId = $(this).attr("id");
	var submitpos = $.ajax({
		type: "POST", // HTTP method POST or GET
		url: "memo/memoposition/", //Where to make Ajax calls
		dataType:"text", // Data type, HTML, json etc.
		data:{"postop": posTop, "posleft":posLeft, "memoid":memoId} //post variables
	})
};
$( ".draggable" ).draggable({
	snap: true,
	containment:"parent",
	stack: ".draggable",
	snapTolerance: 10,
	grid: [ 210, 80 ],
	stop: getStop
});
</script>