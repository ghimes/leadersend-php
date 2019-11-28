<?php declare(strict_types=1);

namespace LeaderSend\Endpoint;

use LeaderSend\Reject\RejectAdd;
use LeaderSend\Reject\RejectDelete;
use LeaderSend\Reject\RejectList;
use LeaderSend\Response\RejectListResponse;
use LeaderSend\Response\Response;

interface RejectsInterface
{
    /**
     * @param RejectAdd $reject
     *
     * @return Response
     * @throws \Exception
     */
    public function add(RejectAdd $reject): Response;

    /**
     * @param RejectDelete $reject
     *
     * @return Response
     * @throws \Exception
     */
    public function delete(RejectDelete $reject): Response;

    /**
     * @param RejectList|null $reject
     *
     * @return RejectListResponse
     * @throws \Exception
     */
    public function list(?RejectList $reject = null): RejectListResponse;
}
