<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Infinnovation'16 Stock Exchange Simulator</title>
        <meta name="viewport" content="width=device-width, user-scalable=yes">
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
        <div class="content1">
            <br>
                <h1 id="Apple">Apple</h1>
                <canvas id="apple" class="chart"></canvas>
                <h1 id="Microsoft">Microsoft</h1>
                <canvas id="microsoft" class="chart"></canvas>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.bundle.min.js"></script>
                <script>
                    var ctx = document.querySelectorAll(".chart");
                    for(var i = 0; i < 2; i++) {
                        var myChart = new Chart(ctx[i], {
                            type: 'line',
                            data: {
                                labels: ["12:15PM", "01:00PM", "02:00PM", "02:05PM", "02:10PM", "02:59PM"],
                                datasets: [{
                                    label: 'Stock Value',
                                    data: [12, 19, 3, 5, 2, 3],
            //                        backgroundColor: [
            //                            'rgba(255, 99, 132, 0.2)',
            //                            'rgba(54, 162, 235, 0.2)',
            //                            'rgba(255, 206, 86, 0.2)',
            //                            'rgba(75, 192, 192, 0.2)',
            //                            'rgba(153, 102, 255, 0.2)',
            //                            'rgba(255, 159, 64, 0.2)'
            //                        ],
            //                        borderColor: [
            //                            'rgba(255,99,132,1)',
            //                            'rgba(54, 162, 235, 1)',
            //                            'rgba(255, 206, 86, 1)',
            //                            'rgba(75, 192, 192, 1)',
            //                            'rgba(153, 102, 255, 1)',
            //                            'rgba(255, 159, 64, 1)'
            //                        ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                        });
                    }
                </script>
            <br>
            <br>
        </div>
        <footer>
            <div class="foot">
                <br/>
                <br/>&copy; Infinnovation'16.<br/>Made with <span class="heart">&hearts;</span> and JavaScript.<br/><br/>
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <script src="base.js"></script>
    </body>
</html>
