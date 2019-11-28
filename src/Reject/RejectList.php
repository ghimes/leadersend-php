<?php declare(strict_types=1);

namespace LeaderSend\Reject;

/**
 * Class RejectListQuery
 * @package LeaderSend
 */
class RejectList
{
    /**
     * @var string
     */
    private $email = '';

    /**
     * @var bool
     */
    private $includeExpired = false;

    /**
     * RejectQuery constructor.
     *
     * @param string $email
     * @param bool $includeExpired
     */
    public function __construct(string $email = '', bool $includeExpired = false)
    {
        $this->email = $email;
        $this->includeExpired = $includeExpired;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return bool
     */
    public function getIncludeExpired(): bool
    {
        return $this->includeExpired;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'email'           => $this->email,
            'include_expired' => $this->includeExpired,
        ];
    }
}
