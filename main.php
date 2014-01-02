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
						<li><a href="javascript:setvolume(-8112);">20 Prozent</a></li>
						<li><a href="javascript:setvolume(-5985);">40 Prozent</a></li>
						<li><a href="javascript:setvolume(-3858);">60 Prozent</a></li>
						<li><a href="javascript:setvolume(-1731);">80 Prozent</a></li>
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