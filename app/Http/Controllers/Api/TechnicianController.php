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
}
