<?php

namespace Pektiyaz\PetalogLaravel;

use Illuminate\Support\Facades\Http;

class PetaLogService
{
    private string $url;
    public function __construct()
    {
        $this->url = env('PETALOG_URL');
    }

    public function send(array $data): void{
        Http::post($this->url, $data);
    }

}
