<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Sections;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
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
