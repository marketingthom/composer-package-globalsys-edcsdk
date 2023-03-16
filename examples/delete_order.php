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
  
  // Create DeleteOrder request
  $orderId = 'YOUR_ORDER_ID';
  $deleteOrder = new \Globalsys\EDCSDK\Request\DeleteOrder($orderId);
  
  // Send request
  $deleteOrderResponse = $requestHandler->execute($deleteOrder, $accessToken);
  
  $deleteOrderContent = $deleteOrderResponse->getContent();
  if ($deleteOrderResponse->getHttpCode() != 200) {
    // Error
    echo $deleteOrderContent['message'];
  } else {
    // Success
  }
}