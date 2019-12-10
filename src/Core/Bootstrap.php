<?php

declare(strict_types=1);

namespace App\Core;

use App\Domain\Api\ApiSender;
use App\Domain\Mail\MailProcessor;

final class Bootstrap
{
    /**
     * @var ApiSender
     */
    private $mailProcessor;

    /**
     * @var MailProcessor
     */
    private $apiSender;

    public function __construct(
        ApiSender $apiSender,
        MailProcessor $mailProcessor
    ) {
        $this->apiSender = $apiSender;
        $this->mailProcessor = $mailProcessor;
    }

    public function run(): void
    {
        $mails = $this->mailProcessor->searchMails();

        foreach ($mails as $mail) {
            $this->mailProcessor->downloadAttachments(
                $mail->getAttachments()
            );

            $this->apiSender->submit(
                $this->mailProcessor->getClientData($mail->textPlain)
            );
        }
    }
}
