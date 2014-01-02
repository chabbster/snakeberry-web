<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Snakeberry Webpanel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="chabbster (mail@chabbster.de)">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    
	<!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui-new.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/favicon.png" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

<!-- PHP-Bereich -->
<?php
$rpia = ($_SERVER['SERVER_NAME'] . ":8888");

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
<!-- Body -->
<body>
    <div class="container">
	<br>
	
      <div class="login">
        <div class="login-screen">
		
         <!-- Linke Seite -->
		 <div class="login-icon">
            <img src="images/icon.png" alt="Snakeberry" />
				<h4>
					<small>Snakeberry</small>
				</h4>
          </div>
		
		<!-- Rechte Seite --> 
          <div class="login-form">
		  
		  <!-- Streambar -->
		  <div id="stream"></div>
		  <br>
		  
		  <!-- Controlbar -->
			<div class="btn-toolbar" align="center">
                <div class="btn-group" align="center">
                  <a class="btn btn-primary" href="#fakelink"><span class="fui-empty"></span></a>
                  <a class="btn btn-primary" onclick="stopit();"><span class="fui-pause"></span></a>
                  <a class="btn btn-primary" onclick="restartit(lastest);"><span class="fui-play"></span></a>
                  <a class="btn btn-primary" href="#fakelink"><span class="fui-empty"></span></a>
                </div>
				</div>
			<br>
			
			<!-- VolumeControl -->
			<div class="dropdown">
				<button class="btn btn-wide btn-primary dropdown-toggle" data-toggle="dropdown">
					Lautst&auml;rke
					<span class="caret"></span>
				</button>
				
				<span class="dropdown-arrow"></span>
				
					<ul class="dropdown-menu">
						<li><a href="javascript:setvolume(-10239);">Stumm</a></li>
						<li><a href="javascript:setvolume(-9175.5);">10 Prozent</a></li>
						<li><a href="javascript:setvolume(-8112);">20 Prozent</a></li>
						<li><a href="javascript:setvolume(-7048.5);">30 Prozent</a></li>
						<li><a href="javascript:setvolume(-5985);">40 Prozent</a></li>
						<li><a href="javascript:setvolume(-4921.5);">50 Prozent</a></li>
						<li><a href="javascript:setvolume(-3858);">60 Prozent</a></li>
						<li><a href="javascript:setvolume(-2794.5);">70 Prozent</a></li>
						<li><a href="javascript:setvolume(-1731);">80 Prozent</a></li>
						<li><a href="javascript:setvolume(-667.5);">90 Prozent</a></li>
						<li><a href="javascript:setvolume(396);">100 Prozent</a></li>
					</ul>
				</div>
				
				<br>
			
			<!-- Streamcontrol -->
			<div class="dropdown">
			
			<button class="btn btn-primary btn-wide dropdown-toggle" data-toggle="dropdown">
				Stream/Playlist w&auml;hlen 
				(<?php echo $AnzahlRadios; ?>)
					<span class="caret"></span>
			</button>
			
				<span class="dropdown-arrow "></span>
				
				<ul class="dropdown-menu">
				
				<?php
				foreach($Radios as $key => $value)
				{
					echo '<li><a onclick="startit(' . $Radios[$key]['RadioId'] . ');return false;">' . $Radios[$key]['DisplayName'] . '</a></li>';	
				}
				?>
				
				</ul>
			</div>
			
			<!-- "Footer" -->
          </div>
        </div>
		<div align="right"><small>Snakeberry Webpanel &nbsp;&nbsp;<a href="settings.php" target="_blank"><span class="fui-gear"></span></a>&nbsp;&nbsp;<a href="https://github.com/chabbster/snakeberry-web" target="_blank" alt="Homepage"><span class="fui-arrow-right" alt="Homepage"></span></a></small></div>
      </div>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>