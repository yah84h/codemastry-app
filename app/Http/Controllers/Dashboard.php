<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\programs;
use App\Models\Sections;

class Dashboard extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function GetPrograms()
    {   
        $programs= Programs::all();
        return view('dashboard.programs',['programs'=>$programs]);
    }

    public function CreatePrograms(Request $request)
    {   
        $programs= Programs::Create([
        'program_name'=>$request->program_name
        ]);

        $programs->save();
        return Redirect('/dashboard/programs');
    }

    public function DelPrograms($id)
    {   
        $programs= Programs::find($id);
        $programs->delete();
        return Redirect('/dashboard/programs');
    }
    
    public function EditPrograms($id)
    {
        $programs= Programs::find($id);
        return view('dashboard.edit', ['programs'=>$programs]);

    }

    public function UpdateProgram(Request $request)
    {
        $programs= Programs::Where('id',$request->id)->update(
            ['program_name'=>$request->program_name],
        );
        
        return redirect('/dashboard/programs');
    }

    public function SearchProgram(Request $request)
    {
        $programs= Programs::where('program_name','like','%'.$request->name.'%')->get();
        return view('dashboard.programs',['programs'=>$programs]);
    }





    public function GetSections()
    {   
        $sections= Sections::all();
        return view('dashboard.sections',['sections'=>$sections]);
    }

    public function CreateSections(Request $request)
    {   
        $sections= Sections::Create([
        'section_name'=>$request->section_name
        ]);

        $sections->save();
        return Redirect('/dashboard/sections');
    }

    public function DelSections($id)
    {   
        $sections= Sections::find($id);
        $sections->delete();
        return Redirect('/dashboard/sections');
    }
    
    public function EditSections($id)
    {
        $sections= Sections::find($id);
        return view('dashboard.editsections', ['sections'=>$sections]);

    }

    public function UpdateSection(Request $request)
    {
        $sections= Sections::Where('id',$request->id)->update(
            ['section_name'=>$request->section_name],
        );
       
        return redirect('/dashboard/sections');
    }

    public function SearchSection(Request $request)
    {
        $sections= Sections::where('section_name','like','%'.$request->name.'%')->get();
        return view('dashboard.sections',['sections'=>$sections]);
    }
    
}
