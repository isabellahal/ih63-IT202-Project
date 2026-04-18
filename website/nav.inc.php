<?php
   if (isset($_SESSION['login'])) {
   ?>
    <div class="navigation" style="float: left; height: 100%; min-width: 175px; width: auto;">
      <table width="100%" cellpadding="3">
        <?php
         echo "<td><h3>Welcome, {$_SESSION['firstName']}</h3></td>";
         ?>
        <tr>
          <td><img src="images/home.png" alt="Home Icon" width="12" height="12">&nbsp;
          <td><a href="index.php"><strong>Home</strong></a></td>
        </tr>
        <tr>
          <td><img src="images/categories.png" alt="Categories Icon" width="12" height="12">&nbsp;
          <td><strong>Types</strong></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listcandlestype">
              <strong>List Candle Types</strong></a></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newcandletype">
              <strong>Add New Candle Type</strong></a></td>
        </tr>
        <tr>
                    <td><img src="images/items.png" alt="Items Icon" width="12" height="12">&nbsp;
          <td><strong>Candles</strong></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listcandles">
              <strong>List Candles</strong></a></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newcandle">
              <strong>Add New Candle</strong></a></td>
        </tr>
        <tr>
          <td>
            <hr />
          </td>
        </tr>
        <tr>
          <td><a href="index.php?content=logout">
            <img src="images/logout.png" alt="Logout Icon" width="12" height="12">&nbsp;
              <strong>Logout</strong></a></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>
            <form action="index.php" method="post">
              <label>Search for Candle:</label><br>
              <input type="text" name="candlesID" size="14" />
              <input type="submit" value="find" />
              <input type="hidden" name="content" value="updatecandles" />
            </form>
          </td>
        </tr>
        <tr>
          <td>
            <form action="index.php" method="post">
              <label>Search for Candle Type:</label><br>
              <input type="text" name="candlestypeID" size="14" />
              <input type="submit" value="find" />
              <input type="hidden" name="content" value="displaycandlestype" />
            </form>
          </td>
        </tr>
      </table>
    </div>
  <?php
   }
   ?>