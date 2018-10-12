<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
      $this->middleware("auth")->except("store");
    }

    /*
	*  Store the messages received from guests in the database.
    */
    public function store(Request $request){
    	
    	$this->validate(request(),[
    		'name' => "required|string",
    		'email' => 'required|email',
    		'body' => "required"
    	]);
        
        Message::create(request(['name','email','body']));
    
        return ['message' => "Thank you!"];
    }

    /*
    * Display the messages table in admin dashbord
    */
    public function table()
    {
        $messages = Message::latest()->paginate(15);
        return view('admin.messages.table',compact('messages'));
    }

    /*
    * Display a single message in admin dashbord
    */
    public function show($id){
        $message = Message::find($id);
        return view('admin.messages.show',compact('message'));
    }

    /*
    * Delete a message from the table
    */
    public function delete($id){
        Message::find($id)->delete();
        return back();
    }
}
