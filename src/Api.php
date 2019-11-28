<?php declare(strict_types=1);

namespace LeaderSend;

use LeaderSend\Endpoint\Messages;
use LeaderSend\Endpoint\MessagesInterface;
use LeaderSend\Endpoint\Rejects;
use LeaderSend\Endpoint\RejectsInterface;
use LeaderSend\Endpoint\Users;
use LeaderSend\Endpoint\UsersInterface;
use LeaderSend\HttpClient\HttpClient;

/**
 * Class Api
 * @package LeaderSend
 */
class Api implements ApiInterface
{
    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return MessagesInterface
     */
    public function messages(): MessagesInterface
    {
        return new Messages($this->httpClient);
    }

    /**
     * @return RejectsInterface
     */
    public function rejects(): RejectsInterface
    {
        return new Rejects($this->httpClient);
    }
    
    /**
     * @return UsersInterface
     */
    public function users(): UsersInterface
    {
        return new Users($this->httpClient);
    }
}
