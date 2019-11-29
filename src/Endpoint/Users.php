<?php declare(strict_types=1);

namespace LeaderSend\Endpoint;

use LeaderSend\HttpClient\HttpClient;
use LeaderSend\HttpClient\HttpResponse;
use LeaderSend\Response\Response;

class Users implements UsersInterface
{
    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return Response
     * @throws \Exception
     */
    public function ping(): Response
    {
        /** @var HttpResponse $response */
        $response = $this->httpClient->post('', [
            'query' => [
                'method' => 'ping'
            ]
        ]);

        /** @var Response $response */
        $response = Response::fromResponse($response);

        return $response;
    }
}
