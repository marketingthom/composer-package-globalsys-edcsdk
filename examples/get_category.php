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
  
  // Get category with id $categoryId
  $categoryId = 'YOUR_CATEGORY_ID';
  $getCategory = new \Globalsys\EDCSDK\Request\GetCategory($categoryId);
  
  // Send request
  $getCategoryResponse = $requestHandler->execute($getCategory, $accessToken);
  
  // Handle response
  if ($getCategoryResponse->getHttpCode() == 200) {
    $category = $getCategoryResponse->getContent();
    // do stuff with category here
    // ...
  }
}