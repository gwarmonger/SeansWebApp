<?php
$apikey = 'w96gmegw6ezzwcuf64cgkcyw';

// construct the query with apikey and query
$endpoint = 'http://api.rottentomatoes.com/api/public/v1.0/lists/movies/upcoming.json?apikey=' . $apikey;

// setup curl to make a call to the endpoint
$session = curl_init($endpoint);

// indicates that we want the response back
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// exec curl and get the data back
$data = curl_exec($session);

// close curl session once finished retrieveing data
curl_close($session);

// decode json
$search_results = json_decode($data);
if ($search_results === NULL) die('Error parsing json');

// the data
$ups = $search_results->movies;
?>
<button id="showupcoming"class="btn btn-primary submitbut btn-block greenback3"><h4>Coming Soon</h4></button>
<div class="newdvdcon newupcon well well-lg">
<div class="row">
<?php foreach ($ups as $up): ?>
	  <div class="col-md-3">
      <div class="caption">
         
      <center><button type="button" onclick="document.addform.submit()" class="btn btn-primary">Add to List</button></center>
        <h5><?=$up->title?></h5>
      </div>
    <center><img src="<?=$up->posters->profile?>" onClick="upmodal_<?=$up->id?>()" class="thumbnail"/></center></div>
   
<?php endforeach; ?>
</div>
</div>
<script>
<?php foreach ($ups as $up): ?>
var upmodal_<?=$up->id?> = function(){
$('#upmodal_<?=$up->id?>').modal('show')
}
<?php endforeach; ?>
</script>

<!-- Small modal -->
<?php foreach ($ups as $up): ?>
<div id="upmodal_<?=$up->id?>"class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <h3><?=$up->title?></h3>
      <h4>Synopsis</h4>
      <p class="well well-lg"><?=$up->synopsis?></p>
    </div>
  </div>
</div>
<?php endforeach; ?>

<script>
$(document).ready(function () {
        $('.newupcon').hide();
        $('#showupcoming').click(function () {
        $('.newupcon').slideToggle(200, function (){
          });
        });
      });
</script>
