<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Shortening URLs</title>	
		<meta charset="utf-8" />
		<meta name="author" content="Julyo Hidalgo" />
   		<meta name="description" content="Site that shortens URLs" />
   		<meta name="keywords" content="Shorten, Shortening, URL" />
   		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" media="screen and (min-width: 700px)" href="/View/css/ShorteningFormsScreenMin700px.css" />
		<link rel="stylesheet" media="screen and (max-width: 699px)" href="/View/css/ShorteningFormsScreenMax699px.css" />
	</head>

	<body>
		<?php include VIEW . "Navigation.php"; ?>

		<main>
			<?php 
				if (isset($error)) {
					echo '<h1 class="error">Please, insert a valid URL!!!</h1>';
				}
			?>

			<h1><span class="little-url-span">Little</span>URL</h1>

			<form action="/form/shortening/save" method="post">
				<input id="url" name="url" type="text" placeholder="Type your URL here:" />	

				<input type="submit" value="Shorten URL" />
			</form>

			<div>
				<p>This site is a URL Shortener. Paste your URLs and it generates a "little" URL for you.</p>
			<div>
		</main>

		<?php include VIEW . "Footer.php"; ?>
	</body>
</html>
