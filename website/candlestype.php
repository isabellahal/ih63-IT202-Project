<?php
require_once('database.php');
class CandlesType
{
    public $candlestypeID;
    public $candlestypeCode;
    public $candlestypeName;
    public $candlesTypeShelfNumber;
    public $datetimeCreated;
    public $datetimeUpdated;

   function __construct(
        $candlestypeID,
        $candlestypeCode,
        $candlestypeName,
        $candlesTypeShelfNumber,
        $datetimeCreated,
        $datetimeUpdated
       ) {
        $this->candlestypeID = $candlestypeID;
        $this->candlestypeCode = $candlestypeCode;
        $this->candlestypeName = $candlestypeName;
        $this->candlesTypeShelfNumber = $candlesTypeShelfNumber;
        $this->datetimeCreated = $datetimeCreated;
        $this->datetimeUpdated = $datetimeUpdated;
   }
      function __toString()
   {
       $output = "<h2>$this->candlestypeID - $this->candlestypeCode, $this->candlestypeName, $this->candlesTypeShelfNumber</h2>\n";
       return $output;
   }
   static function findCandlesType($candlestypeID)
   {
       $db = getDB();
       $query = "SELECT * FROM candles_types WHERE candles_type_id = $candlestypeID";
       $result = $db->query($query);
       $row = $result->fetch_array(MYSQLI_ASSOC);
       if ($row) {
           $type = new CandlesType(
            $row['candles_type_id'],
            $row['candles_type_code'],
            $row['candles_type_name'],
            $row['candles_type_shelf_number'],
            $row['date_time_created'],
            $row['date_time_updated']
           );
           $db->close();
           return $type;
       } else {
           $db->close();
           return NULL;
       }
   }
   function saveCandlesType()
   {
       $db = getDB();
       $query = "INSERT INTO candles_types 
       (candles_type_id, candles_type_code, candles_type_name, candles_type_shelf_number)
       VALUES (?, ?, ?, ?)";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "isss",
           $this->candlestypeID,    
           $this->candlestypeCode,   
           $this->candlestypeName,
           $this->candlesTypeShelfNumber
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
      static function getCandlesTypes()
   {
       $db = getDB();
       $query = "SELECT * FROM candles_types";
       $result = $db->query($query);
       if (mysqli_num_rows($result) > 0) {
           $types = array();
           while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
               $type = new CandlesType(
                   $row['candles_type_id'],
                   $row['candles_type_code'],
                   $row['candles_type_name'],
                   $row['candles_type_shelf_number'],
                   $row['date_time_created'],
                   $row['date_time_updated']
               );
               array_push($types, $type);
               unset($type);
           }
           $db->close();
           return $types;
       } else {
           $db->close();
           return NULL;
       }
   }

   static function getTotalCandlesType()
{
   $db = getDB();
   $query = "SELECT COUNT(candles_type_id) AS total FROM candles_types";
   $result = $db->query($query);
   $row = $result->fetch_array();
   if ($row) {
       return $row['0'];
   } else {
       return NULL;
   }
}
   
   function updateCandlesType()
   {
       $db = getDB();
       $query = "UPDATE candles_types SET candles_type_name = ?, " .
           "candles_type_code= ?, date_time_updated= ? WHERE candles_type_id = $this->candlestypeID";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "sss",
           $this->candlestypeName,
           $this->candlestypeCode,
           $this->datetimeUpdated
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
      function removeCandlesType()
   {
       $db = getDB();
       $query = "DELETE FROM candles_types WHERE candles_type_id = $this->candlestypeID";
       $result = $db->query($query);
       $db->close();
       return $result;
   }
}
