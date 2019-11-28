<?php declare(strict_types=1);

namespace LeaderSend;

use LeaderSend\Endpoint\MessagesInterface;
use LeaderSend\Endpoint\Rejects;
use LeaderSend\Endpoint\RejectsInterface;
use LeaderSend\Endpoint\Users;
use LeaderSend\Endpoint\UsersInterface;

/**
 * Interface ApiInterface
 * @package LeaderSend
 */
interface ApiInterface
{
    /**
     * @return MessagesInterface
     */
    public function messages(): MessagesInterface;

    /**
     * @return Rejects
     */
    public function rejects(): RejectsInterface;
    
    /**
     * @return Users
     */
    public function users(): UsersInterface;
}
