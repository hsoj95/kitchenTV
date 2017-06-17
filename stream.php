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

    <style>
        #loading-screen {
            background: #81d4fa;
            position: absolute;
            height: 100%;
            width: 100%;
            z-index: 1000;
        }

    </style>
</head>

<body>
    <div class="valign-wrapper" id="loading-screen" style="display: ;">
        <h1 class="center-align" style="position: absolute; left: 40%; top: 37%;">Loading K.TV</h1>
        <div class="progress" style="width: 80%; left: 10%">
            <div class="indeterminate"></div>

        </div>

    </div>
    <?php if($ipchecker==1){echo check_IP($ip);} ?>

    <div class="col1">
        <p><iframe id="ytplayer" width="100%" height="<?php echo $yt_height; ?>" src="https://www.youtube.com/embed/<?php echo $u; ?>?rel=0&amp;autoplay=1&amp;enablejsapi=1" frameborder="0" allowfullscreen></iframe>
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
                    <p class="i2"><img class="windicon" src="images/Wind.svg"><span class="windspeed"></span></p>
                    <div style="clear: both;"></div>
                </div>
            </div>


            <div style="clear: both;"></div>
        </div>

        <nav>
            <div class="nav-wrapper light-blue lighten-3 z-depth-0">
                <a href="#" class="brand-logo">K.TV<i class="material-icons right">schedule</i> </a>
            </div>

            <!-- Volume Buttons -->
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <div class="fixed-action-btn click-to-toggle" style="position: relative; bottom: 65px;">
                    <a href="#" class="btn-floating light-blue z-depth-0"><i class="material-icons">volume_mute</i></a>
                    <ul>
                        <li><a href="#" class="waves-effect btn-floating light-blue" id="vol100"><i class="material-icons">volume_up</i></a></li>
                        <li><a href="#" class="waves-effect btn-floating light-blue" id="vol50"><i class="material-icons">volume_down</i></a></li>
                        <li><a href="#" class="waves-effect btn-floating light-blue" id="vol20"><i class="material-icons">volume_mute</i></a></li>
                        <li><a href="#" class="waves-effect btn-floating light-blue" id="mute-toggle"><i class="material-icons">volume_off</i></a></li>
                    </ul>
                </div>
            </ul>

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
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>

    <script type="text/javascript">
        auto_volume();
        showNews(headlines);
        loadWeather(<?php echo $wdays.",'".$wloc."'"; ?>);

        //Delays loading screen until the page is fully loaded
        $(window).on("load", function() {
            $("#loading-screen").css("display", "none");
        })

    </script>

</body>

</html>

<?php
// EOF
?>
