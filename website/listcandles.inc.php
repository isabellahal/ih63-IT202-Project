<?php
require_once("candles.php");
$candles = Candles::getCandles();
if ($candles) {
  foreach ($candles as $candle) {
     $candleID = $candle->candlesID;
     $candlesCode = $candle->candlesCode;
     $candleName = $candle->candlesName;
     $candleDescription = $candle->candlesDescription;
     $candleSize = $candle->candlesSize;
     $candleBurnTime = $candle->candlesBurnTime;
     $candleBuyPrice = $candle->candlesBuyPrice;
     $candleSellPrice = $candle->candlesSellPrice;
     $candleType = $candle->candlestypeID;
     $option = $candleID . " - " . $candlesCode . " - " . $candleName . " - " . $candleDescription . " - " . $candleSize . " - " . $candleBurnTime . " - " . $candleType . " - " . $candleBuyPrice . " - " . $candleSellPrice;
     echo "$option<br>";
  }
} else {
   echo "<h2>No candles found.</h2>";
}
?>