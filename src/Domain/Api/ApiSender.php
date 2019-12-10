<?php

declare(strict_types=1);

namespace App\Domain\Api;

use GuzzleHttp\Client;

final class ApiSender implements ApiSenderInterface
{
    /**
     * @var string
     */
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = getenv('api_url');
    }

    public function submit(string $data): int
    {
        $client = new Client();

        $response = $client->request('POST', $this->apiUrl, [
            'body' => $data
        ]);

        return $response->getStatusCode();
    }
}
