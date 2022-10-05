const img_src = new Array ("yellow.png","green.png","blue.png","red.png");
var timerID = "";
var idx = 0;
var theElement;

function pickImg() {
    idx = idx + 1;
    if (idx == img_src.length) { idx = 0; }
    console.log(idx);
    p_img_src = img_src[idx];
    console.log(p_img_src);
    /*
    document.getElementById("theImg").src = p_img_src;
    */
    // NOTE: attempting to use $().hover or $().keypress resulted in MASSIVE lag
    $(document).ready(function(){ // always include this to prevent early run
        // jQuery methods go here
        $("#theImg").slideDown(1000);
        $("#theImg").slideUp(1000);
        // $("#theImg").src = p_img_src; // this doesnt work
        $("#theImg").attr("src", p_img_src); // this is how you change html elements
        });
    
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
    $(document).ready(function(){
        $("#footer").after('<div id="demo" style="background-color: #FFFFFF; position: absolute; top: 0px; left: 0px; width: 100px; height: 100px;"></div>');
        $("#demo").click(grab);
        $("#demo").dblclick(function(){ console.log("dbl");/*$("#demo").fadeTo(1000,50);*/ });
        // ^ dblclick works, not understanding something about fadeTo
        });
}
function badin() {
    console.log("bad");
    alert("bad");
}
function goodin() {
    console.log("good");
    //alert("good");
}
function grab(event) {
    theElement = event.currentTarget;
    diffX = event.clientX - parseInt(theElement.style.left);
    diffY = event.clientY - parseInt(theElement.style.top);
    //document.addEventListener("mousemove", mover, true);
    //document.addEventListener("mouseup", dropper, true);
    $(document).ready(function(){
        $("#demo").mouseout(mover);
        $("#demo").off("click");
        $("#demo").click(dropper);
});

}
function mover(event) {
    // Compute the new position, add the units, and move the word
    theElement.style.left = (event.clientX - diffX) + "px";
    theElement.style.top = (event.clientY - diffY) + "px";
}
function dropper(event) {
    //document.removeEventListener("mouseup", dropper, true);
    //document.removeEventListener("mousemove", mover, true);
    $("#demo").off("mouseout");
    $("#demo").off("click");
    $("#demo").click(grab);
    // add code here to snap to corner
}