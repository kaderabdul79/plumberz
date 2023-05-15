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
                'name' => $category->name,
            ];
    
            $responseData[] = $categoryData;
        }
    
        return response()->json(['data' => $responseData]);
    }
    
}
