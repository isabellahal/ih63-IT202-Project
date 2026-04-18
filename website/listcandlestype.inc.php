<script language="javascript">
    function listbox_dblclick() {
        document.candlestype.displaycandlestype.click()
    }
    function button_click(target) {
        var userConfirmed = true;
        if (target == 1) {
            userConfirmed = confirm("Are you sure you want to remove this candle type?");
        }
        if (userConfirmed) {
            if (target == 0) document.candlestype.action = "index.php?content=displaycandlestype";
            if (target == 1) document.candlestype.action = "index.php?content=removecandlestype";
            if (target == 2) document.candlestype.action = "index.php?content=updatecandlestype";
        } else {
            alert("Action canceled.");
        }
    }
</script>
<?php
require_once("candlestype.php");
$candlestype = CandlesType::getCandlesTypes();
if ($candlestype) {
?>
    <h2>Select Candle Type</h2>
    <form name="candlestype" method="post">
        <select ondblclick="listbox_dblclick()" name="candlestypeID" size="20">
            <?php
            $first = true;
            foreach ($candlestype as $candleType) {
                $candlestypeID = $candleType->candlestypeID;
                $name = $candlestypeID . " - " . $candleType->candlestypeCode . ", " . $candleType->candlestypeName  . ", " . $candleType->candlesTypeShelfNumber;
                if ($first) {
                    echo "<option value=\"$candlestypeID\" selected>$name</option>\n";
                    $first = false;
                } else {
                    echo "<option value=\"$candlestypeID\">$name</option>\n";
                }
            }
            ?>
        </select>
        <br>
        <input type="submit" onClick="button_click(0)" name="displaycandlestype" value="View Candle Type">
        <input type="submit" onClick="button_click(1)" name="removecandlestype" value="Delete Candle Type">
        <input type="submit" onClick="button_click(2)" name="updatecandlestype" value="Update Candle Type">
    </form>
<?php
} else {
    echo "<h2>No candle types found.</h2>";
}
?>