<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Messages;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function GetMessages()
    {   
        $messages= Messages::all();
        return view('dashboard.messages',['messages'=>$messages]);
    }


    public function DelMessages($id)
    {   
        $messages= Messages::find($id);
        $messages->delete();
        return Redirect('/dashboard/messages');
    }

    public function SearchMessages(Request $request)
    {
        $messages= Messages::where('msg_title','like','%'.$request->name.'%')->get();
        return view('dashboard.messages',['messages'=>$messages]);
    }
}
