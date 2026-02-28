<?php
require_once("candlestype.php");
$candlestypeID = $_POST['candles_type_id'];
if ((trim($candlestypeID) == '') or (!is_numeric($candlestypeID))) {
   echo "<h2>Sorry, you must enter a valid candle type ID</h2>\n";
} else if (!CandlesType::findCandlesType($candlestypeID)) {
   echo "<h2>Sorry, A candle type with ID #$candlestypeID does not exist</h2>\n";
} else {
   $type = CandlesType::findCandlesType($candlestypeID);
   $type->candlestypeID = $_POST['candles_type_id'];
   $type->candlestypeCode = $_POST['candles_type_code'];
   $type->candlestypeName = $_POST['candles_type_name'];
   $type->candlesTypeShelfNumber = $_POST['candles_type_shelf_number'];
   $type->datetimeUpdated = date('Y-m-d H:i:s');
   $result = $type->updateCandlesType();
   if ($result) {
       echo "<h2>Candle type $candlestypeID updated</h2>\n";
   } else {
       echo "<h2>Problem updating candle type $candlestypeID</h2>\n";
   }
}
?>