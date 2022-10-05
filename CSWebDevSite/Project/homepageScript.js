const img_src = new Array ("MELogo.png","HomeImages/stock1.jpg","HomeImages/stock2.jpg","HomeImages/stock3.jpg","HomeImages/stock4.jpg","HomeImages/stock5.jpg");
var timerID = "";
var idx = 0;

function pickImg() {
    idx = idx + 1;
    if (idx == img_src.length) { idx = 0; }
    console.log(idx);
    p_img_src = img_src[idx];
    console.log(p_img_src);
    document.getElementById("theImg").src = p_img_src;
    return true;
}

function loadShow() {
    timerID = setInterval(pickImg, 3000);
}
