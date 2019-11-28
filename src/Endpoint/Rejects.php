<?php declare(strict_types=1);

namespace LeaderSend\Endpoint;

use LeaderSend\HttpClient\HttpClient;
use LeaderSend\HttpClient\HttpResponse;
use LeaderSend\Reject\RejectAdd;
use LeaderSend\Reject\RejectDelete;
use LeaderSend\Reject\RejectList;
use LeaderSend\Response\RejectListResponse;
use LeaderSend\Response\Response;

class Rejects implements RejectsInterface
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
     * @param RejectAdd $reject
     *
     * @return Response
     * @throws \Exception
     */
    public function add(RejectAdd $reject): Response
    {
        /** @var HttpResponse $response */
        $response = $this->httpClient->post('rejectsadd', [
            'form_data' => $reject->toArray()
        ]);

        /** @var Response $response */
        $response = Response::fromResponse($response);

        return $response;
    }

    /**
     * @param RejectDelete $reject
     *
     * @return Response
     * @throws \Exception
     */
    public function delete(RejectDelete $reject): Response
    {
        /** @var HttpResponse $response */
        $response = $this->httpClient->post('rejectsdelete', [
            'form_data' => $reject->toArray()
        ]);

        /** @var Response $response */
        $response = Response::fromResponse($response);

        return $response;
    }

    /**
     * @param RejectList|null $reject
     *
     * @return RejectListResponse
     * @throws \Exception
     */
    public function list(?RejectList $reject = null): RejectListResponse
    {
        /** @var HttpResponse $response */
        $response = $this->httpClient->post('rejectslist', [
            'form_data' => !empty($reject) ? $reject->toArray() : []
        ]);

        /** @var RejectListResponse $response */
        $response = RejectListResponse::fromResponse($response);

        return $response;
    }
}
