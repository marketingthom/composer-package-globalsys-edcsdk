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
  
  // Create PatchOrder request for marking order as paid
  $orderId = 'YOUR_ORDER_ID';
  $patchOrder = new \Globalsys\EDCSDK\Request\PatchOrder($orderId, 'paid');
  
  // Send request
  $patchOrderResponse = $requestHandler->execute($patchOrder, $accessToken);
  
  $patchOrderContent = $patchOrderResponse->getContent();
  if ($patchOrderResponse->getHttpCode() != 200) {
    // Error
    echo $patchOrderContent['message'];
  } else {
    // Success
  }
}