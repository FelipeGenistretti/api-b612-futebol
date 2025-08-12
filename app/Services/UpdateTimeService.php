<?php

class UpdateTimeService {
    protected $timeRepository;

    public function __construct(TimeRepositoryInterface $timeRepository){
        $this->timeRepository = $timeRepository;
    }

    public function execute(Time $time, string $nome, ?string $cidade, ?string $estadio){
        return $this->timeRepository->updateTime($time, [
            'nome' => $nome,
            'cidade' => $cidade,
            'estadio' => $estadio,
        ]);
    }
}