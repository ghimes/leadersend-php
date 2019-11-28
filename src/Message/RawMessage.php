<?php declare(strict_types=1);

namespace LeaderSend\Message;

/**
 * Class RawMessage
 * @package LeaderSend
 */
class RawMessage
{
    /**
     * @var Address
     */
    private $to;

    /**
     * @var string
     */
    private $raw = '';
    
    /**
     * @var string
     */
    private $signingDomain = '';
    
    /**
     * @param Address $to
     *
     * @return $this
     */
    public function setTo(Address $to): self
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @param string $raw
     *
     * @return $this
     */
    public function setRaw(string $raw): self
    {
        $this->raw = $raw;
        return $this;
    }
    
    /**
     * @param string $domain
     *
     * @return $this
     */
    public function setSigningDomain(string $domain): self
    {
        $this->signingDomain = $domain;
        return $this;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function toArray(): array
    {
        if (empty($this->to)) {
            throw new \Exception(sprintf('%s::setTo was never called!', static::class));
        }

        return [
            'to'             => $this->to->toArray(),
            'raw'            => $this->raw,
            'signing_domain' => $this->signingDomain,
        ];
    }
}
