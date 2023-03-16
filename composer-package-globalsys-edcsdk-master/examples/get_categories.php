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
  
  // Get all categories
  $getCategories = new \Globalsys\EDCSDK\Request\GetCategories;
  
  // Send request
  $getCategoriesResponse = $requestHandler->execute($getCategories, $accessToken);
  
  // Handle response
  if ($getCategoriesResponse->getHttpCode() == 200) {
    $responseContent = $getCategoriesResponse->getContent();
    foreach ($responseContent['category'] as $category) {
      // do stuff with category here
      // ...
    }
  }
}