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

    /**
     * Conteúdo binário do PDF
     *
     * @var string
     */
    public string $pdfContent;

    /**
     * Nome do time
     *
     * @var string
     */
    public string $timeNome;

    /**
     * Create a new message instance.
     */
    public function __construct(string $pdfContent, string $timeNome)
    {
        $this->pdfContent = $pdfContent;
        $this->timeNome = $timeNome;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Relatório do Time: {$this->timeNome}",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.time_pdf', 
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData(
                $this->pdfContent,
                "relatorio_{$this->timeNome}.pdf",
                ['mime' => 'application/pdf']
            ),
        ];
    }
}
