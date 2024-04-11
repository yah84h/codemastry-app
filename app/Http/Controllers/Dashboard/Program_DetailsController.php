<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Program_Details;
use App\Models\Programs;
use App\Models\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Program_DetailsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function GetProgramDetails(Request $request)
    {
        $program_details=DB::table('program_details')
        ->join('programs', 'programs.id','=','program_details.program_id')
        ->join('sections', 'sections.id','=','program_details.section_id')
        ->select(
            'program_name',
            'section_name',
            'description',
            'lesson',
            'duration',
            'price',
            'url_image',
            'program_details.id as program_details_id',
            'programs.id as program_id',
            'sections.id as section_id'
        )
        ->get();


        $programs= Programs::all();
        $sections= Sections::all();
        
        return view('dashboard.program_details',['program_details'=>$program_details, 'programs'=>$programs, 'sections'=>$sections]);
        
    }
    
    public function CreateProgramDetails(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'lesson'=> 'numeric',
            'price'=> 'numeric',
            'url_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            // Handle validation failure
        }

        $image = $request->file('url_image');
        $imageName = $image->getClientOriginalName(); 
        $imagePath = $image->storeAs('images', $imageName, 'public'); 
        
        $program_details= Program_Details::Create([
            'description'=>$request->description,
            'price'=>$request->price,
            'lesson'=>$request->lesson,
            'duration'=>$request->duration,
            'url_image' => $imageName,
            'program_id'=>$request->program_id,
            'section_id'=>$request->section_id,
            'purch'=>0,
        ]);
        
        $program_details->save();
        
        return redirect('/dashboard/program_details');
    }
   

    public function DelProgramDetails($id)
    {   
        $program_details= Program_Details::find($id);
        $program_details->delete();
        return Redirect('/dashboard/program_details');
    }
    
    
    public function SearchProgramDetails(Request $request)
    {
        $program_details=DB::table('program_details')
        ->join('programs', 'programs.id','=','program_details.program_id')
        ->join('sections', 'sections.id','=','program_details.section_id')
        ->select(
            'program_name',
            'section_name',
            'description',
            'lesson',
            'duration',
            'price',
            'url_image',
            'program_details.id as program_details_id',
            'programs.id as program_id',
            'sections.id as section_id'
        )
        ->where('program_name','like','%'.$request->name.'%')
        ->get();

        $programs= Programs::all();
        $sections= Sections::all();
        
        return view('dashboard.program_details',['program_details'=>$program_details, 'programs'=>$programs, 'sections'=>$sections]);
    }

    public function EditProgramDetails($id)
    {
        $program_details=DB::table('program_details')
        ->join('programs', 'programs.id','=','program_details.program_id')
        ->join('sections', 'sections.id','=','program_details.section_id')
        ->select(
            'program_name',
            'section_name',
            'description',
            'lesson',
            'duration',
            'price',
            'url_image',
            'program_details.id as program_details_id',
            'programs.id as program_id',
            'sections.id as section_id'
        )
        ->where('program_details.id','=',$id)
        ->get();


        $programs= Programs::all();
        $sections= Sections::all();
        
        return view('dashboard.editprogramdetails',['program_details'=>$program_details, 'programs'=>$programs, 'sections'=>$sections]);
    }

    public function UpdateProgramDetails(Request $request)
    {
        $program_details= Program_Details::Where('id',$request->id)->update([
            'description'=>$request->description,
            'price'=>$request->price,
            'lesson'=>$request->lesson,
            'duration'=>$request->duration,
            'url_image'=>$request->url_image,
            'section_id'=>$request->section_id,
        ]);
        
        return redirect('/dashboard/program_details');
    }





















    

    
}
