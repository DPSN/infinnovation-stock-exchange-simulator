// function puts in the passed argument text into div#table
function putInDiv(text) {
    document.querySelector('#table').innerHTML = text;
}

// returns the value of select
var selectedStockName = function() {
    return document.querySelector('select').value;
}

// makes an asynchronous XMLHttpRequest to external url and puts the response text into div#stocks 
var loadTable = function(uri) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            putInDiv(this.responseText);
            this.abort();
        }
    };
    xhttp.open("GET", uri, true);
    xhttp.send();
}

// function to load the table after loading message
var populate = function() {
    putInDiv("Loading... Please check connectivity and refresh this page if this takes a long time.");
    loadTable("updatestable.php?name=" + selectedStockName());
};