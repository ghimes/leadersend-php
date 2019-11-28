<?php declare(strict_types=1);

namespace LeaderSend\Test;

use PHPUnit\Framework\TestCase;
use LeaderSend\Api;
use LeaderSend\HttpClient\HttpClient;

/**
 * Class Base
 * @package LeaderSend\Test
 */
class Base extends TestCase
{
    /**
     * @return Api
     * @throws \Exception
     */
    public function getApi(): Api
    {
        $apiKey = getenv('LEADERSEND_API_KEY');
        if (empty($apiKey)) {
            throw new \Exception('Please provider the right api key by setting you LEADERSEND_API_KEY environment variable!');
        }
        
        return new Api(new HttpClient($apiKey));
    }
}
