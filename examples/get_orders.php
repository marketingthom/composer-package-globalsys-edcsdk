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
  
  // Get all orders changed (shipped, modified, canceled) in the last 3 hours
  $getOrders = new \Globalsys\EDCSDK\Request\GetOrders;
  $getOrders->setChangedFrom('-3 HOURS'); // use strtotime param values
  
  // Send request
  $getOrdersResponse = $requestHandler->execute($getOrders, $accessToken);
  
  // Handle response
  $productPagesLeft = true;
  while ($productPagesLeft && $getOrdersResponse->getHttpCode() == 200) {
    $responseContent = $getOrdersResponse->getContent();
    foreach ($responseContent['order'] as $order) {
      // do stuff with order here
      // ...
    }
    // If there a any pages left, get the next page of orders
    if ($responseContent['information']['currentpage'] < $responseContent['information']['totalpages']) {
      $getOrders->setCurrentPage($responseContent['information']['currentpage'] + 1);
      $getOrdersResponse = $requestHandler->execute($getOrders, $accessToken);
    } else {
      $productPagesLeft = false;
    }
  }
}