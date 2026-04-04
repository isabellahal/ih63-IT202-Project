<?php
if (!isset($_POST['candlesID']) or (!is_numeric($_POST['candlesID']))) {
?>
  <h2>You did not select a valid Candle value</h2>
  <a href="index.php?content=listcandles">List Candles</a>
  <?php
} else {
  $candleID = $_POST['candlesID'];
  $candle = Candles::findCandles($candleID);
  if ($candle) {
  ?>
    <h2>Update Candle <?php echo htmlspecialchars($candle->candlesID); ?></h2><br>
    <form name="candles" action="index.php" method="post">
      <table>
        <tr>
          <td>Candle ID</td>
          <td><?php echo $candle->candlesID; ?></td>
        </tr>
        <tr>
          <td>Candle Code</td>
          <td><input type="text" name="candlesCode" value="<?php echo htmlspecialchars($candle->candlesCode); ?>"></td>
        </tr>
        <tr>
          <td>Name</td>
          <td><input type="text" name="candlesName" value="<?php echo htmlspecialchars($candle->candlesName); ?>"></td>
        </tr>
        <tr>
          <td>Description</td>
          <td><input type="text" name="candlesDescription" value="<?php echo htmlspecialchars($candle->candlesDescription); ?>" minlength="100" maxlength="255" required></td>
        </tr>
        <tr>
          <td>Size</td>
          <td><input type="text" name="candlesSize" value="<?php echo htmlspecialchars($candle->candlesSize); ?>" min="1" max="50" required></td> 
        </tr>
        <tr>
          <td>Burn Time</td>
          <td><input type="text" name="candlesBurnTime" value="<?php echo htmlspecialchars($candle->candlesBurnTime); ?>" min="1" max="50" required></td>
        </tr>
        <tr>
          <td>Candle Type:</td>
          <td><select name="candlestypeID">
              <?php
              echo "<option value=\"0\">Select a Candle Type</option>\n";
              $types = CandlesType::getCandlesTypes();
              if ($types)
                foreach ($types as $type) {
                  $typeID = $type->candlestypeID;
                  $selected = $typeID == $candle->candlestypeID ? "selected" : "";
                  echo "<option value=\"$typeID\" $selected>$type</option>\n";
                }
              ?>
              </select>
              </td>
        </tr>
        <tr>
        <td>Buy Price</td>
        <td>
        <input type="text" name="candlesBuyPrice"
        value="<?php echo $candle->candlesBuyPrice; ?>" min="1" max="200" step="0.01" reuired>
        </td>
        </tr>

        <tr>
        <td>Sell Price</td>
        <td>
        <input type="text" name="candlesSellPrice"
        value="<?php echo $candle->candlesSellPrice; ?>" min="1" max="200" step="0.01" required>
        </td>
        </tr>
      </table><br><br>
      <input type="submit" name="answer" value="Update Candle">
      <input type="submit" name="answer" value="Cancel">
      <input type="hidden" name="candlesID" value="<?php echo $candleID; ?>">
      <input type="hidden" name="content" value="changecandle">
    </form>
  <?php
  } else {
  ?>
    <h2>Sorry, candle <?php echo $candleID; ?> not found</h2>
    <a href="index.php?content=listcandles">List Candles</a>
    <?php
  }
}
?>