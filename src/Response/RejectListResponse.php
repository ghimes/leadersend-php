<?php declare(strict_types=1);

namespace LeaderSend\Response;

use LeaderSend\Reject\RejectListCollection;
use LeaderSend\Reject\RejectListItem;

/**
 * Class RejectListResponse
 * @package LeaderSend\Response
 */
class RejectListResponse extends Response
{
    /**
     * @return RejectListCollection
     * @throws \Exception
     */
    public function getRejects(): RejectListCollection
    {
        $rejects = [];
        foreach ($this->getResponseData() as $item) {
            $rejects[] = new RejectListItem($item);
        }
        
        return new RejectListCollection($rejects);
    }
}
