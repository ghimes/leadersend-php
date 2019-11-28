<?php

require_once __DIR__ . '/../vendor/autoload.php';

use LeaderSend\Endpoint\Users;
use LeaderSend\Endpoint\UsersInterface;
use LeaderSend\HttpClient\HttpClient;
use LeaderSend\Api;
use LeaderSend\Response\Response;

/**
 * Example class to showcase handling users
 */
$example = new class {
    /**
     * @var UsersInterface
     */
    private $endpoint;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        /** @var string $apiKey */
        $apiKey = (string)getenv('LEADERSEND_API_KEY');

        /** @var HttpClient $client */
        $client = new HttpClient($apiKey);

        /** @var Api $api */
        $api = new Api($client);

        /** @var Users users */
        $this->endpoint = $api->users();
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function ping(): bool
    {
        /** @var Response $response */
        $response = $this->endpoint->ping();
        
        return $response->isSuccess();
    }
};
