<?php

// construct the query with apikey and query
$endpoint = 'http://api.nytimes.com/svc/movies/v2/reviews/all?order=by-date&api-key=fecfc4e3d5729f9d5b114758323d333d:4:69248206';
// setup curl to make a call to the endpoint
$session = curl_init($endpoint);

// indicates that we want the response back
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// exec curl and get the data back
$data = curl_exec($session);

// close curl session once finished retrieveing data
curl_close($session);

// decode json
//ask about the true attr 
$search_results = json_decode($data,true);

if ($search_results === NULL) die('Error parsing json');

// the data
$nycs = $search_results['results'];

//var_dump($nycs);
//var_dump($nprs);
?>

<div class="dropimage1">
	<button id="shownyc"class="btn btn-primary background1  btn-block"><h4>NY Times Movie Reviews</h4></button>
	<div class="nycont">
	<?php foreach ($nycs as $nyc): ?>
	<table class="table table-striped">
		<tr><td>
        <h4><center><?=$nyc['display_title']?></center></h4>
        <h5><?=$nyc['publication_date']?></h5>
     	<h5 class="justify"><?=$nyc['summary_short']?></h5>
     	<a href="<?=$nyc['link']['url'];?>">Full Article...</a>
     </tr></td>
     </table>
<?php endforeach; ?>

</div>
</div>

<script>
$(document).ready(function () {
        $('.nycont').hide();
        $('#shownyc').click(function () {
        $('.nycont').slideToggle(800, function (){
          });
        });
      });
</script>
