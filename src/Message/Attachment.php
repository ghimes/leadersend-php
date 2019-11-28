<?php declare(strict_types=1);

namespace LeaderSend\Message;

class Attachment
{
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
    private $type = 'application/octet-stream';

    /**
     * Attachment constructor.
     *
     * @param string $name
     * @param string $content
     * @param string $type
     */
    public function __construct(string $name, string $content, string $type = '')
    {
        $this->name    = $name;
        $this->content = $content;
        
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
            'type'    => $this->type,
        ];
    }
}
