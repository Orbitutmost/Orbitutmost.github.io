function checklink() {
    link = document.getElementById("chatlink").value
    if (link.includes("groupme.com/join_group")) {
        document.getElementById("GCform").submit()
    }
    else {
        alert("Please input a groupme link")
    }
    
}