<?php declare(strict_types=1);

namespace LeaderSend\Response;

/**
 * Class SendMessageResponse
 * @package LeaderSend\Response
 */
class SendMessageResponse extends Response
{
    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        if (!parent::isSuccess()) {
            return false;
        }
        
        $response = $this->getResponseData()[0] ?? [];
        return isset($response['status']) && $response['status'] === 'sent';
    }
    
    /**
     * @return string
     */
    public function getMessageId(): string
    {
        return $this->getResponseData()[0]['id'] ?? '';
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->getResponseData()[0]['email'] ?? '';
    }
    
    /**
     * @return string
     */
    public function getRejectReason(): string
    {
        $response = $this->getResponseData()[0] ?? [];
        return isset($response['reject_reason']) ? $response['reject_reason'] : '';
    }
}
