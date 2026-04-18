function getRealTime() {
 // retrieve the DOM objects to place the content
 var domcandlestype = document.getElementById("candlestypecount");
 var domcandles = document.getElementById("candlescount");
 var dombuypricetotal = document.getElementById("buypricetotal");
 var domlistpricetotal = document.getElementById("listpricetotal");
 // send the GET request to realtime.php to retrieve the data using XMLHttpRequest
 var request = new XMLHttpRequest();
 request.open("GET", "realtime.php", true);
 request.onreadystatechange = function () {
   if (request.readyState == 4 && request.status == 200) {
     // parse the XML document to get each data element
     var xmldoc = request.responseXML;
     var xmlcandlestype = xmldoc.getElementsByTagName("candlestype")[0];
     var candlestype = xmlcandlestype.childNodes[0].nodeValue;
     var xmlcandles = xmldoc.getElementsByTagName("candles")[0];
     var candles = xmlcandles.childNodes[0].nodeValue;
    var xmlbuypricetotal = xmldoc.getElementsByTagName("buypricetotal")[0];
     var buypricetotal = xmlbuypricetotal.childNodes[0].nodeValue;
     var xmllistpricetotal = xmldoc.getElementsByTagName("listpricetotal")[0];
     var listpricetotal = xmllistpricetotal.childNodes[0].nodeValue;
     domcandlestype.innerHTML = candlestype;
     domcandles.innerHTML = candles;
     dombuypricetotal.innerHTML = buypricetotal;
     domlistpricetotal.innerHTML = listpricetotal;
   }
 };
 request.send();
}