<html>
<head>
	<title>Snakeberry Webconfiguration</title>
	
	<?php
		$url = 'settings.php';
		$file = '/home/pi/snakeberry/radio.csv';
			if (isset($_POST['text']))
			{
				file_put_contents($file, $_POST['text']);
				header(sprintf('Location: %s', $url));
				printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
				exit();
			}
		$text = file_get_contents($file);
	?>

</head>
<body>
	<h2>Snakeberry Webconfiguration</h2>
		<br>
	<b>Streams:</b>
	
		<form action="" method="post">
			<textarea name="text" cols="80" rows="15"><?php echo htmlspecialchars($text) ?></textarea>
				<br>
			<input type="submit" />
			<input type="reset" />
		</form>
		<br>
		<br>
	How to use?<br>
	Write the name of the radiostation first, add a <em>;</em> and then the stream-URL.
		<br>
		<br>
		<br>
	Snakeberry Webpanel - <a href="update.php">Check for Updates</a>
</body>
</html>
