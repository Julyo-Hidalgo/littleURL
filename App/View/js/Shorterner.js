function resetTooltipForLargeScreen(){
	let tooltip = document.getElementById("copy_tooltip_for_large_screen");
	tooltip.innerHTML = "Click to copy";
}

function showTooltipForLargeScreen(newUrlField){
	if(window.matchMedia("screen and (min-width: 700px)").matches){
		let tooltip = document.getElementById("copy_tooltip_for_large_screen");
		tooltip.innerHTML = "Copied: " + newUrlField.value;
	}
}

function showTooltipForSmallScreen(newUrlField){
	let tooltip = document.getElementById("copy_tooltip_for_small_screen");
	tooltip.innerHTML = "Copied: " + newUrlField.value;

	tooltip.style = "display: block;";

	setTimeout(() => {
		tooltip.style = "display: none;";
	}, 1100);
}

function copyToClipboard(newUrlField){
	newUrlField .select();
	newUrlField.setSelectionRange(0, 99999);

	navigator.clipboard.writeText(newUrlField.value);

	newUrlField.style="color: blue;";

	setTimeout(() => {
		newUrlField.style="color: black;";
	}, 200);

}

function handleClickEvent(){
	let newUrlField = document.getElementById("new_url");
	copyToClipboard(newUrlField);
	
	if(matchMedia("screen and (min-width: 700px)").matches){
		showTooltipForLargeScreen(newUrlField);
	}else{
		showTooltipForSmallScreen(newUrlField);
	}
}

function handleByTouchEvent(){
	let newUrlField = document.getElementById("new_url");
	copyToClipboard(newUrlField);
	showTooltipForSmallScreen(newUrlField);
}

let copyButton = document.getElementById("cp_btn");

copyButton.addEventListener("mouseout", resetTooltipForLargeScreen);
copyButton.addEventListener("click", handleClickEvent);
copyButton.addEventListener("touchstart", handleByTouchEvent);
