// setup vars
var isCountdown = false;
var isGuessed = false;
var tries = 0;
var solved = 0;
const alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
var cdWho = "";
//$(gameReset()); // this should work i think? not sure why it doesnt

// button functions ----------------------------------------------------
function gameReset() { // this function resets the game to start state
    isCountdown = false;
    isGuessed = false;
    tries = 0;
    solved = 0;
    cdWho = "";
    resetAllButtons();
    // old ref code ----------------------------------------------------
    //document.getElementById("scoreout").innerHTML=("SCORE: X = "+xwin+" vs O = "+owin);
    //$("#b0").text("SCORE: X = "+tries+" vs O = "+solved);
    // -----------------------------------------------------------------
    //$("#b0").prop("disabled",true);
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
    console.log(dumpList);
    // have letters, need to distrib now
    for (i = 0; i < 16; i++) {
        var idString = "#b"+i;
        var charToPut = randomPull(dumpList);
        dumpList = dumpList.replace(charToPut,"");
        $(idString).off();
        $(idString).click(buttonOnHit);
        $(idString+ " > p").hide();
        charToPut = charToPut+"";
        $(idString + " > p").text(charToPut);
        //console.log(i+ " " + idString + " "+ charToPut+ " " + dumpList);
    }   
    return true;
}

function buttonOnHit(event) {
    // first, is this a second button clicked (isCountdown == true)
    if(isCountdown) {
        // now, has the second guess already been made
        if(isGuessed) {
            // the first and second guesses have been made, we do nothing
            return false;
        } else {
            // this is a second guess, we need to check if we got it right
            $("#"+event.currentTarget.id+" > p").fadeIn(0);
            samehittwice = ("#"+event.currentTarget.id == cdWho);
            if(($(cdWho+" > p").text() == $("#"+event.currentTarget.id+" > p").text()) && !samehittwice) {
                // we got it right! disable both buttons and do score
                $(cdWho).prop("disabled",true);
                $("#"+event.currentTarget.id).prop("disabled",true);
                solved++;
            }
            // finally, right or wrong, set isGussed
            isGuessed = true; 
            console.log("second guess clicked, isC="+isCountdown+", isG="+isGuessed+", cdwho="+cdWho);
            console.log("iAM="+"#"+event.currentTarget.id+", solv="+solved+", tries="+tries);
            return true;           
        }
    } else {
        // this is a first guess, start countdown and handle start stuff
        tries++;
        isCountdown = true;
        cdWho = "#" + event.currentTarget.id;
        $(cdWho+" > p").fadeIn(3000, "swing", function() {hideLeftovers();});
        console.log("first guess clicked, isC="+isCountdown+", isG="+isGuessed+", cdwho="+cdWho);
        return true;
    }
    //console.log(event.currentTarget.id);
    //console.log("hi");
}
function randomPull(src) {
    var output = src.charAt(Math.trunc (Math.random() * src.length));
    //console.log(output+" pulled from randomPull()");
    return output;
}
function resetAllButtons() {
    for (i = 0; i < 16; i++) {
        var idString = "#b"+i;
        $(idString).prop("disabled",false);
    }   
    return true;
}
function hideLeftovers() {
    console.log("boink");
    for (i = 0; i < 16; i++) {
        var idString = "#b"+i;
        if(($(idString).prop("disabled")) == false) {
            $(idString + " > p").fadeOut(10);
        }
    } 
    isCountdown = false;
    isGuessed = false;
    cdWho = "";
    if(solved==8) {alertEnd();}
    return true;
}
function alertEnd() {
    if(confirm("Congratulations! Tries: "+tries+"\nWould you like to play again?")) {
        gameReset();
    }
}