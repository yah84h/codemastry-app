<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function index(Request $request)
    {
        $program_details_top = DB::table('program_details')
        ->join('programs', 'programs.id','=','program_details.program_id')
        ->join('sections', 'sections.id','=','program_details.section_id')
        ->orderBy('purch', 'desc') 
        ->limit(3)
        ->get();

        if (Auth::check()) {
            $userid= $request->user()->id;
            $count=DB::table('carts')
            ->where('user_id',$userid)
            ->count();
            //Session::put('count',$count);
            Session(['count' => $count]);
    
            $cart_item=DB::table('carts')
            ->join('programs', 'programs.id','=','carts.program_id')
            ->join('program_details', 'program_details.program_id','=','carts.program_id')
            ->where('user_id',$userid)
            ->get();
            
            $cart_sum=DB::table('carts')
            ->where('user_id',$userid)
            ->sum(DB::raw('net'));

            return view('/index',['program_details_top'=>$program_details_top,'cart_item'=>$cart_item, 'cart_sum'=>$cart_sum]);
            
        }else{
            Session(['count' => 0]);
        }
        
        return view('/index',['program_details_top'=>$program_details_top]);
       
        
    }
    

    public function AboutUs(Request $request)
    {
        if (Auth::check()) {
            $userid= $request->user()->id;
            $count=DB::table('carts')
            ->where('user_id',$userid)
            ->count();
            //Session::put('count',$count);
            Session(['count' => $count]);
    
            $cart_item=DB::table('carts')
            ->join('programs', 'programs.id','=','carts.program_id')
            ->join('program_details', 'program_details.program_id','=','carts.program_id')
            ->where('user_id',$userid)
            ->get();
            
            $cart_sum=DB::table('carts')
            ->where('user_id',$userid)
            ->sum(DB::raw('net'));

            return view('/about_us',['cart_item'=>$cart_item, 'cart_sum'=>$cart_sum]);
            
        }else{
            Session(['count' => 0]);
        }
        return view('/about_us');
    }
    
    public function Thanks(Request $request)
    {
        if (Auth::check()) {
            $userid= $request->user()->id;
            $count=DB::table('carts')
            ->where('user_id',$userid)
            ->count();
            //Session::put('count',$count);
            Session(['count' => $count]);
    
            $cart_item=DB::table('carts')
            ->join('programs', 'programs.id','=','carts.program_id')
            ->join('program_details', 'program_details.program_id','=','carts.program_id')
            ->where('user_id',$userid)
            ->get();
            
            $cart_sum=DB::table('carts')
            ->where('user_id',$userid)
            ->sum(DB::raw('net'));

            return view('/thanks',['cart_item'=>$cart_item, 'cart_sum'=>$cart_sum]);
            
        }else{
            Session(['count' => 0]);
        }
        return view('/thanks');
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
