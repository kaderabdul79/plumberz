<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    // get all admin and associated data
    public function index(){
        $admins = Admin::with('technicians')->get();

        $responseData = [];
    
        foreach ($admins as $admin) {
            $adminData = [
                'name' => $admin->name,
                'technicians' => [],
            ];
    
            foreach ($admin->technicians as $technician) {
                $adminData['technicians'][] = [
                    'name' => $technician->name,
                ];
            }
    
            $responseData[] = $adminData;
        }
    
        return response()->json(['data' => $responseData]);
    }
}
