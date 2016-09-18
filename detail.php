<?php
if(!isset($_GET['sector'])) {
    die();
}
$sector = $_GET['sector'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Infinnovation'16 Stock Exchange Simulator</title>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="style.css" type="text/css" />
        <meta name="theme-color" content="#336">
    </head>
    <body>
        <header>
            <div class="wrapper">
                <div class="header">
                    <br/>
                    <div id="imageatr"><img src="images/logo.png"></div>
                    <h1>Infinnovation<br>Stock Exchange Simulator <sup><small id="beta">&nbsp;beta&nbsp;</small></sup><br/><span id="tagline">&quot;infi-Invest&quot;</span></h1>
                    <br/>
                </div>
            </div>
            <div class="navbar">
	            <ul>
                    <li id="togglemenu"><a href="#menu" id="menubutton">&equiv;</a></li>
                    <li id="flogo"><a class="flogolink">infinnovation<br><small>stock-exchange-simulator</small></a></li>
                    <li><a href="/">stocks overview<br><small>home</small></a></li>
                    <li><a href="detail.php">stocks in detail<br><small>more details</small></a></li>
                    <li><a href="rules.html">rules<br><small>and regulations</small></a></li>
                    <li><a href="disclaimer.html">disclaimer<br><small>notice</small></a></li>
	            </ul>
            </div>
        </header>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <script async src="base.js"></script>
        <div class="content1">
            <br>
                <?php

                include_once('db.php');

                $sql = "SELECT * FROM stocks WHERE sector='$sector';";
                $res = mysqli_query($db, $sql);
                
                $stocknamelist = array();
            
                while($ar = mysqli_fetch_array($res)) {
                    $name = $ar['name'];
                    
                    $stocknamelist[] = $name;
                    
                    $current = $ar['current'];
                    $difference = $ar['difference'];
                    $percentage = $ar['percentage'];
                    $profile = $ar['profile'];
                    $string = "<h1>$name</h1>
                    <p>$profile</p>
                    <canvas id=\"$name\"></canvas>
                    <br>
                    <br>";
                    print($string);
                }
                ?>
            <br>
            <br>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
        <script src="chartjsinit.js"></script>
        <script async>
            chart('TCS', ['18/09/16 01:03', '18/09/16 01:07', '18/09/16 01:09', '18/09/16 02:03', '18/09/16 02:06', '18/09/16 02:09', '18/09/16 03:03'], [1200, 1900, 3000, 1700, 6000, 3000, 700]);
            chart('HDFC Bank', ['18/09/16 01:03', '18/09/16 01:07', '18/09/16 01:09', '18/09/16 02:03', '18/09/16 02:06', '18/09/16 02:09', '18/09/16 03:03'], [1200, 2900, 7000, 1200, 19000, 900, 800]);
        </script>
        <footer>
            <div class="foot">
                <br/>&copy; Infinnovation'16.<br/>Made with <span class="heart">&hearts;</span> and JavaScript.<br/><br/>
            </div>
        </footer>
    </body>
</html>
