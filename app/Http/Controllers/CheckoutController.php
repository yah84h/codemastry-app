<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function Index(Request $request)
    {
        $program_details=DB::table('program_details')
        ->join('programs', 'programs.id','=','program_details.program_id')
        ->join('sections', 'sections.id','=','program_details.section_id')
        ->get();

        if (Auth::check()) {
            $userid= $request->user()->id;
            $count=DB::table('carts')
            ->where('user_id',$userid)
            ->count();
      
            Session(['count' => $count]);
    
            $cart_item=DB::table('carts')
            ->join('programs', 'programs.id','=','carts.program_id')
            ->join('program_details', 'program_details.program_id','=','carts.program_id')
            ->join('sections', 'sections.id','=','program_details.section_id')
            ->where('user_id',$userid)
            ->get();
            
            $cart_sum=DB::table('carts')
            ->where('user_id',$userid)
            ->sum(DB::raw('net'));

            $tax= 15;
            $discount=10;
            
        foreach($program_details as $key=> $row)
        {
            $program_details[$key]->discount=$discount;
            $program_details[$key]->tax=$tax;
            $program_details[$key]->total= ($tax/100+1)*$program_details[$key]->price;
            $program_details[$key]->net= $program_details[$key]->total-(($discount/100)*$program_details[$key]->total);
        }
            
            return view('shopping.checkout',['program_details'=>$program_details ,'cart_item'=>$cart_item, 'cart_sum'=>$cart_sum]);
        
        }else{

            return redirect('/');
        }
    }
}
