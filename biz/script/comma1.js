function removeCommas(e){return e.toString().replace(/,/g,"")}function numberWithCommas(e){return e.toString().replace(/\B(?=(\d{3})+(?!\d))/g,",")}function testDecimals(e){return null===e.match(/\./g)?0:e.match(/\./g)}function replaceCommas(e){var t=e.toString().split(".");return 1===t.length&&(t[0]=e),t[0]=t[0].replace(/\D/g,"").replace(/\B(?=(\d{3})+(?!\d))/g,","),2===t.length&&(t[1]=t[1].replace(/\D/g,"")),t.join(".")}