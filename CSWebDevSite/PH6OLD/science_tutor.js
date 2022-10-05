var gifArray = ["https://giphy.com/embed/404JJgt0BF4SmbSdWe", "https://giphy.com/embed/3G3fNzu04GvPW", "https://giphy.com/embed/6f0h5uCKIonRe"];

function randomGIF() {
	var index = Math.floor(Math.random() * gifArray.length);
	var gif = gifArray[index];
	return document.getElementById('sci_gif').innerHTML = '<iframe src="' + gif + '" width="100%" height="100%" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>';
}

randomGIF();
