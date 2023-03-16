<?php

namespace Globalsys\EDCSDK\Request;

class GetProducts extends AbstractRequest
{

    protected $endpointPath = '/api/product/';
    protected $httpMethod = self::HTTP_METHOD_GET;

    protected $searchString;
    protected $manufacturerBy;
    protected $catalogueBy;
    protected $categoryBy; // Currently not in swagger
    protected $categoryOption; // Currently not in swagger
    protected $priceTo;
    protected $priceFrom;
    protected $dateFrom;
    protected $currentPage;
    protected $sortBy;
    protected $sortDirection;
    protected $limit;

    public function getData()
    {
        $data = [
            'searchString'   => $this->searchString,
            'manufacturerBy' => $this->manufacturerBy,
            'catalogueBy'    => $this->catalogueBy,
            'categoryBy'     => $this->categoryBy,
            'categoryOption' => $this->categoryOption,
            'priceTo'        => $this->priceTo,
            'priceFrom'      => $this->priceFrom,
            'dateFrom'       => $this->dateFrom,
            'currentPage'    => $this->currentPage,
            'sortBy'         => $this->sortBy,
            'sortDirection'  => $this->sortDirection,
            'limit'          => $this->limit,
        ];
        return array_filter($data, function ($value) {
            return !is_null($value);
        });
    }

    public function setSearchString($searchString)
    {
        $this->searchString = $searchString;
    }

    public function setManufacturerBy($manufacturerBy)
    {
        $this->manufacturerBy = $manufacturerBy;
    }

    public function setCatalogueBy($catalogueBy)
    {
        $this->catalogueBy = $catalogueBy;
    }

    public function setCategoryBy($categoryBy)
    {
        $this->categoryBy = $categoryBy;
    }

    public function setCategoryOption($categoryOption)
    {
        $this->categoryOption = $categoryOption;
    }

    public function setPriceTo($priceTo)
    {
        $this->priceTo = $priceTo;
    }

    public function setPriceFrom($priceFrom)
    {
        $this->priceFrom = $priceFrom;
    }

    public function setDateFrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;
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
