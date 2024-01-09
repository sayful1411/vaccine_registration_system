<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VaccineCenter;
use App\Models\UserVaccineRegistration;

class VaccineRegistrationController extends Controller
{
    public function index()
    {
        $vaccine_centers = VaccineCenter::all();

        return view('index', compact('vaccine_centers'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'vaccine_center_id' => 'required',
            'name' => 'required|string|max:50',
            'phone_number' => 'required|numeric|unique:user_vaccine_registrations,phone_number|digits:11',
            'nid' => 'required|numeric|unique:user_vaccine_registrations,nid|digits:10',
            'email' => 'required|email|unique:user_vaccine_registrations,email',
        ]);

        // dd($request->all());
        $data = $request->all();
        UserVaccineRegistration::create($data);

        return redirect()->route('index');
    }
}
