<?php declare(strict_types=1);

namespace LeaderSend\Endpoint;

use LeaderSend\Response\Response;

interface UsersInterface
{
    /**
     * @return Response
     * @throws \Exception
     */
    public function ping(): Response;
}
