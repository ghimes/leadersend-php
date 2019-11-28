<?php declare(strict_types=1);

namespace LeaderSend\Message;

/**
 * Class Message
 * @package LeaderSend
 */
class Message
{
    /**
     * @var Address
     */
    private $from;
    
    /**
     * @var Address
     */
    private $to;

    /**
     * @var string
     */
    private $html = '';

    /**
     * @var string
     */
    private $text = '';

    /**
     * @var string
     */
    private $subject = '';

    /**
     * @var HeaderCollection
     */
    private $headers;

    /**
     * @var bool
     */
    private $autoHtml = false;

    /**
     * @var bool
     */
    private $autoPlain = false;

    /**
     * @var bool
     */
    private $trackOpens = false;

    /**
     * @var bool
     */
    private $trackHtmlClicks = false;

    /**
     * @var bool
     */
    private $trackPlainClicks = false;

    /**
     * @var string
     */
    private $signingDomain = '';

    /**
     * @var AttachmentCollection
     */
    private $attachments;

    /**
     * @var ImageCollection
     */
    private $images;
    
    /**
     * @param Address $from
     *
     * @return $this
     */
    public function setFrom(Address $from): self
    {
        $this->from = $from;
        return $this;
    }

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
     * @param string $html
     *
     * @return $this
     */
    public function setHtml(string $html): self
    {
        $this->html = $html;
        return $this;
    }

    /**
     * @param string $text
     *
     * @return $this
     */
    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @param string $subject
     *
     * @return $this
     */
    public function setSubject(string $subject): self
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @param HeaderCollection $headers
     *
     * @return $this
     */
    public function setHeaders(HeaderCollection $headers): self
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * @param bool $bool
     *
     * @return $this
     */
    public function setAutoHtml(bool $bool): self
    {
        $this->autoHtml = $bool;
        return $this;
    }

    /**
     * @param bool $bool
     *
     * @return $this
     */
    public function setAutoPlain(bool $bool): self
    {
        $this->autoPlain = $bool;
        return $this;
    }

    /**
     * @param bool $bool
     *
     * @return $this
     */
    public function setTrackOpens(bool $bool): self
    {
        $this->trackOpens = $bool;
        return $this;
    }

    /**
     * @param bool $bool
     *
     * @return $this
     */
    public function setTrackHtmlClicks(bool $bool): self
    {
        $this->trackHtmlClicks = $bool;
        return $this;
    }

    /**
     * @param bool $bool
     *
     * @return $this
     */
    public function setTrackPlainClicks(bool $bool): self
    {
        $this->trackPlainClicks = $bool;
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
     * @param AttachmentCollection $attachments
     *
     * @return $this
     */
    public function setAttachments(AttachmentCollection $attachments): self
    {
        $this->attachments = $attachments;
        return $this;
    }

    /**
     * @param ImageCollection $images
     *
     * @return $this
     */
    public function setImages(ImageCollection $images): self
    {
        $this->images = $images;
        return $this;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function toArray(): array
    {
        if (empty($this->from)) {
            throw new \Exception(sprintf('%s::setFrom was never called!', static::class));
        }

        if (empty($this->to)) {
            throw new \Exception(sprintf('%s::setTo was never called!', static::class));
        }
        
        return [
            'from'              => $this->from->toArray(),
            'to'                => $this->to->toArray(),
            'html'              => $this->html,
            'text'              => $this->text,
            'subject'           => $this->subject,
            'headers'           => !empty($this->headers) ? $this->headers->forMessage() : [],
            'auto_html'         => $this->autoHtml,
            'auto_plain'        => $this->autoPlain,
            'tracking'          => [
                'opens'         => $this->trackOpens,
                'html_clicks'   => $this->trackHtmlClicks,
                'plain_clicks'  => $this->trackPlainClicks,
            ],
            'signing_domain' => $this->signingDomain,
            'attachments'    => !empty($this->attachments) ? $this->attachments->toArray() : [],
            'images'         => !empty($this->images) ? $this->images->toArray() : [],
        ];
    }
}
