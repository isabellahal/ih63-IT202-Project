<h2>Enter New Candle Information</h2>
<form name="newcandle" action="index.php" method="post">
    <table cellpadding="1" border="0">
        <tr>
            <td>Candle ID:</td>
            <td><input type="number" name="candles_id" size="4" min="1" max="99" required></td>
        </tr>
        <tr>
            <td>Candle Code:</td>
            <td><input type="text" name="candles_code" size="10" minlength="2" maxlength="10" required></td>
        </tr>
         <tr>
            <td>Name:</td>
            <td><input type="text" name="candles_name" size="20" minlength="3" maxlength="100" required></td>
        </tr>
        <tr>
        <td>Description:</td>
        <td><input type="text" name="candles_description" size="40" minlength="30" maxlength="255" required></td>
        </tr>
        <tr>
        <td>Size:</td>
        <td><input type="text" name="candles_size" size="10" minlength="1" maxlength="10"required></td>
        </tr>
        <tr>
        <td>Burn Time:</td>
        <td><input type="text" name="candles_burn_time" size="10" minlength="1" maxlength="100"required></td>
        </tr>
    
        <tr>
            <td>Candle:</td>
            <td><select name="candles_type_id">
                    <?php
                    echo "<option value=\"0\">Select a Candle</option>\n";
                    $types = CandlesType::getCandlesTypes();
                    if ($types)
                        foreach ($types as $type) {
                            $typeID = $type->candlestypeID;
                            echo "<option value=\"$typeID\">$type</option>\n";
                        }
                    ?>
                    </select>
                </td>
        </tr>
        <tr>
            <td>Buy Price:</td>
            <td><input type="number" name="candles_buy_price" size="10" min="1" max="200" step="0.01" required></td>
        </tr>
        <tr>
            <td>Sell Price:</td>
            <td><input type="number" name="candles_sell_price" size="10" min="1" max="200" step="0.01" required></td>
        </tr>
    </table><br>
    <input type="submit" value="Submit New Candle">
    <input type="hidden" name="content" value="addcandle">
</form>