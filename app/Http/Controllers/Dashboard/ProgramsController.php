<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Programs;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
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
}
