<?php

namespace Globalsys\EDCSDK\Utils;

class RequestHandler
{

    const HTTP_METHOD_DELETE = 'DELETE';
    const HTTP_METHOD_GET = 'GET';
    const HTTP_METHOD_PATCH = 'PATCH';
    const HTTP_METHOD_POST = 'POST';

    protected $endpointUrl;

    public function __construct($endpointUrl)
    {
        $this->endpointUrl = rtrim($endpointUrl, '/');
    }

    public function execute($request, $accessToken = '')
    {
        $endpoint = $this->endpointUrl . $request->getEndpointPath();
        $httpHeader = $this->getHttpHeader($request, $accessToken);
        return $this->send($endpoint, $request->getHttpMethod(), $request->getData(), $httpHeader);
    }

    protected function getHttpHeader($request, $accessToken)
    {
        $httpHeader = $request->getHttpHeader();
        if ($request->getHttpMethod() == self::HTTP_METHOD_POST) {
            $httpHeader[] = 'Content-Type: application/json';
        }
        if (!empty($accessToken)) {
            $httpHeader[] = 'Authorization: Bearer ' . $accessToken;
        }
        return $httpHeader;
    }

    protected function send($url, $method, $data, $httpHeader)
    {
        $ch = curl_init();

        if ($method == self::HTTP_METHOD_GET && !empty($data)) {
            $url = rtrim($url, '?') . '?' . http_build_query($data);
        }

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpHeader);

        if ($method == self::HTTP_METHOD_POST) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        } else {
            if (in_array($method, [self::HTTP_METHOD_DELETE, self::HTTP_METHOD_PATCH])) {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
            }
        }

        $output = curl_exec($ch);
        if ($output === false) {
            throw new \Globalsys\EDCSDK\Exception\CurlException(curl_error($ch));
        }
        $info = curl_getinfo($ch);
        curl_close($ch);

        $response = new \Globalsys\EDCSDK\Response\Response();
        $response->setHttpCode($info['http_code']);
        $response->setContent(json_decode($output, true));
        return $response;
    }

}
