function quickCheck() {
    const form = document.forms["quiz"];
    const q1 = form["q1"].value;
    const q2 = form["q2"].value;
    //const q3 = form["q3"].value;
    const q3 = new Array(document.getElementById("q3a1").checked,document.getElementById("q3a2").checked,document.getElementById("q3a3").checked,document.getElementById("q3a4").checked);
    //const q4 = form["q4"].value;
    const q4 = new Array(document.getElementById("q4a1").checked,document.getElementById("q4a2").checked,document.getElementById("q4a3").checked,document.getElementById("q4a4").checked);
    const q5 = form["q5"].value;
    const q6 = form["q6"].value;
    const ans = new Array(q1,q2,q3,q4,q5,q6);
    // now that we have intputs, validate 
    // all question must have AN answer, or reject with error
    // VALIDATION:
    var allAns = true;
    for (x in ans) {
        if(ans[x] == "" || ans[x] == null || Array.isArray(ans[x])) {
            if (Array.isArray(ans[x])) {
                var allfalse = true;
                for (y in ans[x]) {
                    if (ans[x][y]) { allfalse = false; }
                }
                if (allfalse){ allAns = false; }
            }
        }
    }
    if (allAns == false) {
        alert("Please answer all questions.");
        return false;
    } else {
        alert("Your grade is " + gradeQuiz(ans) + "/6");
    }
    return true;
}
// function to actually check ans
function gradeQuiz(ans) {
    var grade = 0;
    if (ans[0] == "q_false") { grade += 1; }
    if (ans[1] == "q_true") { grade += 1; }
    if (ans[2][1] && !(ans[2][2] || ans[2][0] || ans[2][3])) { grade += 1; }
    if (ans[3][2] && !(ans[3][1] || ans[3][0] || ans[3][3])) { grade += 1; }
    if (ans[4].toUpperCase() == "HTTP") { grade += 1; }
    if (ans[5].toUpperCase() == "FAVICON") { grade += 1; }
    return grade;
}
// this function was me litmus testing the checkbox input type. Why is value so useless on this form type???
function whythefucknowork(){
    const form = document.forms["quiz"];
    const q1 = form["q1"].value;
    const q2 = form["q2"].value;
    const q3 = form["q3"].value;
    const q4 = form["q4"].value;
    const q5 = form["q5"].value;
    const q6 = form["q6"].value;
    const ans = new Array(q1,q2,q3,q4,q5,q6)
    console.log(ans)
    console.log(ans[2])
    console.log(document.forms["quiz"]["q3"].value)
    console.log(document.forms["quiz"]["q3"].value.value)
    console.log(document.forms["quiz"]["q3"])
}

function badin() {
    console.log("bad");
    alert("bad");
}
function goodin() {
    console.log("bad");
    alert("bad");
}