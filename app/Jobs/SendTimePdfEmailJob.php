<?php

namespace App\Jobs;

use App\Factories\MakeGerarPdfTimeService;
use App\Mail\TimePdfMail;
use App\Models\Time;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


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
        try {
            $time = Time::findOrFail($this->timeId);

            $service = MakeGerarPdfTimeService::make();
            $pdf = $service->execute($this->timeId);
            $pdfContent = $pdf->output();

            Mail::to($this->email)->send(new TimePdfMail($pdfContent, $time->nome));

            Log::info("Email enviado com sucesso para {$this->email}");
        } catch (\Exception $e) {
            Log::error("Falha no Job SendTimePdfEmailJob: ".$e->getMessage());
            throw $e; // mantém o Horizon/Job ciente da falha
        }
    }
}
