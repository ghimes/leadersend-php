<?php declare(strict_types=1);

namespace LeaderSend\Message;

class ImageCollection
{
    /**
     * @var Image[]
     */
    private $images = [];

    /**
     * @param array $images
     *
     * @throws \Exception
     */
    public function __construct(array $images)
    {
        foreach ($images as $image) {
            if (!($image instanceof Image)) {
                throw new \Exception(sprintf(
                    '%s expects an array of %s objects but one of the items is %s',
                    static::class,
                    Image::class,
                    !is_object($image) ? gettype($image) : get_class($image)
                ));
            }
            $this->images[] = $image;
        }
    }

    /**
     * @return Image[]
     */
    public function getItems(): array
    {
        return $this->images;
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
