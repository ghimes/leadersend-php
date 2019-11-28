<?php declare(strict_types=1);

namespace LeaderSend\Reject;

class RejectListItemSender
{
    /**
     * @var string
     */
    private $address = '';

    /**
     * @var string
     */
    private $createdAt = '';

    /**
     * @var int
     */
    private $sent = 0;

    /**
     * @var int
     */
    private $hardBounces = 0;

    /**
     * @var int
     */
    private $softBounces = 0;

    /**
     * @var int
     */
    private $blockedBounces = 0;

    /**
     * @var int
     */
    private $complaints = 0;

    /**
     * @var int
     */
    private $rejects = 0;

    /**
     * @var int
     */
    private $unsubscribes = 0;

    /**
     * @var int
     */
    private $opens = 0;

    /**
     * @var int
     */
    private $clicks = 0;

    /**
     * @var int
     */
    private $uniqueOpens = 0;

    /**
     * @var int
     */
    private $uniqueClicks = 0;
    
    /**
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        $this->address          = (string)($properties['address'] ?? '');
        $this->createdAt        = (string)($properties['created_at'] ?? '');
        $this->sent             = (int)($properties['sent'] ?? 0);
        $this->hardBounces      = (int)($properties['hard_bounces'] ?? 0);
        $this->softBounces      = (int)($properties['soft_bounces'] ?? 0);
        $this->blockedBounces   = (int)($properties['blocked_bounces'] ?? 0);
        $this->complaints       = (int)($properties['complaints'] ?? 0);
        $this->rejects          = (int)($properties['rejects'] ?? 0);
        $this->unsubscribes     = (int)($properties['unsubscribes'] ?? 0);
        $this->opens            = (int)($properties['opens'] ?? 0);
        $this->clicks           = (int)($properties['clicks'] ?? 0);
        $this->uniqueOpens      = (int)($properties['unique_opens'] ?? 0);
        $this->uniqueClicks     = (int)($properties['unique_clicks'] ?? 0);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'address'           => $this->address,
            'created_at'        => $this->createdAt,
            'sent'              => $this->sent,
            'hard_bounces'      => $this->hardBounces,
            'soft_bounces'      => $this->softBounces,
            'blocked_bounces'   => $this->blockedBounces,
            'complaints'        => $this->complaints,
            'rejects'           => $this->rejects,
            'unsubscribes'      => $this->unsubscribes,
            'opens'             => $this->opens,
            'clicks'            => $this->clicks,
            'unique_opens'      => $this->uniqueOpens,
            'unique_clicks'     => $this->uniqueClicks,
        ];
    }
}
