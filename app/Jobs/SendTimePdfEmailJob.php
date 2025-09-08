<?php
namespace App\Jobs;

use App\Factories\MakeGerarPdfTimeService;
use App\Models\Time;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendTimePdfEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected int $timeId;
    protected string $email;

    public function __construct(int $timeId, string $email)
    {
        $this->timeId = $timeId;
        $this->email = $email;
    }

    public function handle(): void
    {
        $service = MakeGerarPdfTimeService::make();
        $pdf = $service->execute($this->timeId);
        $pdfContent = $pdf->output();

        $time = Time::findOrFail($this->timeId);

        Mail::send([], [], function ($message) use ($time, $pdfContent) {
            $message->to($this->email)
                    ->subject("PDF do time {$time->nome}")
                    ->attachData($pdfContent, "time_{$time->id}.pdf", [
                        'mime' => 'application/pdf',
                    ]);
        });
    }
}
