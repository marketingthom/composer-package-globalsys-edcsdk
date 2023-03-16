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
  
  // Get manufacturer with id $manufacturerId
  $manufacturerId = 'YOUR_MANUFACTURER_ID';
  $getManufacturer = new \Globalsys\EDCSDK\Request\GetManufacturer($manufacturerId);
  
  // Send request
  $getManufacturerResponse = $requestHandler->execute($getManufacturer, $accessToken);
  
  // Handle response
  if ($getManufacturerResponse->getHttpCode() == 200) {
    $manufacturer = $getManufacturerResponse->getContent();
    // do stuff with manufacturer here
    // ...
  }
}