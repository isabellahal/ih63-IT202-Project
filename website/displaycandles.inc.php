<?php
if (!isset($_REQUEST['candlesID']) or (!is_numeric($_REQUEST['candlesID']))) {
?>
 <h2>You did not select a valid candle to view.</h2>
 <a href="index.php?content=listcandles">List Candles</a>
 <?php
} else {
 $candlesID = $_REQUEST['candlesID'];
 $candle = Candles::findCandles($candlesID);
 if ($candle) {
    ?>
    <h2>Candle ID: <?php echo $candle->candlesID; ?></h2>
    <h2>Candle Code:</b> <?php echo $candle->candlesCode; ?></h2>
    <h2>Candle Name:</b> <?php echo $candle->candlesName; ?></h2>
    <h2>Candle Price:</b> <?php echo $candle->candlesSellPrice; ?></h2>
    <h2>Candle Description:</b> <?php echo $candle->candlesDescription; ?></h2>
    <h2>Candle Size:</b> <?php echo $candle->candlesSize; ?></h2>
    <h2>Candle Burn Time:</b> <?php echo $candle->candlesBurnTime; ?></h2>
    <h2>Candle Buy Price:</b> <?php echo $candle->candlesBuyPrice; ?></h2>
    <h2>Candle Sell Price:</b> <?php echo $candle->candlesSellPrice; ?></h2>
 <?php
 } else {
   echo "<h2>Sorry, candle not found</h2>\n";
 }
}
?>