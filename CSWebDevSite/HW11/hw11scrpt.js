//const whichpz = new Array ("puzzle1", "puzzle2", "puzzle3");
var theElement;
var timerID = "";
var timerNum = 0;

function pickPz() {
    var rnd_idx = Math.trunc (Math.random() * 3)+1;
    console.log("we rolled puzzle" + rnd_idx + "!");
    var folder = "puzzle" + rnd_idx;
    var imgs = new Array("-1","-2","-3","-5","-4","-6","-7","-8","-9","-10","-11","-12",);
    document.getElementById("pzbg").src = folder+"/puzzleback.gif";
    for (i = 1; i < 13; i++) {
        var imgnum = Math.trunc (Math.random() * imgs.length);
        //console.log(imgnum + " " + i);
        //console.log(imgs);
        pickedimg = imgs[imgnum];
        imgs.splice(imgnum,1);
        img_src = folder + "/" + "img" + rnd_idx + pickedimg + ".jpg";
        document.getElementById("pz"+i+"").src = img_src;
    }
    //console.log(document.getElementById("pzbg").style.left + " " + document.getElementById("pzbg").style.top)
    starttimer();
    return true;
}
function updatetime() { 
    timerNum += 0.5;
    document.getElementById("thetimer").innerHTML = "Time: " + timerNum;
}
function starttimer() {
    timerID = setInterval(updatetime, 500);
}
function endtimer() {
    clearInterval(timerID);
    checkans();
}
function grab(event) {
   theElement = event.currentTarget;
   diffX = event.clientX - parseInt(theElement.style.left);
   diffY = event.clientY - parseInt(theElement.style.top);
   document.addEventListener("mousemove", mover, true);
   document.addEventListener("mouseup", dropper, true);
}
function mover(event) {
   // Compute the new position, add the units, and move the word
   theElement.style.left = (event.clientX - diffX) + "px";
   theElement.style.top = (event.clientY - diffY) + "px";
}
function dropper(event) {
   document.removeEventListener("mouseup", dropper, true);
   document.removeEventListener("mousemove", mover, true);
   // add code here to snap to corner
   gridx = parseInt(document.getElementById("pzbg").style.left);
   gridy = parseInt(document.getElementById("pzbg").style.top);
   relx = parseInt(theElement.style.left) - gridx;
   rely = parseInt(theElement.style.top) - gridy;
   // solve x
   if (relx < 50) { theElement.style.left = gridx + "px"; }
   else if (relx < 150) { theElement.style.left = (gridx+100) + "px"; }
   else if (relx < 250) { theElement.style.left = (gridx+200) + "px"; }
   else { theElement.style.left = (gridx+300) + "px"; }
   // solve y
   if (rely < 50) { theElement.style.top = gridy + "px"; }
   else if (rely < 150) { theElement.style.top = (gridy+100) + "px"; }
   else { theElement.style.top = (gridy+200) + "px"; }
}
function checkans() {
    var isRight = true;
    gridx = parseInt(document.getElementById("pzbg").style.left);
    gridy = parseInt(document.getElementById("pzbg").style.top);
    for (i = 1; i < 13; i++) {
        var piece_name = document.getElementById("pz"+i+"").src;
        var piece_num = piece_name.substring(piece_name.indexOf("img")+5,piece_name.length-4);
        piece_num = parseInt(piece_num);
        relx = parseInt(document.getElementById("pz"+i+"").style.left) - gridx;
        relx = relx/100;
        rely = parseInt(document.getElementById("pz"+i+"").style.top) - gridy;
        rely = rely/100;
        //console.log(piece_num + ", " + piece_num%4+ ", mod %4");
        if(!(((piece_num-1)%4 == relx) && (Math.floor((piece_num-1)/4) == rely))) {
            isRight = false;
        }
    }
    if(isRight) {goodin();} else {badin();}
}

function badin() {
    console.log("bad");
    //alert("Better luck next time");
    document.getElementById("result").innerHTML = "Better luck next time";
}
function goodin() {
    console.log("good");
    //alert("Congratulations! You got it!");
    document.getElementById("result").innerHTML = "Congratulations! You got it!";
}