<?php

namespace Globalsys\EDCSDK\Request;

class DeleteOrder extends AbstractRequest
{

    protected $endpointPath = '/api/order/{orderId}';
    protected $httpMethod = self::HTTP_METHOD_DELETE;

    public function __construct($orderId)
    {
        $this->endpointParams['orderId'] = $orderId;
    }

}
