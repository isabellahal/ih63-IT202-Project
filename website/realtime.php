<?php
ob_start();
include("candlestype.php");
include("candles.php");
// Fetch values using the static methods from category.php and item.php
$totalCandlesType = CandlesType::getTotalCandlesType();
$totalCandles = Candles::getTotalCandles();
$buypricetotal = Candles::getTotalBuyPrice();
$listpricetotal = Candles::getTotalListPrice();
$doc = new DOMDocument("1.0");
$websiteElement = $doc->createElement("website");
$websiteElement = $doc->appendChild($websiteElement);
$candlestypeElement = $doc->createElement("candlestype", $totalCandlesType);
$candlestypeElement = $websiteElement->appendChild($candlestypeElement);
$candlesElement = $doc->createElement("candles", $totalCandles);
$candlesElement = $websiteElement->appendChild($candlesElement);
$buypriceElement = $doc->createElement("buypricetotal", $buypricetotal);
$buypriceElement = $websiteElement->appendChild($buypriceElement);
$listpriceElement = $doc->createElement("listpricetotal", $listpricetotal);
$listpriceElement = $websiteElement->appendChild($listpriceElement);
$output = $doc->saveXML();
header("Content-type: application/xml");
ob_end_clean();
echo $output;
?>