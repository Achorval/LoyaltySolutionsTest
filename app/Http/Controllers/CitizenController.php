<?php

namespace App\Http\Controllers;

use Validator;
use Response;
use Illuminate\Http\Request;
use App\Models\Ward;
use App\Models\Lga;
use App\Models\State;
use App\Models\Citizen;

class CitizenController extends Controller
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
     * Show the application State Report.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function statesReport()
    {
        $states = State::withCount('wards')->get();

        return view('states', [
            'states' => $states
        ]);   
    }

    /**
     * Show the application Lga Report.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function lgasReport()
    {
        $lgas = Lga::with('state')->get();

        return view('lgas', [
            'lgas' => $lgas
        ]);   
    }

    /**
     * Show the application Wards Report.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function wardsReport()
    {
        $wards = Citizen::with('ward')->get();

        return view('wards', [
            'wards' => $wards
        ]);   
    }


    /**
     * Show the Create Citizen form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function citizen()
    {   
        $listState = State::get();
        return view('createCitizen', ['collection' => $listState]);
    }

    /**
     * fetch Lga by state_id.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function fetchLgas($id)
    {   
        $data = Lga::where('state_id', '=', $id)->get();

        return Response::json([
            'data' => $data,
            'status'  => 'success',
            'message' => 'Lgas have been retrieved successfully!'
        ]);
    }

    /**
     * fetch Lga by state_id.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function fetchWards($id)
    {   
        $data = Ward::where('lga_id', '=', $id)->get();

        return Response::json([
            'data' => $data,
            'status'  => 'success',
            'message' => 'Wards have been retrieved successfully!'
        ]);
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

        if ($validator->fails()) {
            return redirect('citizen/create')
                        ->withErrors($validator)
                        ->withInput();
        };

        $citizen = Citizen::create([
            'name'    => $request->input('name'),
            'gender'  => $request->input('gender'),
            'address' => $request->input('address'),
            'phone'   => $request->input('phone'),
            'ward_id' => $request->input('ward_id')
        ]);

        if ($citizen) {

            $request->session()->flash('success', 'Citizen record was created successful!');

            return redirect('citizen/create');
        }
    }
}





