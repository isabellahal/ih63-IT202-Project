<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('candles.php');
$candlesID = filter_input(INPUT_POST, 'candles_id', FILTER_VALIDATE_INT);
if ((trim($candlesID) == '') or (!is_numeric($candlesID))) {
   echo "<h2>Sorry, you must enter a valid candle </h2>\n";
} else if (Candles::findCandles($candlesID)) {
  echo "<h2>Sorry, A candle with the ID #$candlesID already exists</h2>\n";
} else {
   $candlesName = htmlspecialchars($_POST['candles_name']);
   $candlesCode = htmlspecialchars($_POST['candles_code']);
   $candlesDescription = htmlspecialchars($_POST['candles_description']);
   $candlesSize = htmlspecialchars($_POST['candles_size']);
   $candlesBurnTime = htmlspecialchars($_POST['candles_burn_time']);
   $candlestypeID = !empty($_POST['candles_type_id']) ? $_POST['candles_type_id'] : NULL;
   $candlesBuyPrice = $_POST['candles_buy_price'];
   $candlesSellPrice = $_POST['candles_sell_price'];
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