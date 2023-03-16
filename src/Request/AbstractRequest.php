<?php

namespace Globalsys\EDCSDK\Request;

abstract class AbstractRequest
{

    const HTTP_METHOD_DELETE = 'DELETE';
    const HTTP_METHOD_GET = 'GET';
    const HTTP_METHOD_PATCH = 'PATCH';
    const HTTP_METHOD_POST = 'POST';

    protected $endpointPath;
    protected $endpointParams = [];

    protected $httpMethod;

    public function getEndpointPath()
    {
        $placeholder = [];
        foreach ($this->endpointParams as $key => $value) {
            $placeholder[] = sprintf('{%s}', $key);
        }
        return str_replace($placeholder, array_values($this->endpointParams), $this->endpointPath);
    }

    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    public function getData()
    {
        return [];
    }

    public function getHttpHeader()
    {
        return [];
    }

}
