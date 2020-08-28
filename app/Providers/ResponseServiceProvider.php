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
        Response::macro('jsonSuccess',function($data = [], $msg = ''){
            return Response::json([
                'diagnostic' => [
                    'status' => true, 
                    'message' => $msg
                ],
                'data' => $data
            ]);
        });
        
        Response::macro('jsonError',function($status = '', $msg, $codeRsp = 404){
            return Response::json([
                'diagnostic' => [
                    'status' => $status, 
                    'message' => $msg
                ]
                ], $codeRsp);
        });
    }
}
