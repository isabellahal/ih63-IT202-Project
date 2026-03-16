<?php
require_once("candlestype.php");
$types = CandlesType::getCandlesTypes();
if ($types) {
  foreach ($types as $type) {
     $candlestypeID = $type->candlestypeID;
     $name = $candlestypeID . " - " . $type->candlestypeCode . ", " . $type->candlestypeName . ", " . $type->candlesTypeShelfNumber;
     echo "$name<br>";
  }
} else {
  echo "<h2>No candle type found.</h2>";
}
?>