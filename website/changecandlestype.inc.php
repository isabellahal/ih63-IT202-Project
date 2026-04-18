<?php
require_once("candlestype.php");
if (isset($_SESSION['login'])) {
$candlestypeID = $_POST['candlestypeID'];
$answer = $_POST['answer'];
if ($answer == "Update Candle Type") {
   $type = CandlesType::findCandlesType($candlestypeID);
   $type->candlestypeID = $_POST['candlestypeID'];
   $type->candlestypeCode = $_POST['candlestypeCode'];
   $type->candlestypeName = $_POST['candlestypeName'];
   $type->candlesTypeShelfNumber = $_POST['candlesTypeShelfNumber'];
   $type->datetimeCreated = date("Y-m-d H:i:s");
   $type->datetimeUpdated = date("Y-m-d H:i:s");
   $result = $type->updateCandlesType();
   if ($result) {
       echo "<h2>Candle type $candlestypeID updated</h2>\n";
   } else {
       echo "<h2>Problem updating candle type $candlestypeID</h2>\n";
   }
} else {
   echo "<h2>Update Canceled for candle type $candlestypeID</h2>\n";
}
} else {
 echo "<h2>Please login first</h2>\n";
}
?>