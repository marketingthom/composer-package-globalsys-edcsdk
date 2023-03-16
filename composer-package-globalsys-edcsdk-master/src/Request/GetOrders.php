<?php

namespace Globalsys\EDCSDK\Request;

class GetOrders extends AbstractRequest
{

    protected $endpointPath = '/api/order/';
    protected $httpMethod = self::HTTP_METHOD_GET;

    protected $orderNr;
    protected $type;
    protected $changedFrom;
    protected $currentPage;
    protected $limit;

    public function getData()
    {
        $data = [
            'orderNr'     => $this->orderNr,
            'type'        => $this->type,
            'changedFrom' => $this->changedFrom,
            'currentPage' => $this->currentPage,
            'limit'       => $this->limit,
        ];
        return array_filter($data, function ($value) {
            return !is_null($value);
        });
    }

    public function setOrderNr($orderNr)
    {
        $this->orderNr = $orderNr;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setChangedFrom($changedFrom)
    {
        $this->changedFrom = $changedFrom;
    }

    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

}
