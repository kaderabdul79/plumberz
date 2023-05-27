<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // fetch all category and send json response
    public function index(){
        $categories = Category::latest()->get();

        $responseData = [];
    
        foreach ($categories as $category) {
            $categoryData = [
                'id' => $category->id,
                'name' => $category->name
            ];
    
            $responseData[] = $categoryData;
        }
       
        $response = ResponseHelper::successResponse("List of Categories!", $data = $responseData);
        return response()->json($response);
    }
    
    // get a category based on id
    public function show($categoryId){
        $category = Category::find($categoryId);

        if (!$category) {
            $response = ResponseHelper::errorResponse("Category not found!", 404, $data = $category);
            return response()->json($response);
        }

        $responseData = [
            'id' => $category->id,
            'name' => $category->name,
        ];

        $response = ResponseHelper::successResponse("List of Categories!", $data = $responseData);
        return response()->json($response);
    }

    // create a new category
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        // Check if the category already exists
        $existingCategory = Category::where('name', $request->name)->first();

        if ($existingCategory) {
            // Category already exists, Try to add unique category
            $response = ResponseHelper::errorResponse("Category already exists!Try to add unique category", 200, $data = $existingCategory);
            return response()->json($response);
        }

        $category = Category::create([
            'name' => $request->name,
        ]);

        $response = ResponseHelper::successResponse("New Category Inserted!", $data = $category);
        return response()->json($response);
    }

    // edit getegory
    public function edit($id){
        // Find the category by ID
        $category = Category::find($id);

        // Check if the category exists
        if (!$category) {
            $response = ResponseHelper::errorResponse("Category not found!", 404, $data = $category);
            return response()->json($response);
        }
        
        $response = ResponseHelper::successResponse("Category details retrieved successfully!", $data = $category);
        return response()->json($response, 200);
    }

    // delete a category
    public function destroy($id){
        $category = Category::findOrFail($id);
    
        // Delete category
        $category->delete();
    
        $response = ResponseHelper::successResponse('Category deleted!');
        return response()->json($response, 201);
    }

}
