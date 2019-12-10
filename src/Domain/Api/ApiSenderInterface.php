<?php

declare(strict_types=1);

namespace App\Domain\Api;

interface ApiSenderInterface
{
    /**
     * @return int
     */
    public function submit(string $data);
}
