<?php
if (!isset($_REQUEST['candlestypeID']) or (!is_numeric($_REQUEST['candlestypeID']))) {
?>
 <h2>You did not select a valid Candle Type to view.</h2>
 <a href="index.php?content=listcandlestype">List Candle Types</a>
 <?php
} else {
 $candlestypeID = $_REQUEST['candlestypeID'];
 $candlestype = CandlesType::findCandlesType($candlestypeID);
 if ($candlestype) {
   echo $candlestype;
   $candles = Candles::getCandlesByType($candlestypeID);
   if ($candles) {
 ?>
     <br><br>
     <b>Candle:</b><br>
     <table>
       <tr>
         <th>Candle ID</th>
         <th>Name</th>
         <th>Buy Price</th>
         <th>Sell Price</th>
       </tr>
       <?php
       $candletotal = 0;
       foreach ($candles as $candle) {
       ?>
         <tr>
           <td><?php echo $candle->candlesID; ?></td>
           <td><?php echo $candle->candlesName; ?></td>
           <td><?php echo $candle->candlesBuyPrice; ?></td>
           <td><?php echo $candle->candlesSellPrice; ?></td>
         </tr>
       <?php
         $candletotal = $candletotal + $candle->candlesSellPrice;
       }
       ?>
       <tr>
         <td></td>
         <td>Total</td>
         <td><?php echo '$' . number_format($candletotal, 2); ?></td>
       </tr>
     </table>
<?php
   } else {
     echo "<h2>There are no items for this candle type</h2>\n";
   }
 } else {
   echo "<h2>Sorry, candle type $candlestypeID not found</h2>\n";
    echo "<a href='index.php?content=listcandlestype'>List Candle Types</a>";
 }
}
