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
}
