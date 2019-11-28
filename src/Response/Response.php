<?php declare(strict_types=1);

namespace LeaderSend\Response;

use LeaderSend\HttpClient\HttpResponse;

/**
 * Class Response
 * @package LeaderSend\Response
 */
class Response extends HttpResponse
{
    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return (int)($this->getResponseData()['code'] ?? 0);
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->getResponseData()['error'] ?? '';
    }

    /**
     * @return bool
     */
    public function isError(): bool
    {
        return $this->getErrorCode() && $this->getErrorMessage();
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return !$this->isError();
    }
}
