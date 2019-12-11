<?php

declare(strict_types=1);

use PhpImap\Mailbox;

set_exception_handler(function ($e) {
    echo 'Exception: '.$e->getMessage().PHP_EOL;
    die();
});

return [
    Mailbox::class => static function () {
        return new Mailbox(
            getenv('host_string'),
            getenv('mail'),
            getenv('password'),
            getenv('attach_dir'),
        );
    },
];
