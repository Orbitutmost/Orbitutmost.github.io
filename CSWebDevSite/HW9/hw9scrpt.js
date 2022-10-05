const img_src = new Array ("agra_fort.jpg", "ajanta_ellora.jpeg", "akshardham_temple.jpg", "gateway_of_india.jpg", "hawa_mahal.jpeg", "mehrangarh_fort.jpg", "mysore_palace.jpeg", "qutub_minar.jpg", "sun_temple.jpg", "taj_mahal.jpeg", "victoria_memorial.jpg");
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
function startShow() {
    if (timerID != "") { timerID = setInterval(pickImg, 3000); }
}
function endShow() {
    clearInterval(timerID);
}
function badin() {
    console.log("bad");
    alert("bad");
}
function goodin() {
    console.log("good");
    //alert("good");
}