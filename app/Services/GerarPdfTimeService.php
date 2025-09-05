<?php

namespace App\Services;

use App\Repositories\Contracts\TimeRepositoryInterface;
use Barryvdh\DomPDF\Facade\Pdf;

class GerarPdfTimeService
{
    protected $timeRepository;

    public function __construct(TimeRepositoryInterface $timeRepository)
    {
        $this->timeRepository = $timeRepository;
    }

    public function execute(int $id)
    {
        $time = $this->timeRepository->timeComJogadoresById($id);

        $pdf = Pdf::loadView('pdf_time_unico', compact('time'));

        return $pdf;
    }
}
