<?php

namespace Globalsys\EDCSDK\Request;

class GetCategories extends AbstractRequest
{

    protected $endpointPath = '/api/category/';
    protected $httpMethod = self::HTTP_METHOD_GET;

}
