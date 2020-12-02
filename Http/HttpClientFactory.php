<?php

namespace NicolasJourdan\AwesomeBundle\Http;

use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\PluginClient;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Client\HttpClient;

/**
 * Class HttpClientFactory
 *
 * @package NicolasJourdan\AwesomeBundle\Http
 */
class HttpClientFactory
{
    /** @var HttpClientFactory */
    private $httpClient;

    /** @var HttpMethodsClient $client */
    private $client;

    /** @var MessageFactory */
    private $requestFactory;

    /**
     * HttpClientFactory constructor.
     *
     * @param HttpClient|null $httpClient
     */
    public function __construct(HttpClient $httpClient = null)
    {
        $this->httpClient = (null !== $httpClient) ? $httpClient : HttpClientDiscovery::find();
        $this->requestFactory = MessageFactoryDiscovery::find();
    }

    /**
     * @return HttpMethodsClient
     */
    public function getHttpClient(): HttpMethodsClient
    {
        if (null === $this->client) {
            $this->client = new HttpMethodsClient(
                $this->httpClient,
                $this->requestFactory
            );
        }

        return $this->client;
    }
}
