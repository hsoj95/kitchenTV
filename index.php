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
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
    <style>
        #div_iframe {
            overflow: hidden;
            border-bottom: 1px solid #000000;
            height: 484px;
            width: 100%
        }
        
        #ytplayer {
            width: 100%;
            height: 1000%;
            /* 10x the div height to embrace the whole page */
            overflow: hidden;
            !important
        }
        
        #loading-screen {
            background: #81d4fa;
            position: absolute;
            height: 100%;
            width: 100%;
            z-index: 1000;
        }

    </style>

    <script type="text/javascript">
        // PHP dependant js vars ~
        // page udate after t seconds
        setTimeout(function() {
            document.forms["poster"].submit();
        }, <?php echo $t; ?>);
        // volume ON/OFF morning/evening
        var on, off, vol = <?php echo $vol; ?>;
        // bbc headlines 
        var headlines = [<?php echo getHeadlines(); ?>];

    </script>
</head>

<body>
<<<<<<< HEAD
    <!-- Loading Screen -->
    <div class="valign-wrapper" id="loading-screen" style="display: ;">
        <h1 class="center-align" style="position: absolute; left: 40%; top: 37%;">Loading K.TV<i class="medium material-icons right">schedule</i></h1>
=======
   <div class="valign-wrapper" id="loading-screen" style="display: ;">
        <h1 class="center-align" style="position: absolute; left: 40%; top: 37%;">Loading K.TV<i class="medium material-icons right">schedule</i></h1>
        <!-- <div class="progress" style="width: 80%; left: 10%">
            <div class="indeterminate"></div> -->
>>>>>>> origin/Improved-Code-with-Revisions

        <div class="preloader-wrapper big active" style="left: 48%;">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>

    </div>

    <?php if($ipchecker==1){echo check_IP($ip);} ?>

    <div class="col1">
        <p>
            <div id="div_iframe"><iframe id="ytplayer" src='<? echo $wupage; ?>'></iframe></div>
        </p>

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
                    <p class="i2"><img class="windicon" src="images/Wind.svg"><span class="windspeed"></span></p>
                    <div style="clear: both;"></div>
                </div>
            </div>


            <div style="clear: both;"></div>
        </div>
        <nav>
            <div class="nav-wrapper light-blue lighten-3 z-depth-0">
                <a href="#" class="brand-logo">&nbsp;&nbsp;K.TV<i class="material-icons right">schedule</i> </a>
            </div>

            <!-- Channel Buttons -->
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li>
                    <div class="fixed-action-btn click-to-toggle" style="position: relative; bottom: 65px;">
                        <a href="#" class="btn-floating light-blue z-depth-0"><i class="material-icons">ondemand_video</i></a>
                        <ul>
                            <?php
                            foreach($streams as $key => $value){
                                ?>
                                <li>
                                    <a href="stream.php?s=<?php echo $key; ?>&amp;mus=<?php echo $streams[$key]['mus']; ?>" class="waves-effect btn-floating light-blue">
                                        <?php echo $streams[$key]['name']; ?>
                                    </a>
                                </li>
                                <?php
                            $s++;
                            }
                            ?>
                        </ul>
                    </div>
                </li>
            </ul>

            <!-- Home and Search Buttons -->
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <div class="fixed-action-btn click-to-toggle" style="position: relative; bottom: 65px;">
                    <a href="#" class="btn-floating light-blue z-depth-0"><i class="material-icons">web</i></a>
                    <ul>
                        <li><a href="web_browse.php" class="waves-effect btn-floating light-blue"><i class="material-icons">search</i></a></li>
                        <li><a href="index.php" class="waves-effect btn-floating green"><i class="material-icons">home</i></a></li>
                    </ul>
                </div>
            </ul>
        </nav>
    </div>

    <div class="col2 <?php echo bg('col2'); ?>">

        <!-- Digital Clock in Materialize card -->
        <div class="row">
            <div class="col s12">
                <div class="card grey darken-3">
                    <div class="center-align card-content white-text">
                        <span class="card-title big" id="dc"><br /></span>
                        <p>
                            <span id="date"><?php echo $date; ?></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Canvas Clock -->
        <a href="javascript:;" onclick="document.forms['poster'].submit();">
            <div class="clocks">
                <canvas id="canvas" width="500" height="500"></canvas>
            </div>
        </a>

        <!-- News Feed -->
        <div id="news"></div>

        <!-- Weather Alert in Materialize card -->
        <div class="row" style="display: initial;">
            <div class="col s12">
                <div id="alert-card" class="card darken-3">
                    <div class="card-content white-text">
                        <span class="card-title">Weather Alert!<!--<i class="material-icons right small pulse">warning</i>--></span>
                        <a href="<? echo $wupage; ?>" class="btn-floating waves-effect waves-light red pulse" style="position: absolute; left: 85%; bottom: 45%;" target="_blank"><i class="material-icons">warning</i></a>
                        <p>
                            <?php echo wu_advisory($wupage); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>

    <script type="text/javascript">
        auto_volume();
        showNews(headlines);
        loadWeather(<?php echo $wdays.",'".$wloc."'"; ?>);

        /*For use with Ad-block DISABLED*/
        document.getElementById('div_iframe').scrollTop = 158;

        /*For use with Ad-block ENABLED*/
        //document.getElementById('div_iframe').scrollTop = 58;

        //Delays loading screen until the page is fully loaded
        $(window).on("load", function() {
            $("#loading-screen").css("display", "none");
        });

        <? echo wu_advisory_color($wupage); ?>

    </script>

</body>

</html>

<?php
// EOF
?>
