<?php

declare(strict_types=1);

namespace App\Domain\Mail;

interface MailProcessorInterface
{
    /**
     * @return array
     */
    public function searchMails();

    /**
     * @return string
     */
    public function getClientData(string $text);

    /**
     * @return bool
     */
    public function downloadAttachments(array $attachments = []);
}
