<?php
include 'src/autoload.php';

$apiUrl    = 'YOUR_API_URL';
$apiUser   = 'YOUR_API_USER';
$apiSecret = 'YOUR_API_SECRET';

$requestHandler = new \Globalsys\EDCSDK\Utils\RequestHandler($apiUrl);

$auth = new \Globalsys\EDCSDK\Request\Auth($apiUser, $apiSecret);
$authResponse = $requestHandler->execute($auth);
$authContent = $authResponse->getContent();

if ($authResponse->getHttpCode() != 200) {
  // Error with authentication
  echo $authContent['message'];
} else {
  $accessToken = $authContent['token'];
  
  // Get all stock changes last week
  $getStocks = new \Globalsys\EDCSDK\Request\GetStocks;
  $getStocks->setFrom('-7 DAYS'); // use strtotime param values
  
  // Send request
  $getStocksResponse = $requestHandler->execute($getStocks, $accessToken);
  
  // Handle response
  if ($getStocksResponse->getHttpCode() == 200) {
    $responseContent = $getStocksResponse->getContent();
    foreach ($responseContent['stocks'] as $stock) {
      // do stuff with stocks here
      // ...
    }
  }
}