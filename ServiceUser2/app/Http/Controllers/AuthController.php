<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;
class AuthController extends Controller
{
    //
    public function index()
    {
        return view()->make('login');
    }

    public function login(Request $request)
    {
        $callback   = $request->callback; // http://127.0.0.1:8001/callback
        $redirect   = $request->redirect; // /mail
        $email      = $request->email;
        $password   = $request->password;

        if ($request->session()->has('token') && empty($callback) && empty($redirect)) {
            die;
            return Redirect()->intended($callback . "?&redirect=" . $redirect);
        }

        
        $user   = User::where('email', $email)->first();

        $valid  = Hash::check($password, $user->password);

        if(!$valid) {
            return redirect('/login');
        }

        $accessToken    = $this->generateToken(20);
        $secretKey      = "totokenan";

        $sig = hash_hmac(
		    'sha256',
		     $accessToken,
		     $secretKey
        );
        
        $user->token = $sig;
        $user->save();

        session(['save'=>$sig]);

        // $request->session()->put('token', $sig);
        // $request->session()->save();

        $data = array(
            "token"     => $accessToken,
            "redirect"  => $redirect,
            "callback"  => $callback,
        );

        return view()->make('redirect')->with($data);
        // return Redirect()->intended($callback . '?token=' . $accessToken . "&redirect=" . $redirect);
    }

    function generateToken($length = 16)
	{
	    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    public function check(Request $request)
    {

        // $token  = $request->token;
        // $secret = $request->secret;

        // $signature = $request->session()->get('signature');

        // if ($signature == hash_hmac('sha256', $token, $secret)) {
        //     return response()->json([
        //         "success"   => true,
        //         "data"      => User::where('token', $signature)->first(),
        //     ]);
        // }

        // return response()->json([
        //     "success"   => false,
        //     "data"      => null,
        // ]);
    }
    
    
}
