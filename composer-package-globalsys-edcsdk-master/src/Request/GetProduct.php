<?php

namespace Globalsys\EDCSDK\Request;

class GetProduct extends AbstractRequest
{

    protected $endpointPath = '/api/product/{productId}';
    protected $httpMethod = self::HTTP_METHOD_GET;

    public function __construct($productId)
    {
        $this->endpointParams['productId'] = $productId;
    }

}
