<?php
include_once('db.php');

$sector = "";
if(isset($_GET['sector'])) {
    $sector = mysqli_escape_string($db, $_GET['sector']);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Infinnovation Stock Exchange Simulator</title>
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
                    <h1>Infinnovation<br>Stock Exchange Simulator<br/><span id="tagline">&quot;Infi-Invest&quot;</span></h1>
                    <br/>
                </div>
            </div>
            <div class="navbar">
	            <ul>
                    <li id="togglemenu"><a href="#menu" id="menubutton">&equiv;</a></li>
                    <li id="flogo"><a class="flogolink">infinnovation<br><small>stock-exchange-simulator</small></a></li>
                    <li><a href="/">stocks overview<br><small>home</small></a></li>
                    <li><a href="detail.php">stocks in detail<br><small>more details</small></a></li>
                    <li><a href="headline.php">news<br><small>and headlines</small></a></li>
                    <li><a href="rules.html">rules<br><small>and regulations</small></a></li>
                    <li><a href="disclaimer.html">disclaimer<br><small>notice</small></a></li>
	            </ul>
            </div>
        </header>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <script async src="base.js"></script>
        <div class="content1">
            <br>
                <pre class="sector"><?php if(strcmp($sector, "") == 0) { echo "All Sectors"; } else { echo $sector." Sector"; } ?></pre>
                <?php
            
                $sql = "SELECT * FROM stocks WHERE sector='$sector' ORDER BY name;";
                if(strcmp($sector, "") == 0) {
                    $sql = "SELECT * FROM stocks ORDER BY sector, name;";
                }
                $res = mysqli_query($db, $sql);
                
                $stocknamelist = array();
                // loop each stock name in the sector
                    while($ar = mysqli_fetch_array($res)) {
                        $name = $ar['name'];

                        $stocknamelist[] = $name;

                        $current = $ar['current'];
                        $difference = $ar['difference'];
                        $percentage = $ar['percentage'];
                        $profile = $ar['profile'];

                        $pclose = $ar['pclose'];
                        $ovalue = $ar['ovalue'];
                        $ucircuit = $ar['ucircuit'];
                        $lcircuit = $ar['lcircuit'];
                        $dividend = $ar['dividend'];
                        $bvalue = $ar['bvalue'];

                        $string = "<h1 id=\"$name\">$name</h1>
                        <p id=\"summary $name\">$profile<br><br><strong>Previous Close:</strong> $pclose<br><strong>Open Value:</strong> $ovalue<br><strong>Lower Circuit:</strong> $lcircuit<br><strong>Upper Circuit:</strong> $ucircuit<br><strong>Dividend:</strong> $dividend<br><strong>Book Value:</strong> $bvalue</p>
                        <canvas id=\"chart $name\" class=\"graph\"></canvas>
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
        <script>
            var main = function() {
                <?php
                // loop each stock name in the sector
                foreach($stocknamelist as $name) {
                    $sql = "SELECT * FROM updates WHERE name='$name';";
                    $res = mysqli_query($db, $sql);

                    $timear = array();
                    $currentar = array();

                    // loop each update of current stock
                    while($ar = mysqli_fetch_array($res)) {
                        $timear[] = $ar['time'];
                        $currentar[] = $ar['current'];
                    }

                    $timestr = json_encode($timear);
                    $currentstr = json_encode($currentar);

                    print("chartGenerate('$name', $timestr, $currentstr);\n");
                    
                    // append values of the highest and lowest values of the stock to the existing summary p
                    $calc = array();
                    foreach($currentar as $values) {
                        $calc[] = intval($values);
                    }
                    $max = max($calc);
                    $min = min($calc);
                    
                    print("document.getElementById(\"summary $name\").innerHTML = document.getElementById(\"summary $name\").innerHTML + \"<br><strong>Highest Value:</strong>$max<br><strong>Lowest Value:</strong>$min<br><br>\";");
                }
                ?>
            };
            $(document).ready(main);
        </script>
        <footer>
            <div class="foot">
                <br>&copy; Infinnovation.<br>
                <small>For more information refer to the <a href="https://github.com/DPSN/infinnovation-stock-exchange-simulator/blob/master/LICENSE.MD">software license terms</a> associated with this project.</small><br><br>
            </div>
        </footer>
    </body>
</html>
