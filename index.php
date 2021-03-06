<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Infinnovation Stock Exchange Simulator</title>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="style.css" type="text/css" />
        <meta name="theme-color" content="#336">
        <meta name="author" content="SwG Ghosh">
        <meta name="description" content="Infinnovation Virtual Stock Exchange Simulator. The stock exchange simulator app for participants of Infinnovation's Infi-Invest.">
        <meta name="og:image" content="https://www.infinnovation.co/simulatorlandscape.png">
        <meta name="og:url" content="https://stockexchangesimulator.infinnovation.co/">
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
        <div class="content1">
            <br>
                <div id="stocks">
                    <noscript>
                        <?php include('stocktable.php'); ?>
                    </noscript>
                </div>
            <br><div id="hidden"></div>
            <br>
        </div>
        <footer>
            <div class="foot">
                <br>&copy; Infinnovation.<br>
                Designed and Developed by <a href="https://facebook.com/swghosh" target="_blank" onclick="window.open('https://www.github.com/swghosh');">Swarup Ghosh</a>.<br>
                <small>For more information refer to the <a href="https://github.com/DPSN/infinnovation-stock-exchange-simulator/blob/master/LICENSE.MD">software license terms</a> associated with this project.</small><br>
                <a href="https://twitter.com/SwG_Ghosh" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @SwG_Ghosh</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script><br><br>
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <script async src="base.js"></script>
        <script src="stockupdate.js"></script>
    </body>
    <script>
        populateStocksInit();
        setInterval(populateStocksLater, 10000);
    </script>
</html>
