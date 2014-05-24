<?php

// construct the query with apikey and query
$endpoint = 'http://api.npr.org/query?id=1091,1003,1004&fields=title,teaser,storyDate,text,audio,image,textWithHtml&output=JSON&apiKey=MDExMTM5NjU5MDEzNjQ3OTA3NzQ5Y2I1OQ001';
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
$nprs = $search_results['list']['story'];
//var_dump($search_results);
//var_dump($nprs);
?>
<div class="container">
	<div class="row">
	<h4>Hello <?=$username ?></h4>
	<div class="col-md-8">
		<h3>More Homepage stuff coming soon!!!</h3>
	</div>
	<div class="col-md-4">
		<div class="well mainwell">
	<h3>Latest NPR News</h3>	
	<?php foreach ($nprs as $npr):
	?>
	<h5>"<?=$npr['title']['$text'];?>"<h5>
	<h6><?=$npr['storyDate']['$text'];?><h6>	
	<h6><?=$npr['teaser']['$text'];?></h6>	
    <?php $theitem = $npr['link']['0']['$text'];?>
     
    <a href="<?=$theitem?>"><p>Full Story...</p></a>
	<?php endforeach; ?>
</div>
</div>
</div>
</div>
