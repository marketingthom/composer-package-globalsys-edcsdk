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
  
  // Get all products with price between 10 and 20 EUR
  $getProducts = new \Globalsys\EDCSDK\Request\GetProducts;
  $getProducts->setPriceFrom(10);
  $getProducts->setPriceTo(20);
  
  // Send request
  $getProductsResponse = $requestHandler->execute($getProducts, $accessToken);
  
  // Handle response
  $productPagesLeft = true;
  while ($productPagesLeft && $getProductsResponse->getHttpCode() == 200) {
    $responseContent = $getProductsResponse->getContent();
    foreach ($responseContent['product'] as $product) {
      // do stuff with product here
      // ...
    }
    // If there a any pages left, get the next page of products
    if ($responseContent['information']['currentpage'] < $responseContent['information']['totalpages']) {
      $getProducts->setCurrentPage($responseContent['information']['currentpage'] + 1);
      $getProductsResponse = $requestHandler->execute($getProducts, $accessToken);
    } else {
      $productPagesLeft = false;
    }
  }
}