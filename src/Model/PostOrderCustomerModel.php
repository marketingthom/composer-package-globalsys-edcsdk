<?php

namespace Globalsys\EDCSDK\Model;

class PostOrderCustomerModel
{

    protected $customerNr;
    protected $customerEmail;
    protected $paymentAddressSal;
    protected $paymentAddressPhone;
    protected $paymentAddressCompany;
    protected $paymentAddressUstid;
    protected $paymentAddressFirstname;
    protected $paymentAddressLastname;
    protected $paymentAddressStreet;
    protected $paymentAddressStreetno;
    protected $paymentAddressAdditional;
    protected $paymentAddressCity;
    protected $paymentAddressPostal;
    protected $paymentAddressCountry;
    protected $deliveryAddressSal;
    protected $deliveryAddressPhone;
    protected $deliveryAddressCompany;
    protected $deliveryAddressUstid;
    protected $deliveryAddressFirstname;
    protected $deliveryAddressLastname;
    protected $deliveryAddressStreet;
    protected $deliveryAddressStreetno;
    protected $deliveryAddressAdditional;
    protected $deliveryAddressCity;
    protected $deliveryAddressPostal;
    protected $deliveryAddressCountry;

    public function getData()
    {
        $data = [
            'customer_nr'      => $this->customerNr,
            'customer_email'   => $this->customerEmail,
            'payment_address'  => [
                'sal'        => $this->paymentAddressSal,
                'phone'      => $this->paymentAddressPhone,
                'company'    => $this->paymentAddressCompany,
                'ustid'      => $this->paymentAddressUstid,
                'firstname'  => $this->paymentAddressFirstname,
                'lastname'   => $this->paymentAddressLastname,
                'street'     => $this->paymentAddressStreet,
                'streetno'   => $this->paymentAddressStreetno,
                'additional' => $this->paymentAddressAdditional,
                'city'       => $this->paymentAddressCity,
                'postal'     => $this->paymentAddressPostal,
                'country'    => $this->paymentAddressCountry,
            ],
            'shipping_address' => [
                'sal'        => $this->deliveryAddressSal,
                'phone'      => $this->deliveryAddressPhone,
                'company'    => $this->deliveryAddressCompany,
                'ustid'      => $this->deliveryAddressUstid,
                'firstname'  => $this->deliveryAddressFirstname,
                'lastname'   => $this->deliveryAddressLastname,
                'street'     => $this->deliveryAddressStreet,
                'streetno'   => $this->deliveryAddressStreetno,
                'additional' => $this->deliveryAddressAdditional,
                'city'       => $this->deliveryAddressCity,
                'postal'     => $this->deliveryAddressPostal,
                'country'    => $this->deliveryAddressCountry,
            ],
        ];
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = array_filter($value, function ($value) {
                    return !is_null($value);
                });
            }
            if (is_null($value)) {
                unset($data[$key]);
            }
        }
        return $data;
    }

    public function setCustomerNr($customerNr)
    {
        $this->customerNr = $customerNr;
    }

    public function setCustomerEmail($customerEmail)
    {
        $this->customerEmail = $customerEmail;
    }

    public function setPaymentAddressSal($paymentAddressSal)
    {
        $this->paymentAddressSal = $paymentAddressSal;
    }

    public function setPaymentAddressPhone($paymentAddressPhone)
    {
        $this->paymentAddressPhone = $paymentAddressPhone;
    }

    public function setPaymentAddressCompany($paymentAddressCompany)
    {
        $this->paymentAddressCompany = $paymentAddressCompany;
    }

    public function setPaymentAddressUstid($paymentAddressUstid)
    {
        $this->paymentAddressUstid = $paymentAddressUstid;
    }

    public function setPaymentAddressFirstname($paymentAddressFirstname)
    {
        $this->paymentAddressFirstname = $paymentAddressFirstname;
    }

    public function setPaymentAddressLastname($paymentAddressLastname)
    {
        $this->paymentAddressLastname = $paymentAddressLastname;
    }

    public function setPaymentAddressStreet($paymentAddressStreet)
    {
        $this->paymentAddressStreet = $paymentAddressStreet;
    }

    public function setPaymentAddressStreetno($paymentAddressStreetno)
    {
        $this->paymentAddressStreetno = $paymentAddressStreetno;
    }

    public function setPaymentAddressAdditional($paymentAddressAdditional)
    {
        $this->paymentAddressAdditional = $paymentAddressAdditional;
    }

    public function setPaymentAddressCity($paymentAddressCity)
    {
        $this->paymentAddressCity = $paymentAddressCity;
    }

    public function setPaymentAddressPostal($paymentAddressPostal)
    {
        $this->paymentAddressPostal = $paymentAddressPostal;
    }

    public function setPaymentAddressCountry($paymentAddressCountry)
    {
        $this->paymentAddressCountry = $paymentAddressCountry;
    }

    public function setDeliveryAddressSal($deliveryAddressSal)
    {
        $this->deliveryAddressSal = $deliveryAddressSal;
    }

    public function setDeliveryAddressPhone($deliveryAddressPhone)
    {
        $this->deliveryAddressPhone = $deliveryAddressPhone;
    }

    public function setDeliveryAddressCompany($deliveryAddressCompany)
    {
        $this->deliveryAddressCompany = $deliveryAddressCompany;
    }

    public function setDeliveryAddressUstid($deliveryAddressUstid)
    {
        $this->deliveryAddressUstid = $deliveryAddressUstid;
    }

    public function setDeliveryAddressFirstname($deliveryAddressFirstname)
    {
        $this->deliveryAddressFirstname = $deliveryAddressFirstname;
    }

    public function setDeliveryAddressLastname($deliveryAddressLastname)
    {
        $this->deliveryAddressLastname = $deliveryAddressLastname;
    }

    public function setDeliveryAddressStreet($deliveryAddressStreet)
    {
        $this->deliveryAddressStreet = $deliveryAddressStreet;
    }

    public function setDeliveryAddressStreetno($deliveryAddressStreetno)
    {
        $this->deliveryAddressStreetno = $deliveryAddressStreetno;
    }

    public function setDeliveryAddressAdditional($deliveryAddressAdditional)
    {
        $this->deliveryAddressAdditional = $deliveryAddressAdditional;
    }

    public function setDeliveryAddressCity($deliveryAddressCity)
    {
        $this->deliveryAddressCity = $deliveryAddressCity;
    }

    public function setDeliveryAddressPostal($deliveryAddressPostal)
    {
        $this->deliveryAddressPostal = $deliveryAddressPostal;
    }

    public function setDeliveryAddressCountry($deliveryAddressCountry)
    {
        $this->deliveryAddressCountry = $deliveryAddressCountry;
    }

}
