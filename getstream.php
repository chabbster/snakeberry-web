<html>
<meta http-equiv="refresh" content="8;url=getstream.php">
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="css/flat-ui-new.css" rel="stylesheet">
<?php
$ipfile = fopen("config/ip.txt","r");
$rpia = fgets($ipfile,1024);
fclose($ipfile);
$npl = file_get_contents('http://' . ($rpia) . '/radio/nowplaying');
$npla = json_decode($npl, true);
echo '<button class="btn btn-inverse">Du h&ouml;rst</button> &nbsp;' . $npla['ResponseData']['Description'];
?>
</html>