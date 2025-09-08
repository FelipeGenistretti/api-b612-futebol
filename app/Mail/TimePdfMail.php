<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class TimePdfMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $pdfContent;
    public string $timeNome;

    public function __construct(string $pdfContent, string $timeNome)
    {
        $this->pdfContent = $pdfContent;
        $this->timeNome = $timeNome;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Relatório do Time: {$this->timeNome}",
            from: 'felipe.rodrigues@sistemastecnol.com.br' // força o remetente
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.time_pdf',
        );
    }

    public function attachments(): array
    {
        return [
    Attachment::fromData(function () {
        return $this->pdfContent;
    }, "relatorio_{$this->timeNome}.pdf", ['mime' => 'application/pdf']),
];
    }
}
