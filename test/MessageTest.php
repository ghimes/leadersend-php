<?php declare(strict_types=1);

namespace LeaderSend\Test;

use LeaderSend\Message\Address;
use LeaderSend\Message\Attachment;
use LeaderSend\Message\AttachmentCollection;
use LeaderSend\Message\Header;
use LeaderSend\Message\HeaderCollection;
use LeaderSend\Message\Image;
use LeaderSend\Message\ImageCollection;
use LeaderSend\Message\Message;

class MessageTest extends Base
{
    /**
     * @return void
     */
    final public function testAddress(): void
    {
        $address = new Address('test@example.com', 'test');
        $this->assertEquals('test@example.com', $address->toArray()['email']);
        $this->assertEquals('test', $address->toArray()['name']);
    }

    /**
     * @return void
     */
    final public function testAttachment(): void
    {
        $attachment = new Attachment('test.png', base64_encode('test'));
        $this->assertEquals('test.png', $attachment->getName());
        $this->assertEquals('test', base64_decode($attachment->getContent()));
        $this->assertEquals('application/octet-stream', $attachment->getType());
    }

    /**
     * @throws \Exception
     */
    final public function testAttachmentCollection(): void
    {
        $images = [];
        for ($i = 0; $i < 5; $i++) {
            $images[] = new Attachment($i . '-test.png', base64_encode($i . '-test'));
        }
        $collection = new AttachmentCollection($images);

        foreach ($collection->toArray() as $i => $image) {
            $this->assertEquals($i . '-test.png', $image['name']);
            $this->assertEquals($i . '-test', base64_decode($image['content']));
            $this->assertEquals('application/octet-stream', $image['type']);
        }
    }

    /**
     * @return void
     */
    final public function testHeader(): void
    {
        $header = new Header('X-Header', 'test');
        $this->assertEquals('X-Header', $header->getName());
        $this->assertEquals('test', $header->getValue());
    }

    /**
     * @throws \Exception
     */
    final public function testHeaderCollection(): void
    {
        $images = [];
        for ($i = 0; $i < 5; $i++) {
            $images[] = new Header('X-Header-' . $i, 'test-' . $i);
        }
        $collection = new HeaderCollection($images);

        foreach ($collection->toArray() as $i => $header) {
            $this->assertEquals('X-Header-' . $i, $header['name']);
            $this->assertEquals('test-' . $i, $header['value']);
        }
    }
    
    /**
     * @return void
     */
    final public function testImage(): void
    {
        $image = new Image('test.png', base64_encode('test'), '12345');
        $this->assertEquals('test.png', $image->getName());
        $this->assertEquals('test', base64_decode($image->getContent()));
        $this->assertEquals('12345', $image->getCid());
        $this->assertEquals('application/octet-stream', $image->getType());
    }

    /**
     * @throws \Exception
     */
    final public function testImageCollection(): void
    {
        $images = [];
        for ($i = 0; $i < 5; $i++) {
            $images[] = new Image($i . '-test.png', base64_encode($i . '-test'), $i . '-12345');
        }
        $collection = new ImageCollection($images);
    
        foreach ($collection->toArray() as $i => $image) {
            $this->assertEquals($i . '-test.png', $image['name']);
            $this->assertEquals($i . '-test', base64_decode($image['content']));
            $this->assertEquals($i . '-12345', $image['cid']);
            $this->assertEquals('application/octet-stream', $image['type']);
        }
    }

    /**
     * @throws \Exception
     */
    final public function testMessage(): void
    {
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
        
        $this->assertEquals([
            'from'  => ['email' => 'from@example.com', 'name' => 'from'],
            'to'    => ['email' => 'to@example.com', 'name' => 'to'],
            'html'  => '<strong>This is the content</strong>',
            'text'  => 'This is the content',
            'subject'   => 'This is the subject',
            'headers' => ['X-Header' => 'header value'],
            'auto_html' => false,
            'auto_plain' => false,
            'tracking'  => [
                'opens' => false,
               'html_clicks' => false,
               'plain_clicks' => false,
            ],
            'signing_domain'    => 'example.com',
            'attachments' => [
                ['name' => 'test.png', 'content' => base64_encode('test'), 'type' => 'application/octet-stream'],
            ],
            'images' => [
                ['name' => 'test.png', 'content' => base64_encode('test'), 'cid' => '12345', 'type' => 'application/octet-stream'],
            ],
        ], $message->toArray());
    }
}
