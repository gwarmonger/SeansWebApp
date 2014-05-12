<table class="table table-striped table-bordered space">
	<tr>
<td><b>Title</b></td>
<td><b>Description</b></td>
</tr>
<?php foreach ($query as $dataitem): ?>
		<tr id="mainrow_<?=$dataitem['songid']?>">
		<audio ontimeupdate='updateprogress<?=$dataitem['songid']?>()'id='<?=$dataitem['songid']?>'src='<?=base_url();?>/uploads/<?=$dataitem['songurl']?>'></audio>
		<td><a href='' download='<?=$dataitem['songurl']?>'><?=$dataitem['songname']?></a></td>
		<td><?=$dataitem['songdesc']?></td>
		<td>
    		<button class='btn btn-primary' onclick="playaudio('<?=$dataitem['songid']?>')">
    			<span class='glyphicon glyphicon-play'></span>
    		</button>
    		<button class='btn btn-primary' onclick="pauseaudio('<?=$dataitem['songid']?>')">
				<span class='glyphicon glyphicon-pause'></span></button>
			</br>
			<progress id='seekbar<?=$dataitem['songid']?>' class="progressbar"value='0' max='1'></progress>
			</td>
			<td><button id="item_<?=$dataitem['songid']?>" onClick="delSong('<?=$dataitem['songid']?>')"class="deletebut">
    <span class="glyphicon glyphicon-remove"></span></button></td>
			</tr>
			<script type='text/javascript'>
	 		function playaudio(songid){
			document.getElementById(songid).play();
			}
			function pauseaudio(songid){
		 	document.getElementById(songid).pause();
			}
			var songid = "<?=$dataitem['songid']?>";
			function updateprogress<?=$dataitem['songid']?>(){
			var player = document.getElementById("<?=$dataitem['songid']?>");
			var progressbar = document.getElementById("seekbar<?=$dataitem['songid']?>");
			progressbar.value = (player .currentTime / player .duration);
 			};
 		 </script> 		
	<?php endforeach; ?>
</table>
</div> <!--opened in songupload.php-->

<script>
$(document).ready(function () {
    $('.sortable').sortable({
        axis: 'y',
        stop: function (event, ui) {
	        var data = $(this).sortable('serialize');
            $('span').text(data);
            /*$.ajax({
                    data: oData,
                type: 'POST',
                url: '/your/url/here'
            });*/
	}
    });
});
function delSong(songid){
    var answer = confirm ("Are you sure you want to remove this song?");
    if (answer){
        $.ajax({
            url: "songshare/songdelete/",
            type: "POST",
            data: { "songid" : songid },
            dataType: "html",
            success:function(){
            $("#mainrow_<?=$dataitem['songid']?>").remove();
                } 
            });
            }
              }
</script>
