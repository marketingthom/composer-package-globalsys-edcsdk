<?php

namespace Globalsys\EDCSDK\Request;

class PatchOrder extends AbstractRequest
{

    protected $endpointPath = '/api/order/{orderId}/{action}';
    protected $httpMethod = self::HTTP_METHOD_PATCH;

    public function __construct($orderId, $action)
    {
        $this->endpointParams['orderId'] = $orderId;
        $this->endpointParams['action'] = $action;
    }

}
