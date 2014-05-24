<div class="memotable">
	
<?php		
foreach ($memo as $memoitem)
{?>		
<div id="<?=$memoitem['memoid'];?>"class="expandable_note_box draggable pull-right">
	<div class="slide<?=$memoitem['memoid'];?> middle">
		<button id="item_<?=$memoitem['memoid'];?>" onClick="delMemo('<?=$memoitem['memoid']?>')"class="deletebut2">
		<span class="glyphicon glyphicon-remove"></span></button>
		<div class="inside"><h5><?=$memoitem['title'];?></h5>
			<button class="<?=$memoitem['memoid'];?> inside"><span class="glyphicon glyphicon-resize-vertical inside"></span></button>
		</div>
		<div class="inside">
			<div class="content<?=$memoitem['memoid'];?> memoclass"><?=$memoitem['memo'];?></div>
		</div>
		</div>
		<div class="bottom" alt="bottom"></div>
</div>

<script>
$( document ).ready(function() {
	$("#<?=$memoitem['memoid'];?>").css({"left": <?=$memoitem['posleft'];?>, "top": <?=$memoitem['postop'];?> });
});
$(document).ready(function () {
	$('.content<?=$memoitem['memoid'];?>').hide();
	$('.slide<?=$memoitem['memoid'];?>').click(function () {
	$('.content<?=$memoitem['memoid'];?>').slideToggle(800, function (){
		});
	});
});
</script>
<?php }?>
</div>
<script>
//ask about event
var getStop = function(event, ui){
	var posTop = ui.position.top;
	var posLeft = ui.position.left;
	var memoId = $(this).attr("id");
	var submitpos = $.ajax({
		type: "POST", 
		url: "memo/memoposition/", 
		dataType:"text",
		data:{"postop": posTop, "posleft":posLeft, "memoid":memoId} //post variables
	})
};
$( ".draggable" ).draggable({
	snap: true,
	containment:".corkboard",
	stack: ".draggable",
	snapTolerance: 10,
	grid: [ 183, 135 ],
	stop: getStop
});
function delMemo(memoid){
    var answer = confirm ("Are you sure you want delete this memo?");
    if (answer){
        $.ajax({
            url: "memo/deletememo/",
            type: "POST",
            data: { "memoid" : memoid },
            dataType: "html",
            success:function(){
            $('#item_'+memoid).remove();
            $('#thismemo_'+memoid).remove();
                } 
            });
            }
              }
</script>
</script>