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
                    <li><a href="headline.php">news<br><small>and headlines</small></a></li>
                    <li><a href="rules.html">rules<br><small>and regulations</small></a></li>
                    <li><a href="disclaimer.html">disclaimer<br><small>notice</small></a></li>
	            </ul>
            </div>
        </header>
        <div class="content1">
            <br>
                <h1>Headlines</h1>
                <div id="stocks">
                    <?php

                    include_once('db.php');

                    $sql = "SELECT * FROM news ORDER BY time;";
                    $res = mysqli_query($db, $sql);

                    ?>
                    
                    <?php date_default_timezone_set("Asia/Kolkata"); ?>
                    Last updated <?php echo date('d/m/y H:i:s'); ?><br>
                    
                    <table>
                        <tr>
                            <th>Time</th>
                            <th>News</th>
                        </tr>
                        <?php
                        while($ar = mysqli_fetch_array($res)) {
                            $time = $ar['time'];
                            $content = $ar['content'];
                            $string = "<tr>
                                <td>$time</td>
                                <td>$content</td>
                            </tr>\n";
                            print($string);
                        }
                        ?>
                    </table>
                </div>
            <br>
            <br>
        </div>
        <footer>
            <div class="foot">
                <br>&copy; Infinnovation'16.<br>Made with <span class="heart">&hearts;</span> and JavaScript.<br><br>
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <script async src="base.js"></script>
    </body>
</html>
