<?php declare(strict_types=1);

namespace LeaderSend\HttpClient;

/**
 * Interface HttpClientInterface
 * @package LeaderSend\HttpClient
 */
interface HttpClientInterface
{
    /**
     * @param string $path
     * @param array $options
     *
     * @return HttpResponseInterface
     */
    public function get(string $path = '', array $options = []): HttpResponseInterface;

    /**
     * @param string $path
     * @param array $options
     *
     * @return HttpResponseInterface
     */
    public function post(string $path = '', array $options = []): HttpResponseInterface;
}
