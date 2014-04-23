<?php
$theterm = $_POST['term'];
$apikey = 'w96gmegw6ezzwcuf64cgkcyw';
$q = urlencode($theterm); //url encode query parameters

// construct the query with apikey and query
$endpoint = 'http://api.rottentomatoes.com/api/public/v1.0/movies.json?apikey=' . $apikey . '&q=' . $q;

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
$movies = $search_results->movies;

?>
<table class='table table-condensed table-striped'>
<?php foreach ($movies as $movie): ?>
<tr>
	<td><button class="btn btn-primary movmodal addmovielrg"value="<?=$movie->id?>" data-thumburl="<?=$movie->posters->thumbnail?>"data-title="<?=$movie->title ?>" data-toggle="modal" data-target="#addmovie">Add to Watchlist</button></td>
	<td>
		<h4><a href="<?=$movie->links->alternate?>"><?=$movie->title ?> (<?=$movie->year?>)</a></h4>
        
</br>
<?php if(property_exists($movie, 'critics_consensus')) { ?>
<p><?=$movie->critics_consensus?></p>
<?php } ?>
</td>
<td>
<p><span class="badge"><?=$movie->ratings->critics_score?></span></p>
</td>
<td>
<p><span class="badge"><?=$movie->ratings->audience_score?></span></p>
</td>
	<td><img src="<?=$movie->posters->thumbnail?>"class="img-thumbnail img-responsive"/></td>
</tr>
<?php endforeach; ?>
</table>
<script>
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
