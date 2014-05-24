<?php

// construct the query with apikey and query
$endpoint = 'http://api.npr.org/query?id=4467349&fields=title,storyDate,text,teaser,textWithHtml&output=JSON&apiKey=MDExMTM5NjU5MDEzNjQ3OTA3NzQ5Y2I1OQ001';
// setup curl to make a call to the endpoint
$session = curl_init($endpoint);

// indicates that we want the response back
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// exec curl and get the data back
$data = curl_exec($session);

// close curl session once finished retrieveing data
curl_close($session);

// decode json
 
$search_results = json_decode($data,true);

if ($search_results === NULL) die('Error parsing json');

// the data
$nprs = $search_results['list']['story'];
//var_dump($search_results);
//var_dump($nprs);
?>
<div class="container-fluid">
<div class="col-md-4 dropimage">
  <button id="shownpr"class="btn btn-primary btn-block background2"><h4>NPR Movie Articles</h4></button>
  <div class="nprcont">
  <?php foreach ($nprs as $npr):?>
	<table class="table table-striped">
    <tr><td>
  <h4><?=$npr['title']['$text'];?></h4>
	<h5><?=$npr['storyDate']['$text'];?><h5>
	<p><?=$npr['teaser']['$text'];?><p>
	<button class="btn btn-primary" onClick="artmodal_<?=$npr['id']?>()">Full Story</button>
  </tr></td>
  </table>
<?php endforeach; ?>

</div>


<script>
<?php foreach ($nprs as $npr): ?>
var artmodal_<?=$npr['id']?> = function(){
$("#artmodal_<?=$npr['id']?>").modal("show")
}
<?php endforeach; ?>
</script>


<!-- Large modal -->
<?php foreach ($nprs as $npr): 
 if(array_key_exists('textWithHtml', $npr)){
 $theitem = $npr['textWithHtml']['paragraph'];?>



<div id="artmodal_<?=$npr['id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <button onClick="$('#artmodal_<?=$npr['id']?>').modal('hide')"class="deletebut3">
    <span class="glyphicon glyphicon-remove"></span></button>
  <?php
  foreach($theitem as $item):?>
    <p><?=$item['$text'];?></p>
<?php endforeach;?>
       </div>
  </div>
</div>

<?php
}
endforeach; ?>
<script>
$(document).ready(function () {
        $('.nprcont').hide();
        $('#shownpr').click(function () {
        $('.nprcont').slideToggle(800, function (){
          });
        });
      });
</script>

