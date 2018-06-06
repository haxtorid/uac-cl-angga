<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
class AuthSSO
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = "";
        
        if (!$request->session()->has('token')) {
            return Redirect()->intended('http://127.0.0.1:8000/login?callback=http://127.0.0.1:8001/callback&redirect=mail');
        } else {
            $token = $request->session()->get('token');
        }

        // $client     = new Client();
        // $response   = $client->post('http://127.0.0.1:8000/check',[
        //     'form_params' => [
        //         'token' => $token,
        //         'secret' => 'totokenan',
        //     ]
        // ]);

        // dd($response);die;

        // $decode     = json_decode($response->body());

        // if (!$deocde->success) {
        //     return Redirect()->intended('http://127.0.0.1:8000/login?callback=http://127.0.0.1:8001/callback&redirect=mail&error=token_invalid');
        // }

        return $next($request);
    }
}
