<?php

declare(strict_types=1);

namespace App\Domain\Api;

use GuzzleHttp\Client;

final class ApiSender implements ApiSenderInterface
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $apiUrl;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->apiUrl = getenv('api_url');
    }

    public function submit(string $data): int
    {
        $response = $this->client->request('POST', $this->apiUrl, [
            'body' => $data,
        ]);

        return $response->getStatusCode();
    }
}
