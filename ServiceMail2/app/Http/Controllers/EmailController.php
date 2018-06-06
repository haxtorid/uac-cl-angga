<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compose;
use App\InBox;
use App\User;
use App\SentBox;
use App\Attachment;

class EmailController extends Controller
{
    public function index()
    {
        $userID = auth()->user()->id;

        $data = array(
            "mailbox"   => \App\inBox::where('user_id', $userID)->get(),
            "page"      => "Inbox",
        );
        return view()->make('mail.mailbox')->with($data);
    }

    public function sent()
    {
        $userID = auth()->user()->id;

        $data = array(
            "mailbox"   => \App\SentBox::where('user_id', $userID)->get(),
            "page"      => "SentBox",
        );
        return view()->make('mail.mailbox')->with($data);
    }

    public function show($id)
    {
        $data = array(
            "email" => \App\Compose::where('id', $id)->first(),
        );

        return view()->make('mail.reademail')->with($data);
    }

    public function compose()
    {
        return view()->make('mail.compose');
    }

    public function create(Request $request)
    {
        $user_id = auth()->user()->id;

        // save to compose
        $compose = new Compose();
        $compose->user_id = $user_id;
        $compose->subject = $request->input('subject');
        $compose->content = $request->input('content');
        $compose->created_at = \Carbon\Carbon::now();
        $compose->save();

        // save to inbox
        $receiver_id = User::where('email', $request->input('receiver_email'))->first()->id;
        $inbox              = new InBox();
        $inbox->email_id    = $compose->id;
        $inbox->user_id     = $receiver_id;
        $inbox->save();

        // save to sentbox
        $sentbox            = new SentBox();
        $sentbox->email_id  = $compose->id;
        $sentbox->user_id   = $user_id;
        $sentbox->save();

        // attachment goes here
        if ($request->hasFile('attachment')) {

            $hashfile   = $request->attachment->hashName();
            $origin     = $request->attachment->getClientOriginalName();
            $path       = $request->attachment->store('attachment');

            $attachment = new Attachment();
            $attachment->email_id   = $compose->id;
            $attachment->link       = $hashfile;
            $attachment->filename   = $origin;
            $attachment->save();
        }

        return redirect()->to('mail/');
    }
}
