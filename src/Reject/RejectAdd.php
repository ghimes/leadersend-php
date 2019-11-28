<?php declare(strict_types=1);

namespace LeaderSend\Reject;

/**
 * Class Reject
 * @package LeaderSend
 */
class RejectAdd
{
    /**
     * @var string
     */
    private $email = '';

    /**
     * @var string
     */
    private $comment = '';

    /**
     * @param string $email
     * @param string $comment
     */
    public function __construct(string $email, string $comment = '')
    {
        $this->email = $email;
        $this->comment = $comment;
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
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'email'   => $this->email,
            'comment' => $this->comment,
        ];
    }
}
