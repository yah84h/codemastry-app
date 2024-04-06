<?php

namespace App\Http\Controllers;

use App\Models\Programs;
use App\Models\Sections;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShoppingController extends Controller
{
    public function ShowPrograms(Request $request, $section_id)
    {
        $program_details=DB::table('program_details')
        ->join('programs', 'programs.id','=','program_details.program_id')
        ->join('sections', 'sections.id','=','program_details.section_id')
        ->where('section_id','=',$section_id)
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
        
            $tax= 15;
            $discount=10;
        foreach($program_details as $key=> $row)
        {
            $program_details[$key]->discount=$discount;
            $program_details[$key]->tax=$tax;
            $program_details[$key]->total= ($tax/100+1)*$program_details[$key]->price;
            $program_details[$key]->net= $program_details[$key]->total-(($discount/100)*$program_details[$key]->total);
        }

            return view('shopping.show_programs',['program_details'=>$program_details,'cart_item'=>$cart_item,'cart_sum'=>$cart_sum]);
        }else{
            Session(['count' => 0]);
        }
            
            
            $tax= 15;
            $discount=10;
            
        foreach($program_details as $key=> $row)
        {
            $program_details[$key]->discount=$discount;
            $program_details[$key]->tax=$tax;
            $program_details[$key]->total= ($tax/100+1)*$program_details[$key]->price;
            $program_details[$key]->net= $program_details[$key]->total-(($discount/100)*$program_details[$key]->total);
        }
        

        return view('shopping.show_programs',['program_details'=>$program_details]);
    }

    public function AddToCart(Request $request, $id)
    {

        $userid= $request->user()->id;
        $data=DB::table('program_details')
        ->join('programs', 'programs.id','=','program_details.program_id')
        ->join('sections', 'sections.id','=','program_details.section_id')
        ->where('programs.id','=',$id)
        ->first();

        $tax= 15;
        $discount=10;
        //dd($data->price);
        $data->total= ($tax/100+1)*$data->price;
        $data->discount=$discount;
        $data->tax=$tax;
        $data->net= $data->total-(($discount/100)*$data->total);
        $row=
        [
            'program_id' => $data->program_id,
            'price' => $data->price,
            'tax' => $data->tax,
            'total' => $data->total,
            'desc' => $data->discount,
            'net' => $data->net,
            'user_id' => $userid,
        ];

        DB::table('carts')->insert($row);
        $count=DB::table('carts')
        ->where('user_id',$userid)
        ->count();

        //Session::put('count',$count);
        Session(['count' => $count]);

        return redirect()->back();

    }

    

    
}
