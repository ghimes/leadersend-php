<?php declare(strict_types=1);

namespace LeaderSend\Endpoint;

use LeaderSend\Message\Message;
use LeaderSend\Message\RawMessage;
use LeaderSend\Response\SendMessageResponse;

interface MessagesInterface
{
    /**
     * @param Message $message
     *
     * @return SendMessageResponse
     * @throws \Exception
     */
    public function send(Message $message): SendMessageResponse;

    /**
     * @param RawMessage $message
     *
     * @return SendMessageResponse
     * @throws \Exception
     */
    public function sendRaw(RawMessage $message): SendMessageResponse;
}
