function removeCommas(num) {
   return num.toString().replace(/,/g , "");
 }
 function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
 }

// $('input').keyup(function (event) {
//     // skip for arrow keys
//     if (event.which >= 37 && event.which <= 40) {
//         event.preventDefault();
//     }

//     var currentVal = $(this).val();
//     var testDecimal = testDecimals(currentVal);
//     if (testDecimal.length > 1) {
//         console.log("You cannot enter more than one decimal point");
//         currentVal = currentVal.slice(0, -1);
//     }
//     $(this).val(replaceCommas(currentVal));
// });

function testDecimals(currentVal) {
    var count;
    currentVal.match(/\./g) === null ? count = 0 : count = currentVal.match(/\./g);
    return count;
}


function replaceCommas(yourNumber) {
    var components = yourNumber.toString().split(".");
    if (components.length === 1) 
        components[0] = yourNumber;
    components[0] = components[0].replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    if (components.length === 2)
        components[1] = components[1].replace(/\D/g, "");
    return components.join(".");
}
