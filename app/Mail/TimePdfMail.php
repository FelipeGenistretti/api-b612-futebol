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

    public string $pdfContent;  // conteúdo binário do PDF
    public string $timeNome;

    public function __construct(string $pdfContent, string $timeNome)
    {
        $this->pdfContent = $pdfContent;
        $this->timeNome = $timeNome;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "PDF do time: {$this->timeNome}",
            from: 'felipe.rodrigues@sistemastecnol.com.br' // remetente
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.time_pdf', // seu markdown
        );
    }

    public function attachments(): array
    {
        // garante que o PDF seja binário
        $pdfBinary = $this->pdfContent;

        return [
            Attachment::fromData(
                fn() => $pdfBinary,
                "relatorio_{$this->timeNome}.pdf"
            )->withMime('application/pdf')
        ];
    }
}
