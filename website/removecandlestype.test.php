<?php
require_once("candlestype.php");
$candlestypeID = $_POST['candles_type_id'];
if ((trim($candlestypeID) == '') or (!is_numeric($candlestypeID))) {
   echo "<h2>Sorry, you must enter a valid candle type</h2>\n";
} else if (!CandlesType::findCandlesType($candlestypeID)) {
   echo "<h2>Sorry, A candle type with ID #$candlestypeID does not exist</h2>\n";
} else {
   $type = CandlesType::findCandlesType($candlestypeID);
   $result = $type->removeCandlesType();
   if ($result)
       echo "<h2>Candle Type $candlestypeID removed</h2>\n";
   else
       echo "<h2>Sorry, problem removing candle type $candlestypeID</h2>\n";
}
?>