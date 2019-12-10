<?php

declare(strict_types=1);

namespace App\Domain\Mail;

use App\Core\Helper;
use PhpImap\Mailbox;

final class MailProcessor implements MailProcessorInterface
{
    /**
     * @var Mailbox
     */
    private $mailbox;

    public function __construct(Mailbox $mailbox)
    {
        $this->mailbox = $mailbox;
    }

    public function searchMails(): array
    {
        $mails = [];
        $mailsIds = $this->mailbox->searchMailbox('UNSEEN');

        foreach ($mailsIds as $mailId) {
            array_push($mails, $this->mailbox->getMail($mailId));
        }

        return $mails;
    }

    public function getClientData(string $text): string
    {
        $occurrence = ':';
        $keys = ['name', 'address', 'amount', 'due'];

        return Helper::filterMailContent($text, $occurrence, $keys);
    }

    public function downloadAttachments(array $attachments = []): bool
    {
        if (!$attachments) {
            return false;
        }

        foreach ($attachments as $attachment) {
            $attachment->saveToDisk();
        }

        return true;
    }
}
