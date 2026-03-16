<h2>Enter New Candle Information</h2>
<form name="newitem" action="index.php" method="post">
    <table cellpadding="1" border="0">
        <tr>
            <td>Candle ID:</td>
            <td><input type="text" name="candlesID" size="4"></td>
        </tr>
        <tr>
            <td>Candle Code:</td>
            <td><input type="text" name="candlesCode" size="10"></td>
        </tr>
         <tr>
            <td>Name:</td>
            <td><input type="text" name="candlesName" size="20"></td>
        </tr>
        <tr>
        <td>Description:</td>
        <td><input type="text" name="candlesDescription" size="40" required></td>
        </tr>
        <tr>
        <td>Size:</td>
        <td><input type="text" name="candlesSize" size="10" required></td>
        </tr>
        <tr>
        <td>Burn Time:</td>
        <td><input type="text" name="candlesBurnTime" size="10" required></td>
        </tr>
    
        <tr>
            <td>Candle:</td>
            <td><select name="candlestypeID">
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
            <td><input type="text" name="candlesBuyPrice" size="10"></td>
        </tr>
        <tr>
            <td>Sell Price:</td>
            <td><input type="text" name="candlesSellPrice" size="10"></td>
        </tr>
    </table><br>
    <input type="submit" value="Submit New Candle">
    <input type="hidden" name="content" value="addcandle">
</form>