<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\programs;
use App\Models\Sections;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {

        $user=$request->User()->email;
        return view('dashboard.index');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/logout');
    }
    
    
}
