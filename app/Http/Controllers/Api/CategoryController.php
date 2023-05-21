<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // fetch all category and send json response
    public function index(){
        $categories = Category::all();

        $responseData = [];
    
        foreach ($categories as $category) {
            $categoryData = [
                'id' => $category->id,
                'name' => $category->name
            ];
    
            $responseData[] = $categoryData;
        }
       
        $response = [
            'status' => true,
            'message' => "fetch all categories!",
            'categories' => $responseData
        ];
        return response()->json($response);
    }
    
    // get a category based on id
    public function show($categoryId){
        $category = Category::find($categoryId);

        if (!$category) {
            return response()->json(['error' => 'Category not found']);
        }

        $responseData = [
            'name' => $category->name,
        ];

        return response()->json(['category' => $responseData]);
    }
}
