<?php

class FindByIdService {
    protected $timeRepository;

    public function __construct(TimeRepositoryInterface $timeRepository){
        $this->timeRepository = $timeRepository;
    }

    public function execute(int $id){
        return $this->timeRepository->findById($id);
    }
}