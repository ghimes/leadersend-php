<?php declare(strict_types=1);

namespace LeaderSend\Reject;

class RejectListCollection
{
    /**
     * @var RejectListItem[]
     */
    private $rejects = [];

    /**
     * @param array $rejects
     *
     * @throws \Exception
     */
    public function __construct(array $rejects)
    {
        foreach ($rejects as $reject) {
            if (!($reject instanceof RejectListItem)) {
                throw new \Exception(sprintf(
                    '%s expects an array of %s objects but one of the items is %s',
                    static::class,
                    RejectListItem::class,
                    !is_object($reject) ? gettype($reject) : get_class($reject)
                ));
            }
            $this->rejects[] = $reject;
        }
    }

    /**
     * @return RejectListItem[]
     */
    public function getItems(): array
    {
        return $this->rejects;
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
