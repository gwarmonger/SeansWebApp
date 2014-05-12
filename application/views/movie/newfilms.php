<?php
$apikey = 'w96gmegw6ezzwcuf64cgkcyw';

// construct the query with apikey and query
$endpoint = 'http://api.rottentomatoes.com/api/public/v1.0/lists/movies/in_theaters.json?apikey=' . $apikey;

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
$newmovies = $search_results->movies;?>
<script>
function getTheNew(movid){
  var selector = '#moviemodal_'+ movid; 
  $(selector).modal('show');   
  }
</script>
<button id="shownew"class="btn btn-primary submitbut btn-block greenback2"><h4>In Theaters</h4></button>
<div class="newdvdcon newmoviecon well well-lg">
<div class="row">
<?php foreach ($newmovies as $movie): ?>
    <div class="col-md-3">
      <div class="caption">
         
      <center><button class="btn btn-primary"value="<?=$movie->id?>" data-thumburl="<?=$movie->posters->thumbnail?>"data-title="<?=$movie->title ?>" data-toggle="modal" data-target="#addmovie">Add to Watch List</button></center>
        <h5><?=$movie->title?></h5>
      </div>
    <center><img src="<?=$movie->posters->profile?>" onClick="getTheNew('<?=$movie->id?>')" class="thumbnail"/></center>
  </div>
<?php endforeach; ?>
</div>
</div>

<!-- Small modal -->
<?php foreach ($newmovies as $movie): ?>
<div id="moviemodal_<?=$movie->id?>"class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <h3><?=$movie->title?></h3>
      <h4>Critic Concensus</h4>
      <p class="well well-lg"><?=$movie->critics_consensus?></p>
      <h4>Synopsis</h4>
      <p class="well well-lg"><?=$movie->synopsis?></p>
    </div>
  </div>
</div>
<?php endforeach; ?>

<script>
$(document).ready(function () {
$('.newmoviecon').hide();
$('#shownew').click(function () {
$('.newmoviecon').toggle( "puff" );
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
