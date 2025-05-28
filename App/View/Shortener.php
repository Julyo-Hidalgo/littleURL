<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Shortening URLs</title>	
		<meta charset="utf-8" />
		<meta name="author" content="Julyo Hidalgo" />
   		<meta name="description" content="Site that shortens URLs" />
   		<meta name="keywords" content="Shorten, Shortening, URL" />
   		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" media="screen and (min-width: 700px)" href="/View/css/ShortenerDesktop.css" />
		<link rel="stylesheet" media="screen and (max-width: 699px)" href="/View/css/ShortenerMobile.css" />
	</head>

	<body>
		<?php include VIEW . 'Navigation.php' ?>

		<main>
			<h1><span class="little-url-span">Little</span>URL</h1>

			<div>
				<h1 class="shortened">Your shortened URL:</h1>
				
				<input type="type" id="new_url" value="<?= $newUrl ?>" disabled />
				<button id="cp_btn" onclick="copyToClipboard()" onmouseout="resetTooltip()">Copy<span id="copy_tooltip">Click to copy</span></button>

				<h2>Long url:</h2>
				<a href="<?= $url ?>"><?= $url ?></a>
			</div>
		</main>

		<?php include VIEW . "Footer.php"; ?>
	</body>

	<script>
		function copyToClipboard(){
			let newUrl = document.getElementById("new_url");

			newUrl.select();
			newUrl.setSelectionRange(0, 99999);

			navigator.clipboard.writeText(newUrl.value);

			let tooltip = document.getElementById("copy_tooltip");
			tooltip.innerHTML = "Copied: " + newUrl.value;
		}

		function resetTooltip(){
			let tooltip = document.getElementById("copy_tooltip");
			tooltip.innerHTML = "Click to copy";
		}
	</script>
</html>
