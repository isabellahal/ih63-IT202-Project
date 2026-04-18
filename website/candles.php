<?php
require_once('database.php');
class Candles
{
    public $candlesID;
    public $candlesCode;
    public $candlesName;
    public $candlesDescription;
    public $candlesSize;
    public $candlesBurnTime;
    public $candlestypeID;
    public $candlesBuyPrice;
    public $candlesSellPrice;
    public $datetimeCreated;
    public $datetimeUpdated;
   function __construct(
    $candlesID,
    $candlesCode,
    $candlesName,
    $candlesDescription,
    $candlesSize,
    $candlesBurnTime,
    $candlestypeID,
    $candlesBuyPrice,
    $candlesSellPrice,
    $datetimeCreated,
    $datetimeUpdated
       ) {
       $this->candlesID = $candlesID;
       $this->candlesCode = $candlesCode;
       $this->candlesName = $candlesName;
       $this->candlesDescription = $candlesDescription;
       $this->candlesSize = $candlesSize;
       $this->candlesBurnTime = $candlesBurnTime;
       $this->candlestypeID = $candlestypeID;
       $this->candlesBuyPrice = $candlesBuyPrice;
       $this->candlesSellPrice = $candlesSellPrice;
       $this->datetimeCreated = $datetimeCreated;
       $this->datetimeUpdated = $datetimeUpdated;       
   }
   static function findCandles($candlesID)
   {
       $db = getDB();
       $query = "SELECT * FROM candles WHERE candles_id = $candlesID";
       $result = $db->query($query);
       $row = $result->fetch_array(MYSQLI_ASSOC);
       if ($row) {
           $candle = new Candles(
               $row['candles_id'],
               $row['candles_code'],
               $row['candles_name'],
               $row['candles_description'],
               $row['candles_size'],
               $row['candles_burn_time'],
               $row['candles_type_id'],
               $row['candles_buy_price'],
               $row['candles_sell_price'],
               $row['date_time_created'],
               $row['date_time_updated']
           );
           $db->close();
           return $candle;
       } else {
           $db->close();
           return NULL;
       }
   }
   function __toString()
   {
       $output = "<h2>Candle : $this->candlesID</h2>" .
           "<h2>Name: $this->candlesName</h2>\n" .
           "<div class=\"candle-description\">$this->candlesDescription</div>\n" .
           "<h2>Size: $this->candlesSize</h2>\n" .
           "<h2>Burn Time: $this->candlesBurnTime</h2>\n" .
           "<h2>Type ID: $this->candlestypeID at $this->candlesSellPrice</h2>\n" .
           "<h2>Created: $this->datetimeCreated</h2>\n" .
           "<h2>Updated: $this->datetimeUpdated</h2>\n";
       return $output;
   }
   function saveCandle()
   {
       $db = getDB();
       $query = "INSERT INTO candles VALUES (?, ?, ?, ?, ?, ?, ?, ?, ? , ?, ?)";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "isssssiddss",
           $this->candlesID,  
           $this->candlesCode,  
           $this->candlesName, 
           $this->candlesDescription,   
           $this->candlesSize,   
           $this->candlesBurnTime,  
           $this->candlestypeID,   
           $this->candlesBuyPrice,   
           $this->candlesSellPrice,
           $this->datetimeCreated,
           $this->datetimeUpdated   
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
      static function getCandles()
   {
       $db = getDB();
       $query = "SELECT * FROM candles";
       $result = $db->query($query);
       if (mysqli_num_rows($result) > 0) {
           $candles = array();
           while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
               $candle = new Candles(
                   $row['candles_id'],
                   $row['candles_code'],
                   $row['candles_name'],
                   $row['candles_description'],
                   $row['candles_size'],
                   $row['candles_burn_time'],
                   $row['candles_type_id'],
                   $row['candles_buy_price'],
                   $row['candles_sell_price'],
                   $row['date_time_created'],
                   $row['date_time_updated']     
               );
               array_push($candles, $candle);
           }
           $db->close();
           return $candles;
       } else {
           $db->close();
           return NULL;
       }
   }

   static function getTotalCandles()
{
   $db = getDB();
   $query = "SELECT COUNT(candles_id) AS total FROM candles";
   $result = $db->query($query);
   $row = $result->fetch_array();
   if ($row) {
       return $row[0];
   } else {
       return NULL;
   }
}

static function getTotalBuyPrice()
{
   $db = getDB();
   $query = "SELECT SUM(candles_buy_price) AS total FROM candles";
   $result = $db->query($query);
   $row = $result->fetch_array();
   if ($row) {
       return $row[0];
   } else {
       return NULL;
   }
}
   
static function getTotalListPrice()
{
   $db = getDB();
   $query = "SELECT SUM(candles_sell_price) AS total FROM candles";
   $result = $db->query($query);
   $row = $result->fetch_array();
   if ($row) {
       return $row[0];
   } else {
       return NULL;
   }
}
   
   function updateCandle()
   {
       $db = getDB();
       $query = "UPDATE candles SET candles_name= ?, " .
  
           "candles_code= ?, candles_type_id= ?, candles_description= ?, candles_size= ?, candles_burn_time= ?, candles_buy_price= ?, candles_sell_price= ?, date_time_created = ?, date_time_updated= ? WHERE candles_id = $this->candlesID";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "ssisssddss",
           $this->candlesName,
           $this->candlesCode,
            $this->candlestypeID,  
            $this->candlesDescription, 
           $this->candlesSize,
            $this->candlesBurnTime,
           $this->candlesBuyPrice,
           $this->candlesSellPrice,
           $this ->datetimeCreated,
           $this->datetimeUpdated       
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
      function removeItem()
   {
       $db = getDB();
       $query = "DELETE FROM candles WHERE candles_id = $this->candlesID";
       $result = $db->query($query);
       $db->close();
       return $result;
   }

static function getCandlesByType($candlestypeID)
   {
       $db = getDB();
       $query = "SELECT * from candles where candles_type_id = $candlestypeID";
       $result = $db->query($query);
       if (mysqli_num_rows($result) > 0) {
           $candles = array();
           while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
               $candle = new Candles(
                   $row['candles_id'],
                   $row['candles_code'],
                   $row['candles_name'],
                   $row['candles_description'],
                   $row['candles_size'],
                   $row['candles_burn_time'],
                   $row['candles_type_id'],
                   $row['candles_buy_price'],
                   $row['candles_sell_price'],
                   $row['date_time_created'],
                   $row['date_time_updated']
               );
               array_push($candles, $candle);
           }
           $db->close();
           return $candles;
       } else {
           $db->close();
           return NULL;
       }
   }
}
