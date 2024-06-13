<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Mail\WelcomeMail;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{

    private User $user;

    public function __construct()
    {
        if (Auth::check())
            $this->user = Auth::user();
    }


    /**
     * Display a listing of the resource.
     */
    public function indexIn()
    {

        // $messages = Message::orderBy('created_at', 'desc')->get();
        $messages = $this->user->receivedMessages()
        ->orderBy('isRead', 'asc')
        ->orderBy('created_at', 'desc')
        ->get();

        // dd($user->receivedMessages);
        $context = [
            'messages' => $messages,
            'unread' => $this->user->unreadMessages(),
            'page' => 'in'
        ];

        return view('messages.index', $context);
    }


    public function indexOut()
    {
        $messages = $this->user->sentMessages()
        ->orderBy('created_at', 'desc')
        ->get();

        // dd($user->receivedMessages);
        $context = [
            'messages' => $messages,
            'page' => 'out'
        ];

        return view('messages.index', $context);

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        if (Auth::check()) //&& !Auth::user()->is($user)){
        {

            return view ('messages.create', [
                'recipient' => $user
            ]);
        } else {
            dd('no');
        }
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {

        $fields = $request->validate([
            'subject' => ["required", "max:255"],
            'body' => ["required"]
        ]);

        $this->user->sentMessages()->create([
            "subject" => $request->subject,
            "body" => $request->body,
            "sender_id" => $this->user->id,
            "recipient_id" => $user->id
        ]);


        Mail::to($user->email)->send(new WelcomeMail($user));


        // return back()->with('success', 'Messages sent successfully');

        return redirect('profiles')->with('success', 'Messages sent successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        $message->update([
            'isRead' => true
        ]);
        $context = [
            'message' => $message
        ];
        return view('messages.show', $context);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
