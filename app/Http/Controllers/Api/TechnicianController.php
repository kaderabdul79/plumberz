<?php

namespace App\Http\Controllers\Api;

use App\Models\Technician;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechnicianController extends Controller
{
    // fetch all Technician and send json response
    public function index(){
        $technicians = Technician::all();

        $responseData = [];

        foreach ($technicians as $technician) {
            $technicianData = [
                'name' => $technician->name,
                'email' => $technician->email,
            ];

            $responseData[] = $technicianData;
        }

        return response()->json(['data' => $responseData]);
    }

    // get a single technician info.
    public function show($technicianId){
        $technician = Technician::find($technicianId);

        if (!$technician) {
            return response()->json(['error' => 'Technician not found']);
        }

        $responseData = [
            'name' => $technician->name,
            'email' => $technician->email,
        ];

        return response()->json(['data' => $responseData]);
    }

    // add new technician
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            // 'category' => 'required',
            'address' => 'required|string',
            'age' => 'required|integer|between:18,45',
            'experience' => 'required|integer|between:0,15',
        ]);
    
        // Check if the technician already exists based on email
        $existingTechnician = Technician::where('email', $request->email)->first();

        if ($existingTechnician) {
        // Technician already exists, return a response
            $response = [
                'status' => false,
                'message' => 'Technician already exists! Try to add a new technician.',
                'technician' => $existingTechnician
            ];
            return response()->json($response, 200);
        }

        // Create a new technician
        $technician = Technician::create([
            'name' => $request->name,
            'email' => $request->email,
            'admin_id' => 3,
            'category_id' => 7,
            'age' => $request->age,
            'experience' => $request->experience,
            'address' => $request->address,
        ]);

        $response = [
            'status' => true,
            'message' => 'New technician inserted successfully!',
            'technician' => $technician
        ];
        return response()->json($response, 201);
    }
}
