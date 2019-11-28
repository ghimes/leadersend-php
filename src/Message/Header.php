<?php declare(strict_types=1);

namespace LeaderSend\Message;

class Header
{
    /**
     * @var string
     */
    private $name = '';

    /**
     * @var string
     */
    private $value = '';

    /**
     * @param string $name
     * @param string $value
     */
    public function __construct(string $name, string $value)
    {
        $this->name  = $name;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
    
    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name'  => $this->name,
            'value' => $this->value,
        ];
    }
}
