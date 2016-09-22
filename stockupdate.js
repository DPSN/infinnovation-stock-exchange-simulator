// function puts in the passed argument text into div#stocks
function putInStocksDiv(text) {
    document.querySelector('#stocks').innerHTML = text;
}
// makes an asynchronous XMLHttpRequest to external url and puts the response text into div#stocks 
var loadStocksInit = function(uri) {
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

var populateStocksInit = function() {
    loadStocksInit("stocktable.php");
};

var populateNews = function() {
    loadStocksInit("newstable.php");
};

var loadStocksLater = function(uri) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var ds = document.querySelector('div#stocks');
            var dh = document.querySelector('div#hidden');
            dh.innerHTML = ds.innerHTML;
            ds.innerHTML = this.responseText;
            ds.id = "shown";
            var dstrs = document.querySelectorAll("div#shown table tr");
            var dhtrs = document.querySelectorAll("div#hidden table tr");
            if(dstrs.length == dhtrs.length) {
                for(var i = 0; i < dstrs.length; i++) {
                    if(dstrs[i].innerHTML !== dhtrs[i].innerHTML) {
                        dstrs[i].style.backgroundColor = 'yellow';
                        dstrs[i].style.color = '#000';
                    }
                }
            }
            ds.id = "stocks";
            this.abort();
        }
    };
    xhttp.open("GET", uri, true);
    xhttp.send();
};

var populateStocksLater = function() {
    loadStocksLater('stocktable.php');
};