<?php

namespace NicolasJourdan\AwesomeBundle\Service;

use NicolasJourdan\AwesomeBundle\Http\Request;

/**
 * Class AwesomeService
 *
 * @package NicolasJourdan\AwesomeBundle\Service
 */
class AwesomeService
{
    /** @var Request */
    private $request;

    /**
     * AwesomeService constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function test(): string
    {
        $response = $this->request->send(
            'GET',
            'https://www.google.com'
        );

        if ($response->getStatusCode() === 200) {
            return "Tout est OK !";
        }

        return "Il y a un problème :(";
    }
}
