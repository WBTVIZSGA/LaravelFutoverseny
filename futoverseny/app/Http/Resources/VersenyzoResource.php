<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VersenyzoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string)$this->id,
            'attributes' => [
                'rajtszam' => $this->rajtszam,
                'nev' => $this->nev,
                'szuldatum' => $this->szuldatum,
                'nem' => $this->nem,
                'tavokId' => $this->tavokId,
                'korosztaly' => $this->korosztaly,
            ],
            'relationships' => [
                'id' => (string)$this->tavok->id,
                'tavelnevezes' => $this->tavok->tavelnevezes
            ]
        ];
    }
}
