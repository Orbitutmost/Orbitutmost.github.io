// setup vars

var isCountdown = false;
var isGuessed = false;
var tries = 0;
var solved = 0;
const alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$(gameReset());

function gameReset() {
    $("#heystupid").disabled = true;
    document.getElementById("#heystupid").disabled= true;
    
    var letters = new Array (); 
    for (i = 0; i < 8; i++) {
        var nextChar = randomPull(alphanum);
        while(letters.includes(nextChar)) {nextChar = randomPull(alphanum);}
        letters.push(nextChar);
    }
    console.log(letters);
    var dumpList = "";
    for (i = 0; i < 8; i++) {
        dumpList += (letters[i]+letters[i]);
    }
    console.log(dumpList)
    // have letters, need to distrib now
    $(document).ready(function(){
        //console.log("doc rdy")
        for (i = 0; i < 16; i++) {
            var idString = "b"+i;
            var charToPut = randomPull(dumpList);
            //console.log($(idString+ " > p").innerHTML);
            dumpList = dumpList.replace(charToPut,"");
            $(idString).click(buttonOnHit);
            //$(idString+ " > p").hide();
            $(idString+ " > p").text(charToPut);
            console.log(i+ " " + idString + " "+ charToPut+ " " + dumpList);
        }
    });
    
    return true;
}
function buttonOnHit(event) {
    console.log("hi");
}
function randomPull(src) {
    var output = src.charAt(Math.trunc (Math.random() * src.length));
    //console.log(output+" pulled from randomPull()");
    return output;
}
