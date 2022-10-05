const img_src = new Array ("GalaxyCluster.jpg", "M104.jpg", "NGC1300.jpg", "InteractingGalaxies.jpg", "M51.jpg", "NGC6217.jpg");
const img_caption = new Array ("Galaxy Cluster", "M 104", "NGC 1300", "Interacting Galaxies", "M 51", "NGC 6217");

function pickImg() {
    var rnd_idx = Math.trunc (Math.random() * img_src.length);
    console.log(rnd_idx);
    p_img_src = img_src[rnd_idx];
    console.log(p_img_src);
    p_img_caption = img_caption[rnd_idx];
    console.log(p_img_caption);
    document.getElementById("theImg").src = p_img_src;
    document.getElementById("thePara").innerHTML = p_img_caption;
    /*theImg_src = document.getElementById("theImg").src;
    console.log(theImg_src);
    thePara_text = document.getElementById("thePara").innerHTML;
    console.log(thePara_text);
    theImg_src = p_img_src;
    console.log(theImg_src);
    thePara_text = p_img_caption;
    console.log(thePara_text);*/
    // the commented stuff doesnt work becuase of the way JS is doing vars.
    // not sure how to force this outcome from multi-line implmentation.
    return true;
}

function badin() {
    console.log("bad");
    alert("bad");
}

function goodin() {
    console.log("good");
    //alert("good");
}