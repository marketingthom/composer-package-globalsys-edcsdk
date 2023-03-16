<?php

namespace Globalsys\EDCSDK\Request;

class GetManufacturers extends AbstractRequest
{

    protected $endpointPath = '/api/manufacturer/';
    protected $httpMethod = self::HTTP_METHOD_GET;

    protected $searchString;
    protected $currentPage;
    protected $sortBy;
    protected $sortDirection;
    protected $limit;

    public function getData()
    {
        $data = [
            'searchString'  => $this->searchString,
            'currentPage'   => $this->currentPage,
            'sortBy'        => $this->sortBy,
            'sortDirection' => $this->sortDirection,
            'limit'         => $this->limit,
        ];
        return array_filter($data, function ($value) {
            return !is_null($value);
        });
    }

    public function setSearchString($searchString)
    {
        $this->searchString = $searchString;
    }

    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
    }

    public function setSortBy($sortBy)
    {
        $this->sortBy = $sortBy;
    }

    public function setSortDirection($sortDirection)
    {
        $this->sortDirection = $sortDirection;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

}
