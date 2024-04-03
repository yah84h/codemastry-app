<?php

namespace App\Http\Controllers;

use App\Models\Programs;
use App\Models\Sections;
use Illuminate\Http\Request;
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
        //dd($program_details);
        // $programs= Programs::all();
         //$sections= Sections::all();
        
       
        
        return view('shopping.show_programs',['program_details'=>$program_details]);
    }


}
