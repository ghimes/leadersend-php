<?php declare(strict_types=1);

namespace LeaderSend\Endpoint;

use LeaderSend\HttpClient\HttpClient;
use LeaderSend\HttpClient\HttpResponse;
use LeaderSend\Message\Message;
use LeaderSend\Message\RawMessage;
use LeaderSend\Response\SendMessageResponse;

class Messages implements MessagesInterface
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
     * @param Message $message
     *
     * @return SendMessageResponse
     * @throws \Exception
     */
    public function send(Message $message): SendMessageResponse
    {
        /** @var HttpResponse $response */
        $response = $this->httpClient->post('messagessend', [
            'form_data' => $message->toArray()
        ]);

        /** @var SendMessageResponse $response */
        $response = SendMessageResponse::fromResponse($response);

        return $response;
    }

    /**
     * @param RawMessage $message
     *
     * @return SendMessageResponse
     * @throws \Exception
     */
    public function sendRaw(RawMessage $message): SendMessageResponse
    {
        /** @var HttpResponse $response */
        $response = $this->httpClient->post('messagessendraw', [
            'form_data' => $message->toArray()
        ]);

        /** @var SendMessageResponse $response */
        $response = SendMessageResponse::fromResponse($response);

        return $response;
    }
}
