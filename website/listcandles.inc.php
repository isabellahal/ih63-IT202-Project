<script language="javascript">
  function listbox_dblclick() {
    document.candles.displaycandle.click()
  }
  function button_click(target) {
    var userConfirmed = true;
    if (target == 1) {
      userConfirmed = confirm("Are you sure you want to remove this candle?");
    }
    if (userConfirmed) {
      if (target == 0) document.candles.action = "index.php?content=displaycandles";
      if (target == 1) document.candles.action = "index.php?content=removecandles";
      if (target == 2) document.candles.action = "index.php?content=updatecandles";
    } else {
      alert ("Action canceled.");
    }
  } 
  </script>
<?php
require_once("candles.php");
$candles = Candles::getCandles();
if ($candles) {
?>
  <form name="candles" method="post">
   <select ondblclick="listbox_dblclick()" name="candlesID" size="20">
    <?php
    $first = true;
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
           if($first) {
                echo "<option value=\"$candleID\" selected>$option</option>\n";
                $first = false;
           } else {
                echo "<option value=\"$candleID\">$option</option>\n";
           }
       }
       ?>
   </select>
    <br>
    <input type="submit" onClick="button_click(0)" name="displaycandle" value="Display Candle">
    <input type="submit" onClick="button_click(1)" name="removecandle" value="Delete Candle">
    <input type="submit" onClick="button_click(2)" name="updatecandle" value="Update Candle">
 </form>
 <?php
} else {
   echo "<h2>No candles found.</h2>";
}
?>