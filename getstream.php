<html>
<meta http-equiv="refresh" content="8;url=getstream.php">
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="css/flat-ui-new.css" rel="stylesheet">
<?php
$rpia = "127.0.0.1:8888";
$npl = file_get_contents('http://' . ($rpia) . '/radio/nowplaying');
$npla = json_decode($npl, true);
echo '<button class="btn btn-inverse">Du h&ouml;rst</button> &nbsp;' . $npla['ResponseData']['Description'];
?>
</html>
