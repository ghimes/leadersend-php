<?php declare(strict_types=1);

namespace LeaderSend\HttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

/**
 * Class HttpClient
 * @package LeaderSend\HttpClient
 */
class HttpClient implements HttpClientInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $apiKey = '';

    /**
     * @var array
     */
    private static $options = [
        'base_uri' => 'https://api.leadersend.com/1.0/',
        'headers'  => [
            'user-agent' => 'leadersend-php/1.0.0 (https://github.com/twisted1919/leadersend-php)'
        ],
    ];

    /**
     * @param string $apiKey
     * @param array $options
     *
     * @throws \Exception
     */
    public function __construct(string $apiKey = '', array $options = [])
    {
        if (empty($apiKey)) {
            throw new \Exception('Please provide a valid api key!');
        }
        $this->apiKey = $apiKey;
        $this->client = new Client(array_merge_recursive(self::$options, $options));
    }

    /**
     * @param array $params
     *
     * @return array
     */
    protected function mergeDefaultParams(array $params = []): array
    {
        return array_merge_recursive([
            'query' => [
                'apikey' => $this->apiKey,
                'output' => 'json',
            ],
        ], $params);
    }
    
    /**
     * @param string $path
     * @param array $params
     *
     * @return HttpResponseInterface
     * @throws \Exception
     */
    public function get(string $path = '', array $params = []): HttpResponseInterface
    {
        try {
            $response = $this->client->get($path, $this->mergeDefaultParams($params));
            $response = new HttpResponse((string)$response->getBody(), (int)$response->getStatusCode(), (array)$response->getHeaders());
        } catch (BadResponseException $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }

        return $response;
    }

    /**
     * @param string $path
     * @param array $params
     *
     * @return HttpResponseInterface
     * @throws \Exception
     */
    public function post(string $path = '', array $params = []): HttpResponseInterface
    {
        try {
            $response = $this->client->post($path, $this->mergeDefaultParams($params));
            $response = new HttpResponse((string)$response->getBody(), (int)$response->getStatusCode(), (array)$response->getHeaders());
        } catch (BadResponseException $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }

        return $response;
    }
}
