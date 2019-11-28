<?php declare(strict_types=1);

namespace LeaderSend\Reject;

class RejectListItem
{
    /**
     * @var string
     */
    private $email = '';

    /**
     * @var string
     */
    private $reason = '';

    /**
     * @var string
     */
    private $detail = '';

    /**
     * @var string
     */
    private $createdAt = '';

    /**
     * @var string
     */
    private $lastEventAt = '';

    /**
     * @var string
     */
    private $expiresAt = '';

    /**
     * @var bool
     */
    private $expired = false;

    /**
     * @var RejectListItemSender|null
     */
    private $sender;
    
    /**
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        $this->email        = (string)($properties['email'] ?? '');
        $this->reason       = (string)($properties['reason'] ?? '');
        $this->detail       = (string)($properties['detail'] ?? '');
        $this->createdAt    = (string)($properties['created_at'] ?? '');
        $this->lastEventAt  = (string)($properties['last_event_at'] ?? '');
        $this->expiresAt    = (string)($properties['expires_at'] ?? '');
        $this->expired      = (bool)($properties['expired'] ?? false);
        $this->sender       = isset($properties['sender']) ? new RejectListItemSender($properties['sender']) : null;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'email'         => $this->email,
            'reason'        => $this->reason,
            'detail'        => $this->detail,
            'created_at'    => $this->createdAt,
            'last_event_at' => $this->lastEventAt,
            'expires_at'    => $this->expiresAt,
            'expired'       => $this->expired,
            'sender'        => !empty($this->sender) ? $this->sender->toArray() : null,
        ];
    }
}
