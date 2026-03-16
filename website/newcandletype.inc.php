<h2>Enter New Candle Type Information</h2>
<form name="newcandletype" action="index.php" method="post">
   <table cellpadding="1" border="0">
       <tr>
           <td>Category ID:</td>
           <td><input type="number" name="candles_type_id" size="4" min="1" max="99" required></td>
       </tr>
       <tr>
           <td>Category Code:</td>
           <td><input type="text" name="candles_type_code" size="20" placeholder="XXX" minlength="3" required></td>
       </tr>
       <tr>
           <td>Category Name:</td>
           <td><input type="text" name="candles_type_name" size="20" required></td>
       </tr>
        <tr>
              <td>Shelf Number:</td>
              <td><input type="text" name="candles_type_shelf_number" size="4" min="1" max="99" required></td>
        </tr>
   </table><br>
   <input type="submit" value="Submit New Candle Type">
   <input type="hidden" name="content" value="addcandletype">
</form>