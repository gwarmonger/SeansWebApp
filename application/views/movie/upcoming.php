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
$ups = $search_results->movies;?>
<script>
function getTheUp(movid){
  var selector = '#upmodal_'+ movid; 
 $(selector).modal('show');   
  }
</script>
<button id="showupcoming"class="btn btn-primary submitbut btn-block greenback3"><h4>Coming Soon</h4></button>
<div class="newdvdcon newupcon well well-lg">
<div class="row">
<?php foreach ($ups as $up): ?>
	  <div class="col-md-3">
      <div class="caption">
         
      <center><button class="btn btn-primary"value="<?=$up->id?>" data-thumburl="<?=$up->posters->thumbnail?>"data-title="<?=$up->title ?>" data-toggle="modal" data-target="#addmovie">Add to Watch List</button></center>
        <h5><?=$up->title?></h5>
      </div>
    <center><img src="<?=$up->posters->profile?>" onClick="getTheUp('<?=$up->id?>')" class="thumbnail"/></center></div>
   
<?php endforeach; ?>
</div>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>

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
$('.newupcom').hide();
$('#showupcoming').click(function () {
$('.newupcon').toggle( "puff" );
});
});
$(document).ready(function(){
$("button").click(function(){
  var theid = $(this).val();
  var thetitle = $(this).data('title');
  var thumburl = $(this).data('thumburl');
$("#movieid").attr("value", theid );
$("#title").attr("value", thetitle );
$("#thumburl").attr("value", thumburl );
});
});
</script>
