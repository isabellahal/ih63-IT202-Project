<?php
require_once('candlestype.php');
if (isset($_SESSION['login'])) {
$candlestypeID = filter_input(INPUT_POST, 'candles_type_id', FILTER_VALIDATE_INT);
if ((trim($candlestypeID) == '') or (!is_numeric($candlestypeID))) {
   echo "<h2>Sorry, you must enter a valid candle type</h2>\n";
} else if (CandlesType::findCandlesType($candlestypeID)) {
  echo "<h2>Sorry, A candle type with the ID #$candlestypeID already exists</h2>\n";
} else {
   $candlestypeCode = htmlspecialchars($_POST['candles_type_code']);
   $candlestypeName = htmlspecialchars($_POST['candles_type_name']);
   $candlestypeShelfNumber = htmlspecialchars($_POST['candles_type_shelf_number']);
   $datetimeCreated = date("Y-m-d H:i:s");
   $datetimeUpdated = date("Y-m-d H:i:s");
   $type = new CandlesType($candlestypeID, $candlestypeCode, $candlestypeName, $candlestypeShelfNumber, $datetimeCreated, $datetimeUpdated);
   $result = $type->saveCandlesType();
   if ($result) {
       echo "<h2>New Candle Type#$candlestypeID successfully added</h2>\n";
    } else {
       echo "<h2>Sorry, there was a problem adding that Candle Type</h2>\n";
}
}
} else {
  echo "<h2>Please log in first</h2>\n";
}
?>