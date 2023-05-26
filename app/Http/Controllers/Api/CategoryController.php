<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
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

    // create a new category
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        // Check if the category already exists
        $existingCategory = Category::where('name', $request->name)->first();

        if ($existingCategory) {
            // Category already exists, Try to add unique category
            $response = [
                'status' => false,
                'message' => 'Category already exists!Try to add unique category.',
                'category' => $existingCategory
            ];
            return response()->json($response, 200);
        }

        $category = Category::create([
            'name' => $request->name,
        ]);

        $response = [
            'status' => true,
            'message' => "New Category Inserted!",
            'category' => $category
        ];
        return response()->json($response, 201);
    }

    // edit getegory
    public function edit($id){
        // Find the category by ID
        $category = Category::find($id);

        // Check if the category exists
        if (!$category) {
            $response = [
                'status' => false,
                'message' => 'Category not found!',
            ];
            return response()->json($response, 404);
        }

        $response = [
            'status' => true,
            'message' => 'Category details retrieved successfully!',
            'category' => $category,
        ];
        return response()->json($response, 200);
    }

    // delete a category
    public function destroy($id){
        $category = Category::findOrFail($id);
    
        // Delete category
        $category->delete();
    
        return response()->json([
            'status' => true,
            'message' => 'Category deleted!',
        ]);
    }

}
