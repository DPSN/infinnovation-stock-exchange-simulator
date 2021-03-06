<!doctype html>
<html>
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <title>Infinnovation Stock Exchange Simulator Master Panel | Rollback News Item Section</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../base.css">
    </head>
    <body>
        <img src="../../images/logo.png">
        <h1><a href="../">Infinnovation Stock Exchange Simulator Master Panel</a><br><small>Rollback News Item Section</small></h1>
        <p><sup>*</sup> Do not use this panel without the permission/authorisation by Infinnovation Stock Exchange Board.</p>
        <br>
        Rollback operation:<br>
        <table class="newsr">
            <?php
            include('../../db.php');
                
            $sql = "SELECT * FROM news ORDER BY time DESC;";
            $res = mysqli_query($db, $sql);
            
            while($ar = mysqli_fetch_array($res)) {
                $time = $ar['time'];
                $content = $ar['content'];
                $id = $ar['id'];
                $str = "<tr> <form id=\"".$id."\" method=\"POST\" action=\"rollbacknews.php\"> <input type=\"hidden\" name=\"id\" value=\"".$id."\" form=\"".$id."\"> <input type=\"hidden\" name=\"time\" value=\"".$time."\" form=\"".$id."\"> <td class=\"time\">".$time."</td> <td class=\"content\">".$content."</td> <td class=\"button\"><button form=\"".$id."\" type=\"submit\">Rollback</button></td> </form> </tr>\n";
                print($str);
            }
            ?>
        </table>
        <br><br>
        <footer>
              &copy; Infinnovation.<br/>
              Designed and Developed by <a href="https://facebook.com/swghosh" target="_blank" onclick="window.open('https://www.github.com/swghosh');">Swarup Ghosh</a>.<br>
              <a href="https://twitter.com/SwG_Ghosh" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @SwG_Ghosh</a>
              <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script><br/>
        </footer>
        <?php
        if(isset($_GET['error'])) {
            print("<script>alert(\"Error in previous form submission! News item rollback was unsuccessful. Try again!\");</script>");
        }
        else if(isset($_GET['success'])) {
            print("<script>alert(\"Successfully rolled back your news item.\");</script>");
        }
        ?>
    </body>
</html>
