<?php

namespace App\Http\Controllers\Api;

use App\Models\Technician;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;

class TechnicianController extends Controller
{
    // fetch all Technician and send json response
    public function index(){
        $technicians = Technician::latest()->get();

        $responseData = [];

        foreach ($technicians as $technician) {
            $technicianData = [
                'id' =>  $technician->id,
                'name' => $technician->name,
                'email' => $technician->email,
                'category' => $technician->category->name,
                'experience' => $technician->experience,
                'address' => $technician->address,
                'age' => $technician->age,
            ];

            $responseData[] = $technicianData;
        }

        $response = ResponseHelper::successResponse("List of technicians!", $data = $responseData);
        return response()->json($response);
    }

    // get a single technician info.
    public function show($technicianId){
        $technician = Technician::find($technicianId);

        if (!$technician) {
            $response = ResponseHelper::errorResponse("Technician not found", 404);
            return response()->json($response);
        }

        $response = ResponseHelper::successResponse("technician detail's!", $data = $technician);
        return response()->json($response);
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
            $response = ResponseHelper::errorResponse("Technician already exists! Try to add a new technician.", 200, $data = $existingTechnician);
            return response()->json($response);
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

        $response = ResponseHelper::successResponse("New technician inserted successfully!", $data = $technician);
        return response()->json($response);
    }

    // Find the existing technician
    public function edit($id){
        $technician = Technician::with('category')->find($id);

        if (!$technician) {
            // Technician not found
            $response = ResponseHelper::errorResponse("Technician not found!", 404);
            return response()->json($response);
        }

        $response = ResponseHelper::successResponse("technician details.", $data = $technician);
        return response()->json($response);
    }

    // update the technician details
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'address' => 'required|string',
            'age' => 'required|integer|between:18,45',
            'experience' => 'required|integer|between:0,15',
        ]);

        // Find the existing technician with the associated category
        $technician = Technician::with('category')->find($id);

        if (!$technician) {
            // Technician not found
            $response = ResponseHelper::errorResponse("Technician not found!", 404);
            return response()->json($response);
        }

        // Update the existing technician
        $technician->update([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'experience' => $request->experience,
            'address' => $request->address,
        ]);

        // Reload the technician with the associated category after the update
        $technician->load('category');

        $response = ResponseHelper::successResponse("Technician detail's updated successfully!", $data = $technician);
        return response()->json($response);
    }

    // delete a technician
    public function destroy($id){
        $technician = Technician::findOrFail($id);

        // Delete the technician
        $technician->delete();

        $response = ResponseHelper::successResponse("Technician deleted successfully!");
        return response()->json($response);
    }

}
