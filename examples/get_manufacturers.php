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
  
  // Get all manufacturers sorted by name ascending
  $getManufacturers = new \Globalsys\EDCSDK\Request\GetManufacturers;
  $getManufacturers->setSortBy('name');
  $getManufacturers->setSortDirection('ASC');
  
  // Send request
  $getManufacturersResponse = $requestHandler->execute($getManufacturers, $accessToken);
  
  // Handle response
  if ($getManufacturersResponse->getHttpCode() == 200) {
    $responseContent = $getManufacturersResponse->getContent();
    foreach ($responseContent['manufacturer'] as $manufacturer) {
      // do stuff with manufacturer here
      // ...
    }
  }
}