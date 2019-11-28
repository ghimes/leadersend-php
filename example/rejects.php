<?php

require_once __DIR__ . '/../vendor/autoload.php';

use LeaderSend\Endpoint\RejectsInterface;
use LeaderSend\HttpClient\HttpClient;
use LeaderSend\Api;
use LeaderSend\Reject\RejectAdd;
use LeaderSend\Reject\RejectDelete;
use LeaderSend\Reject\RejectList;
use LeaderSend\Response\RejectListResponse;
use LeaderSend\Response\Response;

/**
 * Example class to showcase handling rejects
 */
$example = new class {
    /**
     * @var RejectsInterface
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

        /** @var RejectsInterface endpoint */
        $this->endpoint = $api->rejects();
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function add(): bool
    {
        /** @var RejectAdd $reject */
        $reject = new RejectAdd('bad@example.com', 'bad email address');
        
        /** @var Response $response */
        $response = $this->endpoint->add($reject);
        
        return $response->isSuccess();
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function delete(): bool
    {
        /** @var RejectDelete $reject */
        $reject = new RejectDelete('bad@example.com');

        /** @var Response $response */
        $response = $this->endpoint->delete($reject);

        return $response->isSuccess();
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function list(): array
    {
        /** @var RejectList $reject */
        $reject = new RejectList();

        /** @var RejectListResponse $response */
        $response = $this->endpoint->list($reject);

        return $response->getRejects()->toArray();
    }
};
