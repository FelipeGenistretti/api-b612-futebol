<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TimeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome'=>$this->nome,
            'cidade'=>$this->cidade,
            'estadio'=>$this->estadio,
            'jogadores'=>JogadorResource::collection($this->whenLoaded('jogadores'))
        ];
    }
}
