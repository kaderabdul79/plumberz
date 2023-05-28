<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // fetch all User and send json response
    public function index(){
            $users = User::latest()->get();
            $responseData = [];
    
            foreach ($users as $user) {
                $userData = [
                    'id' =>  $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ];
    
                $responseData[] = $userData;
            }
    
            $response = ResponseHelper::successResponse("List of users!", $data = $responseData);
            return response()->json($response);
    }

    // add new user
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
    
        // Check if the user already exists based on email
        $existinguser = User::where('email', $request->email)->first();

        if ($existinguser) {
            // user already exists, return a response
            $response = ResponseHelper::errorResponse("user already exists! Try to add a new user.", 200, $data = $existinguser);
            return response()->json($response);
        }

        // Create a new user
        $user = user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $response = ResponseHelper::successResponse("New user inserted successfully!", $data = $user);
        return response()->json($response);
    }

    // get a single user info.
    public function show($userId){
        $user = User::find($userId);
    
        if (!$user) {
            $response = ResponseHelper::errorResponse("user not found", 404);
            return response()->json($response);
        }
    
        $response = ResponseHelper::successResponse("user detail's!", $data = $user);
        return response()->json($response);
    }
    
    // Find the existing user
    public function edit($id){
        $user = User::find($id);
    
        if (!$user) {
            // user not found
            $response = ResponseHelper::errorResponse("user not found!", 404);
            return response()->json($response);
        }
    
        $response = ResponseHelper::successResponse("user details.", $data = $user);
        return response()->json($response);
    }
    
    // update the user details
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
        ]);
    
        // Find the existing user
        $user = user::find($id);
    
        if (!$user) {
            // user not found
            $response = ResponseHelper::errorResponse("user not found!", 404);
            return response()->json($response);
        }
    
        // Update the existing user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
    
        $response = ResponseHelper::successResponse("user detail's updated successfully!", $data = $user);
        return response()->json($response);
    }

    // delete a user
    public function destroy($id){
        $user = User::findOrFail($id);
    
        // Delete the user
        $user->delete();
    
        $response = ResponseHelper::successResponse("user deleted!");
        return response()->json($response);
    }    
}
