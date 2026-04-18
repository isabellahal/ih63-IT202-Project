<style>
   form[name="candles type"] {
       display: grid;
       grid-template-columns: 125px 1fr;
       gap: 10px 5px;
       align-items: left;
       max-width: 300px;
       margin: 0px;
   }
   form[name="candles type"] label {
       text-align: left;
       padding-right: 5px;
   }
   form[name="candles type"] input[type="text"] {
       width: 100%;
   }
   form[name="candles type"] input[type="submit"] {
       grid-column: 2;
       justify-self: start;
   }
</style>
<?php
$candlestypeID = $_POST['candlestypeID'];
$candleType = CandlesType::findCandlesType($candlestypeID);
if ($candleType) {
?>
   <h2>Update Candle Type <?php echo $candlestypeID; ?></h2><br>
   <form name="candles type" action="index.php" method="post">
       <label for="candlestypeCode">Candle Type Code:</label>
       <input type="text" name="candlestypeCode" id="candlestypeCode" value="<?php echo $candleType->candlestypeCode; ?>">
       <label for="candlestypeName">Candle Type Name:</label>
       <input type="text" name="candlestypeName" id="candlestypeName" value="<?php echo $candleType->candlestypeName; ?>">
       <label for="candlesTypeShelfNumber">Candle Type Shelf Number:</label>
       <input type="text" name="candlesTypeShelfNumber" id="candlesTypeShelfNumber" value="<?php echo $candleType->candlesTypeShelfNumber; ?>">
       <input type="submit" name="answer" value="Update Candle Type">
       <input type="submit" name="answer" value="Cancel">
       <input type="hidden" name="candlestypeID" value="<?php echo $candlestypeID; ?>">
       <input type="hidden" name="content" value="changecandlestype">
   </form>
<?php
} else {
?>
   <h2>Sorry, candle type <?php echo $candlestypeID; ?> not found</h2>
   <a href="index.php?content=listcandletypes">List Candle Types</a>
<?php
}
?>
<script language="javascript">
   document['candlestype']['candlestypeCode'].focus();
   document['candlestype']['candlestypeCode'].select();
</script>