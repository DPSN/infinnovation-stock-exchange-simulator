// function puts in the passed argument text into div#stocks
function putInStocksDiv(text) {
    document.querySelector('#stocks').innerHTML = text;
}
// makes an asynchronous XMLHttpRequest to external url and puts the response text into div#stocks 
var loadStocks = function(uri) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            putInStocksDiv(this.responseText);
            this.abort();
        }
    };
    xhttp.open("GET", uri, true);
    xhttp.send();
}

var populateStocks = function() {
    loadStocks("stocktable.php");
};

var populateNews = function() {
    loadStocks("newstable.php");
};