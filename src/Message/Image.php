<?php declare(strict_types=1);

namespace LeaderSend\Message;

class Image
{
    const DEFAULT_MIME_TYPE = 'application/octet-stream';
    
    /**
     * @var string
     */
    private $name = '';

    /**
     * @var string
     */
    private $content = '';

    /**
     * @var string
     */
    private $cid = '';
    
    /**
     * @var string
     */
    private $type = 'application/octet-stream';

    /**
     * @param string $name
     * @param string $content
     * @param string $cid
     * @param string $type
     */
    public function __construct(string $name, string $content, string $cid, string $type = '')
    {
        $this->name    = $name;
        $this->content = $content;
        $this->cid     = $cid;
        
        if (!empty($type)) {
            $this->type = $type;
        }
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
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getCid(): string
    {
        return $this->cid;
    }
    
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    
    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name'    => $this->name,
            'content' => $this->content,
            'cid'     => $this->cid,
            'type'    => $this->type,
        ];
    }
}
