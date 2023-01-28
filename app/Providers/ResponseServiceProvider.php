<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('jsonSuccess',function($data = [], $msg = '', $parent = 'items'){
            return Response::json([
                'diagnostics' => [
                    'status' => true, 
                    'message' => $msg
                ],
                $parent => $data
            ]);
        });
        
        Response::macro('jsonError',function($status = '', $msg, $code = 404, $codeRsp = 404){
            return Response::json([
                'diagnostics' => [
                    'status' => $status, 
                    'code' => $code, 
                    'message' => $msg
                ]
                ], $codeRsp);
        });
    }
}
