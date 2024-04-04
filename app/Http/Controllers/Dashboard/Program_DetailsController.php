<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Program_Details;
use App\Models\Programs;
use App\Models\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Program_DetailsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function GetProgramDetails()
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
        $validate=$request->validate([
            'lesson'=> 'numeric',
            'price'=> 'numeric',
        ]);
        $program_details= Program_Details::Create([
            'description'=>$request->description,
            'price'=>$request->price,
            'lesson'=>$request->lesson,
            'duration'=>$request->duration,
            'url_image'=>$request->url_image,
            'program_id'=>$request->program_id,
            'section_id'=>$request->section_id,
            'purch'=>0,
        ]);
        $program_details->save();
        
        $request->validate([
            'file' => 'required|mimes:jpg,png,gif,svg|max:2048'
        ]);
        
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $request->url_image;
            //$image->move(public_path('images'), $imageName);
            $image= Storage::disk(name:'public')->putFileAs('uploads',$image, name:$request->url_image);
            return 'Image uploaded successfully.';
        } else {
            return 'No image selected.';
        }
        
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
        $programs= Programs::where('program_name','like','%'.$request->name.'%')->get();

        return view('dashboard.program_details');
    }

    public function EditProgramDetails($id)
    {
        
            $programs= Programs::all();
            $program_details= Program_Details::all();
            $sections= Sections::all();
           
            
        return view('dashboard.editprogramdetails',['program_details'=>$program_details, 'programs'=>$programs, 'sections'=>$sections]);
    }

    public function UpdateProgramDetails(Request $request)
    {
        // $programs= Programs::Where('id',$request->id)->update(
        //     ['program_name'=>$request->program_name],
        // );
        
        // return redirect('/dashboard/programs');
    }





















    

    
}