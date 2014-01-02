<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <title>Snakeberry Webpanel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="chabbster (mail@chabbster.de)">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    
	<!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="css/flat-ui-new.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/favicon.png" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

	<!-- PHP-Bereich -->
	
		<?php
		$ipfile = fopen("config/ip.txt","r");
		$rpia = fgets($ipfile,1024);
		fclose($ipfile);

		$station = file_get_contents('http://' . ($rpia) . '/radios');
		$stationen = json_decode($station, true);

		$Radios = $stationen['ResponseData']['Radios'];
		$AnzahlRadios = count($Radios);
		?>

		
	<!-- JavaScript Streambar -->
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	
	<script>
	(function($)
	{
		$(document).ready(function()
		{
			$.ajaxSetup(
			{
            cache: false,
            success: function() {
				$('#content').show();
            }
			});
			var $container = $("#stream");
			$container.load("getstream.php");
			var refreshId = setInterval(function()
			{
				$container.load('getstream.php');
			}, 10000);
		});
	})(jQuery);
	</script>

	<!-- JavaScript Controlbar + Volumebar -->
	<script type="text/javascript">
		var lastest;
		function stopit(){
			$.get('http://<?= $rpia ?>/radio/stop', {});
		}
		
		function startit(id){
			lastest = id;
			$.get('http://<?= $rpia ?>/radio/play/' + id,{});

		}
		
		function restartit(lastest){
			$.get('http://<?= $rpia ?>/radio/play/' + lastest,{});
		}
		
		function setvolume(vol){
			$.get('http://<?= $rpia ?>/setvolume/' + vol,{});
		}
	</script>
	
 </head>