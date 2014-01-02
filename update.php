<?php
echo 'Checking for Update...<br>';
$av = file_get_contents("https://raw.github.com/chabbster/snakeberry-web/master/config/version.txt");
echo 'Remote-version fetched<br>';
$lfile = fopen("config/version.txt","r");
$tv = fgets($lfile,1024);
fclose($lfile);
echo 'Local-version fetched<br>';
if ($av > $tv){
echo 'There is an update! :-)<br>';
} else {
echo 'There is no update! :-(<br/>';
}
echo '<a href="settings.php">Back to configuration</a>';

?>