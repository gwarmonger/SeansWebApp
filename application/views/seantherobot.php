<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sean the Robot</title>
    <meta name="description" content="Mp3s and streaming tracks from Sean the Robot, the digital musician and creator and maintainer of Monk Bunker.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="<?=base_url();?>js/audiojs/audio.min.js"></script>
    <link href="http://fonts.googleapis.com/css?family=Cutive+Mono" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?=base_url();?>css/index.css" media="screen">
    <link rel="stylesheet" href="<?=base_url();?>css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="<?=base_url();?>css/mainstyle.css" media="screen">
    <script>
    audiojs.events.ready(function() {
    audiojs.createAll();
    });
    </script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41012984-2', 'monkbunker.com');
  ga('send', 'pageview');

    </script>
</head>
<body>
    <div class="container-fluid maincontainer">
       <div class="row headerRow">
        <div class="col-md-8">
            <img src="<?=base_url();?>images/studioheader.jpg" class="img-responsive" alt="Picture of studio"/>
        </div>
        <div class="col-md-2">
            <h3 class="thefont whitecolor">Sean is the monk.</h3>
            <h3 class="thefont whitecolor">This is his bunker.</h3>
        </div>
        <div class="col-md-2">
            <h3 class="thefont2 darkredcolor"><a href='<?=base_url("index.php/")?>'>Monkbunker.com</a></h3>
        </div>
        </div>
        <div class="container innerwrapper">
            <div class="row">
                <div class="col-md-12 well well-sm">
                <h5 class="thefont">These are electronic music songs I have made over the last 10 years. They are made on various equipments, mostly Cubase DAW for midi sequencing and audio processing along with a variety of software and hardware sound modules.
                </br>
                   <h4 class="whitecolor thefont">-Sean the Robot</h4> 
                </h5>
            </div>
        </div>
        <div class="row">
        <div class="col-md-6">
            <h4 class="whitecolor thefont well well-sm">These songs have vocals.</h4>
            <div class="songcontainer well">
                <p class="whitecolor">This is Sean the Robot on vocals. Kraftwerkesque.</p>
                
                <a href="<?=base_url();?>/songs/Sean_the_Robot-This_is_the_Beat.mp3" download><span class="glyphicon glyphicon-save"></span>This is the Beat</a>
                <audio src="<?=base_url();?>/songs/Sean_the_Robot-This_is_the_Beat.mp3" preload="none"></audio>
            </div>
            <div class="songcontainer well">
                <p class="whitecolor">The fantasy song. It's fantastical. My friend Colin on vocals.</p>
                <a href="<?=base_url();?>/songs/Sean_the_Robot-Fantasy.mp3" download><span class="glyphicon glyphicon-save"></span>Fantasy</a>
                <audio src="<?=base_url();?>/songs/Sean_the_Robot-Fantasy.mp3" preload="none"></audio>
            </div>
            <div class="songcontainer well">
                <p class="whitecolor">I downloaded these vocals from a site, Looperman. It has an accapella section that people post vocals on (and it is NO easy task to find internet vocals that won't make your ears bleed). I would credit the person but I have no idea what the username is. </p>
                <a href="<?=base_url();?>/songs/Sean_the_Robot-The_Path.mp3" download><span class="glyphicon glyphicon-save"></span>The Path</a>
                <audio src="<?=base_url();?>/songs/Sean_the_Robot-The_Path.mp3" preload="none"></audio> 
            </div>
            </div>
            <div class="col-md-6">
            <h4 class="whitecolor thefont well well-sm">Experimental stuff</h4>
            <div class="songcontainer well">
                <p class="whitecolor">Weird swirly synthesizers. Crazy breakbeaty drums.</p>
                <a href="<?=base_url();?>/songs/Sean_the_Robot-Electric_Sheep_Have_No_Feelings.mp3" download><span class="glyphicon glyphicon-save"></span>Electric Sheep Have No Feelings</a>
                <audio src="<?=base_url();?>/songs/Sean_the_Robot-Electric_Sheep_Have_No_Feelings.mp3" preload="none"></audio>
            </div>
            <h4 class="whitecolor thefont well well-sm">Breakbeat kind of stuff</h4>
            <div class="songcontainer well">
                <p class="whitecolor">House Track. Some piano and synths.</p>
                <a href="<?=base_url();?>/songs/Sean_the_Robot-Trancy_Song.mp3" download><span class="glyphicon glyphicon-save"></span>Trancy Song</a>
                <audio src="<?=base_url();?>/songs/Sean_the_Robot-Trancy_Song.mp3" preload="none"></audio>
            </div>
            </div>
            </div>
        </div>
            <div class="footer">
                <div class="col-md-offset-1">
                    <h3>Sean Anderson, Contact:<a href="mailto:ander562@uwm.com">ander562@uwm.edu</a></h3>
                </div>
            </div>
            
        </div>
    </body>
</html>