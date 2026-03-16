<?php
require_once('candles.php');
$candlesID = $_POST['candlesID'];
if ((trim($candlesID) == '') or (!is_numeric($candlesID))) {
   echo "<h2>Sorry, you must enter a valid candle </h2>\n";
} else if (Candles::findCandles($candlesID)) {
  echo "<h2>Sorry, A candle with the ID #$candlesID already exists</h2>\n";
} else {
   $candlesName = $_POST['candlesName'];
   $candlesCode = $_POST['candlesCode'];
   $candlesDescription = $_POST['candlesDescription'];
   $candlesSize = $_POST['candlesSize'];
   $candlesBurnTime = $_POST['candlesBurnTime'];
   $candlestypeID = !empty($_POST['candlestypeID']) ? $_POST['candlestypeID'] : NULL;
   $candlesBuyPrice = $_POST['candlesBuyPrice'];
   $candlesSellPrice = $_POST['candlesSellPrice'];
   $datetimeCreated = date('Y-m-d H:i:s');
   $datetimeUpdated = date('Y-m-d H:i:s');
   $candle = new Candles($candlesID, $candlesCode, $candlesName, $candlesDescription, $candlesSize, $candlesBurnTime, $candlestypeID, $candlesBuyPrice, $candlesSellPrice, $datetimeCreated, $datetimeUpdated);
   $result = $candle->saveCandle();
   if ($result)
       echo "<h2>New candle #$candlesID successfully added</h2>\n";
   else
       echo "<h2>Sorry, there was a problem adding that candle</h2>\n";
}
?>