<?php

namespace Globalsys\EDCSDK\Request;

class Auth extends AbstractRequest
{

    protected $endpointPath = '/api/login/';
    protected $httpMethod = self::HTTP_METHOD_GET;

    protected $id;
    protected $secret;

    public function __construct($id, $secret)
    {
        $this->id = $id;
        $this->secret = $secret;
    }

    public function getHttpHeader()
    {
        return [
            'Authorization: Basic ' . base64_encode($this->id . ':' . $this->secret),
        ];
    }

}
