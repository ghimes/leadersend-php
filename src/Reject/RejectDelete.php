<?php declare(strict_types=1);

namespace LeaderSend\Reject;

/**
 * Class RejectDelete
 * @package LeaderSend
 */
class RejectDelete
{
    /**
     * @var string
     */
    private $email = '';

    /**
     * @param string $email
     */
    public function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'email' => $this->email,
        ];
    }
}
