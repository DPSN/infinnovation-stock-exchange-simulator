<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Infinnovation'16 Stock Exchange Simulator</title>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="tv.css" type="text/css" />
        <meta name="theme-color" content="#336">
    </head>
    <body>
        <header>
            <div class="wrapper">
                <div class="header">
                    <br/>
                    <div id="imageatr"><img src="../images/logo.png"></div>
                    <h1>Infinnovation<br>Stock Exchange Simulator <sup><small id="beta">&nbsp;beta&nbsp;</small></sup><br/><span id="tagline">&quot;infi-Invest&quot;</span></h1>
                    <br/>
                </div>
            </div>
        </header>
        <div class="content1">
            <br>
                <div id="stocks"></div>
            <br><div id="hidden"></div>
            <br>
        </div>
        <footer>
            <div class="foot">
                <br>&copy; Infinnovation'16.<br>Made with <span class="heart">&hearts;</span> and JavaScript.<br>
                Designed and Developed by <a href="https://facebook.com/swghosh" target="_blank" onclick="window.open('https://www.github.com/swghosh');">Swarup Ghosh</a>.<br>
                <a href="https://twitter.com/SwG_Ghosh" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @SwG_Ghosh</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script><br><br>
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <script async src="../base.js"></script>
        <script src="../stockupdate.js"></script>
    </body>
    <script>
        var loadStocksLater = function(uri) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var ds = document.querySelector('div#stocks');
                var dh = document.querySelector('div#hidden');
                dh.innerHTML = ds.innerHTML;
                ds.innerHTML = this.responseText;
                ds.id = "shown";
                var dstrs = document.querySelectorAll("div#shown table tr");
                var dhtrs = document.querySelectorAll("div#hidden table tr");
                if(dstrs.length == dhtrs.length) {
                    for(var i = 0; i < dstrs.length; i++) {
                        if(dstrs[i].innerHTML !== dhtrs[i].innerHTML) {
                            dstrs[i].style.backgroundColor = 'yellow';
                            dstrs[i].style.color = '#000';
                            var audio = new Audio("notification.mp3");
                            audio.play();
                        }
                    }
                }
                ds.id = "stocks";
                this.abort();
            }
        };
        xhttp.open("GET", uri, true);
        xhttp.send();
        };
        function refreshInit() {
            loadStocksInit("../stocktable.php");
        }
        refreshInit();
        function refreshLater() {
            loadStocksLater("../stocktable.php");
        }
        setInterval(refreshLater, 10000);
    </script>
</html>
