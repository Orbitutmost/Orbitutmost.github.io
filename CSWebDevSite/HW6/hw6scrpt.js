function calcSub() {
    var calcform = document.forms["mortcalc"];
    var prnamt = calcform["prnamt"].value;
    var yrlyint = calcform["yrlyint"].value;
    var lntrm = calcform["lntrm"].value;
    // now that we have intputs, validate and do math
    /*
    R = P * r / (1 - (1 / (1 + r)n))
    where:

    R = monthly payment
    P = principal loan amount
    r = monthly interest rate (yearly rate divided by 12)
    n = number of months
    */
    // VALIDATION:
    prnamt = parseFloat(prnamt);
    if (isNaN(prnamt)) {badin(); return false;}
    yrlyint = parseFloat(yrlyint);
    if (isNaN(yrlyint)) {badin(); return false;}
    lntrm = parseFloat(lntrm);
    if (isNaN(lntrm)) {badin(); return false;}
    else if (lntrm%1 != 0) {lntrm = Math.round(lntrm);}
    // All data is good, now we do math
    mnthpay = prnamt*(yrlyint/12) / (1-(1/(1+(yrlyint/12))**lntrm));
    ttlpay = mnthpay*lntrm;
    ttlint = ttlpay-prnamt;
    // math done, time to output to page
    mnthpay = mnthpay.toFixed(2);
    ttlpay = ttlpay.toFixed(2);
    ttlint = ttlint.toFixed(2);
    document.getElementById("mnthpay").innerHTML = mnthpay;
    document.getElementById("ttlpay").innerHTML = ttlpay;
    document.getElementById("ttlint").innerHTML = ttlint;
    return true;
}

function badin() {
    console.log("we're trying to abort");
    alert("Bad input, non-numeric");
}