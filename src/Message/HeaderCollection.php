<?php declare(strict_types=1);

namespace LeaderSend\Message;

class HeaderCollection
{
    /**
     * @var Header[]
     */
    private $headers = [];

    /**
     * @param array $headers
     *
     * @throws \Exception
     */
    public function __construct(array $headers)
    {
        foreach ($headers as $header) {
            if (!($header instanceof Header)) {
                throw new \Exception(sprintf(
                    '%s expects an array of %s objects but one of the items is %s',
                    static::class,
                    Header::class,
                    !is_object($header) ? gettype($header) : get_class($header)
                ));
            }
            $this->headers[] = $header;
        }
    }

    /**
     * @return array
     */
    public function forMessage(): array
    {
        $headers = [];
        $headersList = $this->toArray();
        if (!empty($headersList)) {
            foreach ($headersList as $header) {
                $headers[$header['name']] = $header['value'];
            }
        }
        return $headers;
    }

    /**
     * @return Header[]
     */
    public function getItems(): array
    {
        return $this->headers;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $items = [];
        foreach ($this->getItems() as $item) {
            $items[] = $item->toArray();
        }
        return $items;
    }
}
