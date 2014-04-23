<div id="containermain">
<div class="container">

<div class='col-xs-5 col-sm-2 list-group-item list-header'><b>Title</b></div>
<div class='col-xs-6 col-sm-3 list-group-item list-header'><b>Description</b></div>
</div>
		
<?php
foreach ($query as $dataitem):
?>
	 
	<ul id='setname_number'class='container' style='list-style:none; border-bottom:1px #BACCEE solid;'>
		<audio ontimeupdate='updateprogress<?=$dataitem->songid?>()'id='<?=$dataitem->songid?>'src='<?=$dataitem->url?>'></audio>
		<li class='col-xs-5 col-sm-2'><a href='' download='<?=$dataitem->url?>'><?=$dataitem->title?></a></li>
		<li class='col-xs-6 col-sm-3'><?=$dataitem->description?></li>
		<li class='col-xs-6 col-sm-3'><div id='playercontainer'>
    		<button class='btn btn-primary' onclick='playaudio('<?=$dataitem->songid?>')'>
    			<span class='glyphicon glyphicon-play'></span>
    		</button>
    		<button class='btn btn-primary' onclick='pauseaudio('<?=$dataitem->songid?>')'>
				<span class='glyphicon glyphicon-pause'></span></button>
		</br>
			<progress id='seekbar<?=$dataitem->songid?>' value='0' max='1' style='height:34px; width:80px'></progress>
			</li>
	</ul>

			<script type='text/javascript'>
	 		function playaudio(songid){
			document.getElementById(songid).play();
			}
			function pauseaudio(songid){
		 	document.getElementById(songid).pause();
			}
			var songid = '<?=$dataitem->songid?>';
			console.log(songid);
			function updateprogress<?=$dataitem->songid?>(){
			var player = document.getElementById('<?=$dataitem->songid?>');
			var progressbar = document.getElementById('seekbar<?=$dataitem->songid?>');
			progressbar.value = (player .currentTime / player .duration);
 			};
 		 </script>
	<?php endforeach; ?>


</div>
