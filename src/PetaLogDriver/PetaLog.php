<?php

namespace Pektiyaz\PetalogLaravel\PetaLogDriver;

use Pektiyaz\PetalogLaravel\PetaLogDriver\PetaLogDriver\Services\PetaLogService;

class PetaLog
{
    public const ERROR = 'error';
    public const DEBUG = 'debug';
    public const INFO = 'info';
    public const WARNING = 'warning';

    private static function getAppUrl(): string{
        if( app()->runningInConsole() ){
            return config('app.url');
        }else{
            return request()->method(). ": ". request()->url();
        }
    }
    private static function getRequest(): array{
        if( !app()->runningInConsole() ){
            return request()->all();
        }else{
            return [];
        }
    }

    public static function log($message, $context = [], $level = 'error'){

        (new PetaLogService())->send([
            'message' => $message,
            'type' => 'log',
            'level' => $level,
            'context' => json_encode($context),
            'app_url' => self::getAppUrl(),
            'environment' => config('app.env'),
            'file' => debug_backtrace()[0]['file'] ?? null,
            'line' => debug_backtrace()[0]['line'] ?? null,
            'project_id' => env('PETALOG_ID'),
            'request' => json_encode(self::getRequest())
        ]);
    }

    public static function capture(\Throwable $exception){

        (new PetaLogService())->send([
            'message' => $exception->getMessage(),
            'type' => 'exception',
            'level' => 'error',
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'context' => json_encode($exception->getTrace()),
            'app_url' => self::getAppUrl(),
            'environment' => config('app.env'),
            'project_id' => env('PETALOG_ID'),
            'request' => json_encode(self::getRequest())
        ]);
    }
}
