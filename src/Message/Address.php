<?php declare(strict_types=1);

namespace LeaderSend\Message;

class Address
{
    /**
     * @var string
     */
    private $email = '';

    /**
     * @var string
     */
    private $name = '';

    /**
     * @param string $email
     * @param string $name
     */
    public function __construct(string $email, string $name = '')
    {
        $this->email = $email;
        $this->name  = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'name'  => $this->name,
        ];
    }
}
