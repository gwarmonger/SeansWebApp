<?php
$apikey = 'w96gmegw6ezzwcuf64cgkcyw';

// construct the query with apikey and query
$endpoint = 'http://api.rottentomatoes.com/api/public/v1.0/lists/dvds/new_releases.json?apikey=' . $apikey;

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
$dvds = $search_results->movies;
?>
<button id="showdvds"class="btn btn-primary submitbut btn-block greenback"><h4>New on DVD</h4></button>
<div class="newdvdcon dvdcon well well-lg">
<div class="row">
<?php foreach ($dvds as $dvd): ?>
	  <div class="col-md-3 indheight">
      <div class="caption">
         
      <center><button type="button" onclick="document.addform.submit()" class="btn btn-primary">Add to List</button></center>
        <h5><?=$dvd->title?></h5>
      </div>
    <center><img src="<?=$dvd->posters->profile?>" onClick="dvdmodal_<?=$dvd->id?>()" class="thumbnail"/></center>
  </div>
   
<?php endforeach; ?>
</div>
</div>
<script>
<?php foreach ($dvds as $dvd): ?>
var dvdmodal_<?=$dvd->id?> = function(){
$('#dvdmodal_<?=$dvd->id?>').modal('show')
}
<?php endforeach; ?>
</script>

<!-- Small modal -->
<?php foreach ($dvds as $dvd): ?>
<div id="dvdmodal_<?=$dvd->id?>"class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <h3><?=$dvd->title?></h3>
      <h4>Critic Concensus</h4>
      <p class="well well-lg"><?=$dvd->critics_consensus?></p>
      <h4>Synopsis</h4>
      <p class="well well-lg"><?=$dvd->synopsis?></p>
    </div>
  </div>
</div>
<?php endforeach; ?>

<script>
$(document).ready(function () {
        $('.dvdcon').hide();
        $('#showdvds').click(function () {
        $('.dvdcon').toggle( "puff" );
        });
      });
</script>
