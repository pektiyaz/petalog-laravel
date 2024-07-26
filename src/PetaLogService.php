<?php

namespace Pektiyaz\PetalogLaravel;

use Illuminate\Support\Facades\Http;

class PetaLogService
{
    private ?string $url;
    public function __construct()
    {
        $this->url = env('PETALOG_URL', null);
    }

    public function send(array $data): void{
        if($this->url){
           try{
               Http::post($this->url, $data);
           }catch (\Exception $ex){

           }
        }
    }

}
