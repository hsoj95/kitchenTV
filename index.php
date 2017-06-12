<?php
require_once("config.php");
require_once("inc_library.php");
?>
<html>
<head>
    <meta charset="utf-8">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,inherit,400" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="weather.css">
    <link rel="stylesheet" href="main.css">
    <style>
    	#div_iframe {
  	    overflow: hidden;
	    border-bottom: 1px solid #000000;
  	    height: 500px;
  	    width: 100%
	    }
	    #ytplayer {
 	    width: 100%;
 	    height: 1000%;   /* 10x the div height to embrace the whole page */
	    overflow: hidden;
	    }
	    #digi {
	    left: 1530px;
	   }
	   #dc {
	    left: 0.2em;
	   }
	   #date {
	     left: 15px;
	   }
    </style>

    <script type="text/javascript">
        // PHP dependant js vars ~
        // page udate after t seconds
        setTimeout(function(){ document.forms["poster"].submit(); }, <?php echo $t; ?>);
        // volume ON/OFF morning/evening
        var on, off, vol = <?php echo $vol; ?>;
        // bbc headlines 
        var headlines =[<?php echo getHeadlines(); ?>];

    </script>
</head>

<body>
<?php if($ipchecker==1){echo check_IP($ip);} ?>

    <div class ="col1">
        <p><div id="div_iframe"><iframe id="ytplayer" src='https://www.wunderground.com/cgi-bin/findweather/getForecast?query=31733'></iframe></div>
        </p>
        <span id="digi">
            <span id="dc"></span><br />
            <span id="date"><?php echo $date; ?></span>
        </span>

        <div class="weather">
            <div class="w_left">
                <p class="temperature"></p>
                <p class="location"></p>
		<p class="updated"></p>
            </div>
            <div class="w_right">
                <div class="climate_bg"></div>
                <p class="forecast"></p>
                
                <div class="info_bg"> 
                    <p class="i1"><img class="dropicon" src="images/Droplet.svg"><span class="humidity"></span></p>       
                    <p class="i2"><img class="windicon" src="images/Wind.svg"><span  class="windspeed"></span></p>
                    <div style="clear: both;"></div>
                </div>
            </div>
    
            
            <div style="clear: both;"></div>
        </div>
            
               <ul class="vid">
                <li>Streams</li>
                <?php
                foreach($streams as $key => $value){
                    ?>
                <a href="index.php?s=<?php echo $key; ?>&amp;mus=<?php echo $streams[$key]['mus']; ?>"><li class="btn2<?php echo isPlaying($key); ?><?php echo isNews($streams[$key]['time']/$m); ?>"><?php echo $streams[$key]['name']; ?></li></a>
                <?php
                $s++;
                }
                ?>
            </ul>
		
		<ul class="vid">
		<li>Search</li>
                <a href="web_browse.php"><li class="btn2">www</li></a>
                </ul>

        </div>
  
    </div>


    <div class="col2 <?php echo bg('col2'); ?>">
        <a href="javascript:;" onclick="document.forms['poster'].submit();">
            <div class="clocks">
                <canvas id="canvas" width="500" height="500"></canvas>
            </div>
        </a>

        <div id="news"></div>

    </div>
    <div style="clear: both;"></div>

    <form id="poster" method="post" action="index.php?s=<?php echo $next; ?>">
        <input type="hidden" id="f_vol" name="f_vol" value="<?php echo $vol; ?>" />
        <input type="hidden" id="mus" name="mus" value="<?php echo $mus; ?>" />
    </form>

    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="jquery-2.2.3.min.js"></script>
    <script src="jquery.simpleWeather.min.js"></script>
    <script src="weather.js"></script>
    <script src="jsclock.js"></script>
    <script src="library.js"></script>

    <script type="text/javascript">    
        auto_volume();
        showNews(headlines);
        loadWeather(<?php echo $wdays.",'".$wloc."'"; ?>);

	/*For use with Ad-block DISABLED*/
	document.getElementById('div_iframe').scrollTop = 158;

	/*For use with Ad-block ENABLED*/
	//document.getElementById('div_iframe').scrollTop = 58;
    </script>
    
</body>
</html>

<?php
// EOF
?>