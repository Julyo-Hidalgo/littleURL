<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Shortening URLs</title>	
		<meta charset="utf-8" />
		<meta name="author" content="Julyo Hidalgo" />
   		<meta name="description" content="Site that shortens URLs" />
   		<meta name="keywords" content="Shorten, Shortening, URL" />
   		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" media="screen and (min-width: 700px)" href="/View/css/ShortenerScreenMin700px.css" />
		<link rel="stylesheet" media="screen and (max-width: 699px)" href="/View/css/ShortenerScreenMax699px.css" />
		<script src="/View/js/Shorterner.js" defer=""></script>
	</head>

	<body>
		<?php include VIEW . 'Navigation.php' ?>

		<main>
			<h1 class="shortened">Your shortened URL:</h1>
			
			<input type="type" id="new_url" value="<?= $newUrl ?>" disabled />
			<button id="cp_btn" class="button">Copy<span id="copy_tooltip_for_large_screen" class="tooltip">Click to copy</span></button>

			<div class="tooltip_container">
				<span id="copy_tooltip_for_small_screen" class="tooltip">copied!</span>
			</div>

			<h2>Long url:</h2>
			<a href="<?= $url ?>"><?= $url ?></a>
		</main>

		<?php include VIEW . "Footer.php"; ?>
	</body>
</html>
