// global vars for tracking --------------------------------------------
var nextPiece = 1;
var xwin = 0;
var owin = 0;

// button functions ----------------------------------------------------
function gameboot() { // this function resets the game to start state
    // update score
    document.getElementById("scoreout").innerHTML=("SCORE: X = "+xwin+" vs O = "+owin);
    // reset all buttons
    for (i = 0; i < 9; i++) {
        document.getElementById("sq"+i).innerHTML = "";
    }
    nextPiece = 1; // reset game piece next to X
    blockbuttons(false);
    console.log("game board ready");
}
function sqclick(whois) {
    // first we need to see if we care, is it blank
    if(document.getElementById(whois).innerHTML=="") {
        // if he is blank, then:
        document.getElementById(whois).innerHTML = whatnext();
        // update his letter, then
        didwon();
        if(allfull()) {
            blockbuttons(true);
        }
    }
}

// helper methods below ------------------------------------------------
function whatnext() {
    var out = "O";
    if(nextPiece==1) { out="X"; }
    nextPiece = (nextPiece+1)%2; // if 1, go 0, if 0, go 1 >>> flipflop
    return out; // spit out letter, with next one ready to go on call
}
function didwon() {
    // im sure there's a really smart way to tell if someone won
    // but this is a timed test so we're gonna brute force for now
    // and ill fix it if i have time at the end.
    var theButtons = [];
    for (i = 0; i < 9; i++) {
        theButtons.push(document.getElementById("sq"+i).innerHTML);
    }
    // >>> for the record, yes i HATE this, but the obvious solution isnt
    // great now we have an array so we're not querying the page a 100x
    // X wins first
    // rows
    if((theButtons[0]=="X") && (theButtons[1]=="X") && (theButtons[2]=="X")) {
        console.log("X win in row 1");
        xwon();
    } else if((theButtons[3]=="X") && (theButtons[4]=="X") && (theButtons[5]=="X")) {
        console.log("X win in row 2");
        xwon();       
    } else if((theButtons[6]=="X") && (theButtons[7]=="X") && (theButtons[8]=="X")) {
        console.log("X win in row 3");
        xwon();
    }
    // cols
    else if((theButtons[0]=="X") && (theButtons[3]=="X") && (theButtons[6]=="X")) {
        console.log("X win in col 1");
        xwon();
    } else if((theButtons[1]=="X") && (theButtons[4]=="X") && (theButtons[7]=="X")) {
        console.log("X win in col 2");
        xwon();
    } else if((theButtons[2]=="X") && (theButtons[5]=="X") && (theButtons[8]=="X")) {
        console.log("X win in col 3");
        xwon();
    }
    // diags
    else if((theButtons[0]=="X") && (theButtons[4]=="X") && (theButtons[8]=="X")) {
        console.log("X win in SE slant");
        xwon();
    } else if((theButtons[2]=="X") && (theButtons[4]=="X") && (theButtons[6]=="X")) {
        console.log("X win in SW slant");
        xwon();
    }
    // O wins now
    // rows
    if((theButtons[0]=="O") && (theButtons[1]=="O") && (theButtons[2]=="O")) {
        console.log("O win in row 1");
        owon();
    } else if((theButtons[3]=="O") && (theButtons[4]=="O") && (theButtons[5]=="O")) {
        console.log("O win in row 2");
        owon();       
    } else if((theButtons[6]=="O") && (theButtons[7]=="O") && (theButtons[8]=="O")) {
        console.log("O win in row 3");
        owon();
    }
    // cols
    else if((theButtons[0]=="O") && (theButtons[3]=="O") && (theButtons[6]=="O")) {
        console.log("O win in col 1");
        owon();
    } else if((theButtons[1]=="O") && (theButtons[4]=="O") && (theButtons[7]=="O")) {
        console.log("O win in col 2");
        owon();
    } else if((theButtons[2]=="O") && (theButtons[5]=="O") && (theButtons[8]=="O")) {
        console.log("O win in col 3");
        owon();
    }
    // diags
    else if((theButtons[0]=="O") && (theButtons[4]=="O") && (theButtons[8]=="O")) {
        console.log("O win in SE slant");
        owon();
    } else if((theButtons[2]=="O") && (theButtons[4]=="O") && (theButtons[6]=="O")) {
        console.log("O win in SW slant");
        owon();
    }
}
function xwon() {
    xwin++;
    alert("X has won.");
    console.log("x win counted:"+xwin);
    document.getElementById("scoreout").innerHTML=("SCORE: X = "+xwin+" vs O = "+owin);
    blockbuttons(true);
}
function owon() {
    owin++;
    alert("O has won.");
    console.log("o win counted:"+owin);
    document.getElementById("scoreout").innerHTML=("SCORE: X = "+xwin+" vs O = "+owin);
    blockbuttons(true);
}
function blockbuttons(whatwant){
    for (i = 0; i < 9; i++) {
        document.getElementById("sq"+i).disabled = whatwant;
    }
}
function allfull(){
    var full = true;
    for (i = 0; i < 9; i++) {
        if(document.getElementById("sq"+i).innerHTML == "") { full = false; }
    }
    return full;
}