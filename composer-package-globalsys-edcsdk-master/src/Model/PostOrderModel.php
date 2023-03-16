<?php

namespace Globalsys\EDCSDK\Model;

class PostOrderModel
{

    protected $shoporderOrderNr;
    protected $shoporderId;
    protected $shoporderOrderDate;
    protected $shoporderPaid;
    protected $shoporderPaymentType;
    protected $shoporderTotalOrdersum;
    protected $shoporderDelCost;
    protected $shoporderPayCost;
    protected $shoporderVoucher;
    protected $shoporderVoucherCode;
    protected $shoporderComment;
    protected $shoporderShippingType;
    protected $shoporderShippingOption;
    protected $shoporderStandardVat;

    public function getData()
    {
        $data = [
            'shoporder_order_nr'        => $this->shoporderOrderNr,
            'shoporder_id'              => $this->shoporderId,
            'shoporder_order_date'      => $this->shoporderOrderDate,
            'shoporder_paid'            => $this->shoporderPaid,
            'shoporder_payment_type'    => $this->shoporderPaymentType,
            'shoporder_total_ordersum'  => $this->shoporderTotalOrdersum,
            'shoporder_del_cost'        => $this->shoporderDelCost,
            'shoporder_pay_cost'        => $this->shoporderPayCost,
            'shoporder_voucher'         => $this->shoporderVoucher,
            'shoporder_voucher_code'    => $this->shoporderVoucherCode,
            'shoporder_comment'         => $this->shoporderComment,
            'shoporder_shipping_type'   => $this->shoporderShippingType,
            'shoporder_shipping_option' => $this->shoporderShippingOption,
            'shoporder_standard_vat'    => $this->shoporderStandardVat,
        ];
        return array_filter($data, function ($value) {
            return !is_null($value);
        });
    }

    public function setShoporderOrderNr($shoporderOrderNr)
    {
        $this->shoporderOrderNr = $shoporderOrderNr;
    }

    public function setShoporderId($shoporderId)
    {
        $this->shoporderId = $shoporderId;
    }

    public function setShoporderOrderDate($shoporderOrderDate)
    {
        $this->shoporderOrderDate = $shoporderOrderDate;
    }

    public function setShoporderPaid($shoporderPaid)
    {
        $this->shoporderPaid = $shoporderPaid;
    }

    public function setShoporderPaymentType($shoporderPaymentType)
    {
        $this->shoporderPaymentType = $shoporderPaymentType;
    }

    public function setShoporderTotalOrdersum($shoporderTotalOrdersum)
    {
        $this->shoporderTotalOrdersum = $shoporderTotalOrdersum;
    }

    public function setShoporderDelCost($shoporderDelCost)
    {
        $this->shoporderDelCost = $shoporderDelCost;
    }

    public function setShoporderPayCost($shoporderPayCost)
    {
        $this->shoporderPayCost = $shoporderPayCost;
    }

    public function setShoporderVoucher($shoporderVoucher)
    {
        $this->shoporderVoucher = $shoporderVoucher;
    }

    public function setShoporderVoucherCode($shoporderVoucherCode)
    {
        $this->shoporderVoucherCode = $shoporderVoucherCode;
    }

    public function setShoporderComment($shoporderComment)
    {
        $this->shoporderComment = $shoporderComment;
    }

    public function setShoporderShippingType($shoporderShippingType)
    {
        $this->shoporderShippingType = $shoporderShippingType;
    }

    public function setShoporderShippingOption($shoporderShippingOption)
    {
        $this->shoporderShippingOption = $shoporderShippingOption;
    }

    public function setShoporderStandardVat($shoporderStandardVat)
    {
        $this->shoporderStandardVat = $shoporderStandardVat;
    }

}
