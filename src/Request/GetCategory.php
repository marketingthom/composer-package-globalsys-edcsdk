<?php

namespace Globalsys\EDCSDK\Request;

class GetCategory extends AbstractRequest
{

    protected $endpointPath = '/api/category/{categoryId}';
    protected $httpMethod = self::HTTP_METHOD_GET;

    public function __construct($categoryId)
    {
        $this->endpointParams['categoryId'] = $categoryId;
    }

}
