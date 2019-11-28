<?php

require_once __DIR__ . '/../vendor/autoload.php';

use LeaderSend\Endpoint\Messages;
use LeaderSend\Endpoint\MessagesInterface;
use LeaderSend\HttpClient\HttpClient;
use LeaderSend\Api;
use LeaderSend\Message\Address;
use LeaderSend\Message\Attachment;
use LeaderSend\Message\AttachmentCollection;
use LeaderSend\Message\Header;
use LeaderSend\Message\HeaderCollection;
use LeaderSend\Message\Image;
use LeaderSend\Message\ImageCollection;
use LeaderSend\Message\Message;
use LeaderSend\Message\RawMessage;
use LeaderSend\Response\SendMessageResponse;

/**
 * Example class to showcase handling messages
 */
$example = new class {
    /**
     * @var MessagesInterface
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

        /** @var Messages endpoint */
        $this->endpoint = $api->messages();
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function send(): bool
    {
        /** @var Message $message */
        $message = (new Message())
            ->setFrom(new Address('from@example.com', 'from'))
            ->setTo(new Address('to@example.com', 'to'))
            ->setHtml('<strong>This is the content</strong>')
            ->setText('This is the content')
            ->setSubject('This is the subject')
            ->setHeaders(new HeaderCollection([new Header('X-Header', 'header value')]))
            ->setAutoHtml(false)
            ->setAutoPlain(false)
            ->setTrackOpens(false)
            ->setTrackHtmlClicks(false)
            ->setTrackPlainClicks(false)
            ->setSigningDomain('example.com')
            ->setAttachments(new AttachmentCollection([new Attachment('test.png', base64_encode('test'))]))
            ->setImages(new ImageCollection([new Image('test.png', base64_encode('test'), '12345')]));

        /** @var SendMessageResponse $response */
        $response = $this->endpoint->send($message);
        
        return $response->isSuccess();
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function sendRaw(): bool
    {
        /** @var RawMessage $message */
        $message = (new RawMessage())
            ->setTo(new Address('to@example.com', 'to'))
            ->setRaw('...full raw message here, headers, attachments, etc')
            ->setSigningDomain('example.com');

        /** @var SendMessageResponse $response */
        $response = $this->endpoint->sendRaw($message);

        return $response->isSuccess();
    }
};
