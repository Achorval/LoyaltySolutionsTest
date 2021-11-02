<?php

namespace App\Http\Controllers;

use Validator;
use Response;
use Illuminate\Http\Request;
use App\Models\Ward;
use App\Models\State;
use App\Models\Citizen;

class ReportController extends Controller
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
        $listState = State::get();
        return view('report', ['collection' => $listState]);
    }

    /**
     * fetch Lga by state_id.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function fetchLga($id)
    {   
        return $id;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param   $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function createCitizen(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required',
            'gender'  => 'required',
            'address' => 'required',
            'phone'   => 'required',
            'ward_id' => 'required'
        ]);

        if($validator->fails()) {
            return Response::json([
                'status' => 'error',
                'errors' =>$validator->errors()->toArray()
            ]);
        }

        $citizen = Citizen::create([
            'name'    => $request->input('name'),
            'gender'  => $request->input('gender'),
            'address' => $request->input('address'),
            'phone'   => $request->input('phone'),
            'ward_id' => $request->input('ward_id')
        ]);

        if ($citizen) {

            return Response::json([
                'status'  => 'success',
                'message' => 'Citizen record have been created successfully!'
            ]);
        }

        print($request);
    }
}





