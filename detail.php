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
                <h1>TCS</h1>
                <p>Tata Consultancy Services Limited (TCS) is an Indian multinational information technology (IT) service, consulting and business solutions company headquartered in Mumbai, Maharashtra. It is a subsidiary of the Tata Group and operates in 46 countries. TCS is one of the largest Indian companies by market capitalization ($80 billion). TCS is now placed among the ‘Big 4’ most valuable IT services brands worldwide. In 2015, TCS is ranked 64th overall in the Forbes World's Most Innovative Companies ranking, making it both the highest-ranked IT services company and the first Indian company. It is the world's 10th largest IT services provider, measured by the revenues. As of December 2015, it is ranked 10th on the Fortune India 500 list.</p>
                <canvas id="TCS"></canvas>
                <br>
                <br>
                <h1>HDFC Bank</h1>
                <p>HDFC Bank is an Indian banking and financial services company headquartered in Mumbai, Maharashtra. It has about 76,286 employees including 12,680 women and has a presence in Bahrain, Hong Kong and Dubai. HDFC Bank is the second largest private bank in India as measured by assets. It is the largest bank in India by market capitalization as of February 2016. It was ranked 69th in 2016 BrandZTM Top 100 Most Valuable Global Brands.</p>
                <canvas id="HDFC Bank"></canvas>
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
