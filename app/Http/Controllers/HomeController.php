<?php

namespace App\Http\Controllers;

use Validator;
use Response;
use Illuminate\Http\Request;
use App\Models\Ward;
use App\Models\State;
use App\Models\Citizen;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $citizenlist = Citizen::get();
        $citizenCount = $citizenlist->count();

        return view('home', [
            'report' => $citizenCount
        ]);
        
    }

     
}
