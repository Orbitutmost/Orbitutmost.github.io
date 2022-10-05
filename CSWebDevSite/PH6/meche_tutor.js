var gifArray = ["https://giphy.com/embed/WOr6EN0x2LXCZgXuMw", "https://giphy.com/embed/kjjRGpezebjaw", "https://giphy.com/embed/Rh7WqH7y60eL6"];

function randomGIF() {
	var index = Math.floor(Math.random() * gifArray.length);
	var gif = gifArray[index];
	return document.getElementById('me_gif').innerHTML = '<iframe src="' + gif + '" width="100%" height="100%" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>';
}

randomGIF();
