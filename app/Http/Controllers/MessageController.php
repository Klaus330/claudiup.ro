<?php

namespace App\Http\Controllers;

use App\Mail\Response;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->except("store");
    }

    /*
    *  Store the messages received from guests in the database.
    */
    public function store(Request $request)
    {
        try {
            request()->validate([
                'name' => "required|string",
                'email' => 'required|email',
                'body' => "required|spamfree"
            ]);
            Message::create(request(['name','email','body']));
        } catch (\Exception $e) {
            return response("Sorry, we couldn't save your message. Please, try again!", 422);
        }
        
        return response("Thank you! We will be in touch soon!", 200);
    }

    /*
    * Display the messages table in admin dashbord
    */
    public function table()
    {
        $messages = Message::latest()->paginate(5);
        return view('admin.messages.table', compact('messages'));
    }

    /*
    * Display a single message in admin dashbord
    */
    public function show(Message $message)
    {
        return view('admin.messages.show', compact('message'));
    }


    /*
    * Display a single message in admin dashbord
    */
    public function replyForm(Message $message)
    {
        return view("admin.messages.reply", compact('message'));
    }

    public function reply(Message $message)
    {
        $reply = new Response($message,request('body'));
        Mail::to($message->email)->send($reply);
        
        return redirect()->route('messages.table');    
    }

    /*
    * Delete a message from the table
    */
    public function delete($id)
    {
        Message::find($id)->delete();
        return back();
    }
}
