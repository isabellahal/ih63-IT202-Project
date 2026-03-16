<?php
require_once('candlestype.php');
$candlestypeID = $_POST['candles_type_id'];
if ((trim($candlestypeID) == '') or (!is_numeric($candlestypeID))) {
   echo "<h2>Sorry, you must enter a valid candle type</h2>\n";
} else if (CandlesType::findCandlesType($candlestypeID)) {
  echo "<h2>Sorry, A candle type with the ID #$candlestypeID already exists</h2>\n";
} else {
   $candlestypeCode = $_POST['candles_type_code'];
   $candlestypeName = $_POST['candles_type_name'];
   $candlestypeShelfNumber = $_POST['candles_type_shelf_number'];
   $datetimeCreated = date("D M j h:ia T Y");
   $datetimeUpdated = date("D M j h:ia T Y");
   $type = new CandlesType($candlestypeID, $candlestypeCode, $candlestypeName, $candlestypeShelfNumber, $datetimeCreated, $datetimeUpdated);
   $result = $type->saveCandlesType();
   if ($result)
       echo "<h2>New Candle Type#$candlestypeID successfully added</h2>\n";
   else
       echo "<h2>Sorry, there was a problem adding that Candle Type</h2>\n";
}
?>