<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Log;
class AuthController extends Controller
{
    //
    public function callback(Request $request)
    {
        $redirect   = $request->query('redirect');
        $token      = $request->query('token');
        
        // $request->session()->put('token', $token);
        session(['token'=> $token]);

        $data = array(
            "redirect" => $redirect,
        );

        return view()->make('redirect')->with($data);    
        exit;   
    }
}
