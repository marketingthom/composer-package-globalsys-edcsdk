<?php

namespace Globalsys\EDCSDK\Request;

class GetStocks extends AbstractRequest
{

    protected $endpointPath = '/api/stocks/';
    protected $httpMethod = self::HTTP_METHOD_GET;

    protected $from;

    public function getData()
    {
        $data = [
            'from' => $this->from,
        ];
        return array_filter($data, function ($value) {
            return !is_null($value);
        });
    }

    public function setFrom($from)
    {
        $this->from = $from;
    }

}
