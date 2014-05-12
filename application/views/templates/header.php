<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="The web application portfolio of recent University of Wisconsin graduate Sean Anderson">
		<link href='<?=base_url();?>fonts/alwaysforever.ttf' rel='stylesheet' type='text/css'>
	<link href='<?=base_url();?>fonts/linowrite.ttf' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Trocchi' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?=base_url();?>css/normalize.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?=base_url();?>css/bootstrap.css" type="text/css" media="screen" />
	<link rel="stylesheet" class="change" href="<?=base_url();?>css/main.css" type="text/css" media="screen" />
	<script type="text/javascript" src="<?=base_url();?>js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="<?=base_url();?>js/jquery-ui-1.10.4.custom.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>js/bootstrap.js"></script>

<title>The Monk Bunker</title>

</head>

<?php 
	$welcomings = array(
		'"If you want to survive out here, you\'ve got to know where your towel is" - <span class="author">Ford Prefect</span>',
		'"So long, and thanks for all the fish!" - <span class="author">The Hitchhiker\'s Guide to the Galaxy</span>',
		'"Don\'t cry because it\'s over, smile because it happened." - <span class="author">Dr. Seuss</span>',
		'"Be yourself; everyone else is already taken." - <span class="author">Oscar Wilde</span>',
		'"You know you\'re in love when you can\'t fall asleep because reality is finally better than your dreams." - <span class="author">Dr. Seuss</span>',
		'"Be the change that you wish to see in the world." - <span class="author">Mahatma Gandhi</span>',
		'"If you tell the truth, you don\'t have to remember anything." - <span class="author">Mark Twain</span>',
		'"A friend is someone who knows all about you and still loves you." - <span class="author">Elbert Hubbard</span>',
		'"Always forgive your enemies; nothing annoys them so much." - <span class="author">Oscar Wilde</span>', 
		'"I am so clever that sometimes I don\'t understand a single word of what I am saying." - <span class="author">Oscar Wilde</span>',
		'"Thurdays. I could never get the hang of Thursdays." - <span class="author">Arthur Dent</span>',
		'"Darkness cannot drive out darkness: only light can do that. Hate cannot drive out hate: only love can do that." - <span class="author">Martin Luther King, Jr.</span>',
);
	$rand_keys = array_rand($welcomings, 2);
	$thephrase = $welcomings[$rand_keys[0]]; 
?>
<body>

	<nav id="mainheader" class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div id="topheader">
    	<div class="col-md-6 sidecontainer"><h4 class="monktext">The Monk Bunker</h4></div>
    	<div class="col-md-6"></div>
    	<div class="col-md-6"></div>	
    	<div class="quote marpad col-md-6 pull-right">
		<img class="pull-left headerimage" src="<?=base_url();?>images/header-border-left.png"/>
		<div class="phrasetext"><?=$thephrase?></div> 
    	
		</div>
  
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button> 
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav font margintop">
      	 <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      About Me<span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <li><a id="link4" href="<?=base_url('index.php/aboutme');?>">Profile</a></li>
      <li><a id="link4" href="<?=base_url('index.php/seantherobot');?>">My Music</a></li>
    </ul>
  </li>
        <?php if ($this->tank_auth->is_logged_in()) {?>
        <?="<li><a id='link1' href='".base_url("index.php/songshare")."'>Song Storage</a></li>";?>
        <?="<li><a id='link2' href='".base_url("index.php/memo")."'>Memo</a></li>";?>
        <?="<li><a id='link3' href='".base_url("index.php/movie")."'>Movie</a></li>";}
    else{?>
    	<?="<li><a id='link5' href='".base_url("index.php/auth/register")."'>Register</a></li>";?>
    	<?="<li><a id='link6' href='".base_url("index.php/auth/login")."'>Login</a></li>";}?>
       </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </div>
</nav>

<script>
//script for nav bar active select
var url = window.location;
$('ul.nav a[href="'+ url +'"]').parent().addClass('active');
$('ul.nav a').filter(function() {
    return this.href == url;
}).parent().addClass('active');

</script>
<div class="container-fluid">