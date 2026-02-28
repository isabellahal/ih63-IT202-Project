<?php
require_once("candles.php");
$candlesID = $_POST['candlesID'];
if ((trim($candlesID) == '') or (!is_numeric($candlesID))) {
   echo "<h2>Sorry, you must enter a valid candle ID</h2>\n";
} else if (!Candles::findCandles($candlesID)) {
   echo "<h2>Sorry, A candle with ID #$candlesID does not exist</h2>\n";
} else {
   $candle = Candles::findCandles($candlesID);
   $result = $candle->removeItem();
   if ($result)
       echo "<h2>Candle $candlesID removed</h2>\n";
   else
       echo "<h2>Sorry, problem removing candle $candlesID</h2>\n";
}
?>