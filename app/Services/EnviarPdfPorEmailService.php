<?php

namespace App\Services;

use App\Repositories\Contracts\TimeRepositoryInterface;
use App\Jobs\SendTimePdfEmailJob;
use Illuminate\Support\Facades\Auth;

class EnviarPdfPorEmailService
{
    protected $timeRepository;

    public function __construct(TimeRepositoryInterface $timeRepository)
    {
        $this->timeRepository = $timeRepository;
    }

    public function execute($time_id): void
    {
        $time = $this->timeRepository->findById($time_id);

        $user = Auth::user();

        SendTimePdfEmailJob::dispatch($time->id, $user->email);
    }
}
