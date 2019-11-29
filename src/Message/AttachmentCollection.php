<?php declare(strict_types=1);

namespace LeaderSend\Message;

class AttachmentCollection
{
    /**
     * @var Attachment[]
     */
    private $attachments = [];

    /**
     * @param array $attachments
     *
     * @throws \Exception
     */
    public function __construct(array $attachments)
    {
        foreach ($attachments as $attachment) {
            if (!($attachment instanceof Attachment)) {
                throw new \Exception(sprintf(
                    '%s expects an array of %s objects but one of the items is %s',
                    static::class,
	                Attachment::class,
                    !is_object($attachment) ? gettype($attachment) : get_class($attachment)
                ));
            }
            $this->attachments[] = $attachment;
        }
    }

    /**
     * @return Attachment[]
     */
    public function getItems(): array
    {
        return $this->attachments;
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
