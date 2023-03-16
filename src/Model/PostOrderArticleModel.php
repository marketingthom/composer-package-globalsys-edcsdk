<?php

namespace Globalsys\EDCSDK\Model;

class PostOrderArticleModel
{

    protected $orderarticlesSku;
    protected $orderarticlesName;
    protected $orderarticlesAmount;
    protected $orderarticlesTotalprice;
    protected $orderarticlesVat;

    public function getData()
    {
        $data = [
            'orderarticles_sku'        => $this->orderarticlesSku,
            'orderarticles_name'       => $this->orderarticlesName,
            'orderarticles_amount'     => $this->orderarticlesAmount,
            'orderarticles_totalprice' => $this->orderarticlesTotalprice,
            'orderarticles_vat'        => $this->orderarticlesVat,
        ];
        return array_filter($data, function ($value) {
            return !is_null($value);
        });
    }

    public function setOrderarticlesSku($orderarticlesSku)
    {
        $this->orderarticlesSku = $orderarticlesSku;
    }

    public function setOrderarticlesName($orderarticlesName)
    {
        $this->orderarticlesName = $orderarticlesName;
    }

    public function setOrderarticlesAmount($orderarticlesAmount)
    {
        $this->orderarticlesAmount = $orderarticlesAmount;
    }

    public function setOrderarticlesTotalprice($orderarticlesTotalprice)
    {
        $this->orderarticlesTotalprice = $orderarticlesTotalprice;
    }

    public function setOrderarticlesVat($orderarticlesVat)
    {
        $this->orderarticlesVat = $orderarticlesVat;
    }

}
