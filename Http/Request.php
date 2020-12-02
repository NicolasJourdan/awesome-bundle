<?php

namespace NicolasJourdan\AwesomeBundle\Http;

use Http\Client\Common\HttpMethodsClient;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Request
 *
 * @package NicolasJourdan\AwesomeBundle\Http
 */
class Request
{
    /** @var HttpMethodsClient */
    private $client;

    /**
     * Request constructor.
     *
     * @param HttpClientFactory $httpClient
     */
    public function __construct(HttpClientFactory $httpClient)
    {
        $this->client = $httpClient->getHttpClient();
    }

    /**
     * Sends a request to a given url.
     * The method has to either be 'get' or 'post' and must be specified.
     * Headers are optionals.
     *
     * @param string      $method
     * @param string      $uri
     * @param array       $headers
     * @param string|null $body
     *
     * @return ResponseInterface
     */
    public function send($method, $uri, $headers = [], $body = null): ResponseInterface
    {
        return $this->client->send(
            $method,
            $uri,
            $headers,
            $body
        );
    }
}
