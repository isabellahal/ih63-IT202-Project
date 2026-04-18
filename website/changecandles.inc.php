<?php
require_once("candles.php");
if (isset($_SESSION['login'])) {
$candlesID = $_POST['candlesID'];
if ((trim($candlesID) == '') or (!is_numeric($candlesID))) {
   echo "<h2>Sorry, you must enter a valid candle</h2>\n";
} else if (!Candles::findCandles($candlesID)) {
   echo "<h2>Sorry, A candle with ID #$candlesID does not exist</h2>\n";
} else {
    $answer = $_POST['answer'];
    if ($answer == "Update Candle") {
   $candle = Candles::findCandles($candlesID);
   $candle->candlesID = $_POST['candlesID'];
   $candle->candlesCode = $_POST['candlesCode'];
   $candle->candlesName = $_POST['candlesName'];
   $candle->candlesDescription = $_POST['candlesDescription'];
   $candle->candlesSize = $_POST['candlesSize'];
   $candle->candlesBurnTime = $_POST['candlesBurnTime'];
   $candle->candlestypeID = !empty($_POST['candlestypeID']) ? $_POST['candlestypeID'] : NULL;
   $candle->candlesBuyPrice = $_POST['candlesBuyPrice'];
   $candle->candlesSellPrice = $_POST['candlesSellPrice'];
    $candle->datetimeUpdated = date("Y-m-d H:i:s");
   $result = $candle->updateCandle();
   if ($result) {
       echo "<h2>Candle $candlesID updated</h2>\n";
   } else {
       echo "<h2>Problem updating candle $candlesID</h2>\n";
   }
    } else {
      echo "<h2>Update Canceled for candle $candlesID</h2>\n";
    }
  }
} else {
  echo "<h2>Please login first</h2>\n";
}