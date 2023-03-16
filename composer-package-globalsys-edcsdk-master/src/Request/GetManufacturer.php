<?php

namespace Globalsys\EDCSDK\Request;

class GetManufacturer extends AbstractRequest
{

    protected $endpointPath = '/api/manufacturer/{manufacturerId}';
    protected $httpMethod = self::HTTP_METHOD_GET;

    public function __construct($manufacturerId)
    {
        $this->endpointParams['manufacturerId'] = $manufacturerId;
    }

}
