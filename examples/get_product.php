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
  
  // Get pruduct with id $productId
  $productId = 'YOUR_PRODUCT_ID';
  $getProduct = new \Globalsys\EDCSDK\Request\GetProduct($productId);
  
  // Send request
  $getProductResponse = $requestHandler->execute($getProduct, $accessToken);
  
  // Handle response
  if ($getProductResponse->getHttpCode() == 200) {
    $product = $getProductResponse->getContent();
    // do stuff with product here
    // ...
  }
}