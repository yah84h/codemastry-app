<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $program_details_top = DB::table('program_details')
        ->join('programs', 'programs.id','=','program_details.program_id')
        ->join('sections', 'sections.id','=','program_details.section_id')
        ->orderBy('purch', 'desc') 
        ->limit(3)
        ->get();
        return view('/index',['program_details_top'=>$program_details_top]);
    }
    

    public function AboutUs()
    {
        return view('/about_us');
    }

    public function CreateMessages(Request $request)
    {   
        $messages= Messages::Create([
        'sender_name'=>$request->sender_name,
        'sender_email'=>$request->sender_email,
        'msg_title'=>$request->msg_title,
        'msg_content'=>$request->msg_content,
        ]);
        
        $messages->save();
        return Redirect('/aboutus');
    }
}
