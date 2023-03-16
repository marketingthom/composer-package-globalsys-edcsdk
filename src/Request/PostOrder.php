<?php

namespace Globalsys\EDCSDK\Request;

class PostOrder extends AbstractRequest
{

    protected $endpointPath = '/api/order/';
    protected $httpMethod = self::HTTP_METHOD_POST;

    protected $postOrderModel;
    protected $postOrderArticleModels = [];
    protected $postOrderCustomerModel;

    public function getData()
    {
        $data = [];
        if (!is_null($this->postOrderModel)) {
            $data = array_merge($data, $this->postOrderModel->getData());
        }
        if (is_array($this->postOrderArticleModels)) {
            foreach ($this->postOrderArticleModels as $postOrderArticleModel) {
                $data['orderarticles'][] = $postOrderArticleModel->getData();
            }
        }
        if (!is_null($this->postOrderCustomerModel)) {
            $data['customer'] = array_merge($data, $this->postOrderCustomerModel->getData());
        }
        return $data;
    }

    /**
     * @param \Globalsys\EDCSDK\Model\PostOrderModel $postOrderModel
     */
    public function setPostOrderModel($postOrderModel)
    {
        $this->postOrderModel = $postOrderModel;
    }

    /**
     * @param array $postOrderArticleModels
     */
    public function setPostOrderArticleModels($postOrderArticleModels)
    {
        $this->postOrderArticleModels = $postOrderArticleModels;
    }

    /**
     * @param \Globalsys\EDCSDK\Model\PostOrderCustomerModel $postOrderCustomerModel
     */
    public function setPostOrderCustomerModel($postOrderCustomerModel)
    {
        $this->postOrderCustomerModel = $postOrderCustomerModel;
    }

}
