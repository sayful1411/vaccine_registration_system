<?php

namespace App\Http\Controllers;

use App\Models\UserVaccineRegistration;
use Illuminate\Http\Request;

class ZapierWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $data = $request->json()->all();

        // Extract vaccine center ID from the selected option
        $vaccineCenterOption = $data['vaccine_center_id'];
        preg_match('/(\d+)/', $vaccineCenterOption, $matches);
        $vaccineCenterId = $matches[0];

        UserVaccineRegistration::create([
            'vaccine_center_id' => $vaccineCenterId,
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'nid' => $data['nid'],
            'email' => $data['email'],
        ]);

        return response()->json(['message' => 'User registered successfully'], 200);
    }
}
