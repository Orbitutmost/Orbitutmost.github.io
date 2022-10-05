var gifArray = ["https://giphy.com/embed/AvCPKNLbH6FoI", "https://giphy.com/embed/pApnDxfpzbgw8", "https://giphy.com/embed/BzXV"];

function randomGIF() {
	var index = Math.floor(Math.random() * gifArray.length);
	var gif = gifArray[index];
	return document.getElementById('math_gif').innerHTML = '<iframe src="' + gif + '" width="100%" height="100%" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>';
}

randomGIF();
