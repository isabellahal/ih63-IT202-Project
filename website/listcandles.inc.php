<?php
require_once("candles.php");
$candles = Candles::getCandles();
if ($candles) {
  foreach ($candles as $candle) {
     $candleID = $candle->candlesID;
     $candleName = $candle->candlesName;
     $candleBuyPrice = $candle->candlesBuyPrice;
     $candleSellPrice = $candle->candlesSellPrice;
     $candleType = $candle->candlestypeID;
     $option = $candleID . " - " . $candleName .  " - " . $candleType . " - " . $candleBuyPrice .  " - " . $candleSellPrice;
     echo "$option<br>";
  }
} else {
   echo "<h2>No candles found.</h2>";
}
?>