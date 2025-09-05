<?php

namespace App\Services;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Repositories\Contracts\TimeRepositoryInterface;

class GerarPdfService {
    protected $timeRepository;
    public function __construct(TimeRepositoryInterface $timeRepository){
        $this->timeRepository = $timeRepository;
    }

    public function execute()
    {
        $times = $this->timeRepository->allTimes();

        if($times->isEmpty()){
            throw new \Exception('Nenhum time encontrado');
        }

        $pdf = PDF::loadView('pdf_teste', compact('times'));

        return $pdf;
    }
}