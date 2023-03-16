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
  
  // Create PostOrder request
  $createOrder = new \Globalsys\EDCSDK\Request\PostOrder;
  
  // Create model with order data and register it in the request
  $order = new \Globalsys\EDCSDK\Model\PostOrderModel;
  $order->setShoporderOrderNr('YOUR_SHOPS_ORDER_NR');
  $order->setShoporderOrderDate('YYYY-MM-DD HH:II:SS');
  $order->setShoporderPaymentType('PAYMENT_TYPE');
  $order->setShoporderTotalOrdersum(14.83);
  $order->setShoporderDelCost(3.83);
  $createOrder->setPostOrderModel($order);
  
  // Create model for order article 1
  $orderArticle = new \Globalsys\EDCSDK\Model\PostOrderArticleModel;
  $orderArticle->setOrderarticlesSku('PRODUCT1_SKU');
  $orderArticle->setOrderarticlesName('PRODUCT1_NAME');
  $orderArticle->setOrderarticlesTotalprice(6.00);
  $orderArticle->setOrderarticlesAmount(2);
  
  // Create model for order article 2
  $orderArticle2 = new \Globalsys\EDCSDK\Model\PostOrderArticleModel;
  $orderArticle2->setOrderarticlesSku('PRODUCT2_SKU');
  $orderArticle2->setOrderarticlesName('PRODUCT2_NAME');
  $orderArticle2->setOrderarticlesTotalprice(5.00);
  $orderArticle2->setOrderarticlesAmount(1);
  
  // Register the articles in the request
  $createOrder->setPostOrderArticleModels([$orderArticle, $orderArticle2]);
  
  // Create model with customer data and register it in the request
  $orderCustomer = new \Globalsys\EDCSDK\Model\PostOrderCustomerModel;
  $orderCustomer->setCustomerEmail('CUSTOMER_EMAIL');
  $orderCustomer->setPaymentAddressSal('CUSTOMER_SALUTATION'); // "Herr" or "Frau"
  $orderCustomer->setPaymentAddressFirstname('CUSTOMER_FIRSTNAME');
  $orderCustomer->setPaymentAddressLastname('CUSTOMER_LASTNAME');
  $orderCustomer->setPaymentAddressStreet('CUSTOMER_STREET');
  $orderCustomer->setPaymentAddressStreetno('CUSTOMER_STREETNO');
  $orderCustomer->setPaymentAddressPostal('CUSTOMER_PLZ');
  $orderCustomer->setPaymentAddressCity('CUSTOMER_CITY');
  $orderCustomer->setPaymentAddressCountry('CUSTOMER_COUNTRY');
  $orderCustomer->setDeliveryAddressSal('CUSTOMER_DELIVERY_SALUTATION'); // "Herr" or "Frau"
  $orderCustomer->setDeliveryAddressFirstname('CUSTOMER_DELIVERY_FIRSTNAME');
  $orderCustomer->setDeliveryAddressLastname('CUSTOMER_DELIVERY_LASTNAME');
  $orderCustomer->setDeliveryAddressStreet('CUSTOMER_DELIVERY_STREET');
  $orderCustomer->setDeliveryAddressStreetno('CUSTOMER_DELIVERY_STREETNO');
  $orderCustomer->setDeliveryAddressPostal('CUSTOMER_DELIVERY_PLZ');
  $orderCustomer->setDeliveryAddressCity('CUSTOMER_DELIVERY_CITY');
  $orderCustomer->setDeliveryAddressCountry('CUSTOMER_DELIVERY_COUNTRY');
  $createOrder->setPostOrderCustomerModel($orderCustomer);
  
  // Send request
  $response = $requestHandler->execute($createOrder, $accessToken);
  
}