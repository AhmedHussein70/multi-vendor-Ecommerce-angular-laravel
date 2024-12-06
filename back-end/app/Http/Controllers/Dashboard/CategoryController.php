<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Dashboard\CategoryRequest;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all(); 
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

        $validatedData = $request->validated(); // Get Validated data from the form
        $category = Category::create($validatedData); // Insert the new category

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');

        


        // Return a response (e.g., JSON or redirect)
       /* return response()->json([
            'message' => 'Category created successfully.',
            'category' => $category,
        ], 201);
        */
    }
        
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id); // Fetch the category or throw 404 if not found
        $categories = Category::all();
        return view('dashboard.categories.edit', compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
             
        $category = Category::findOrFail($id);
        // Validate and update the category
        $validatedData = $request->validated();
        $category->update($validatedData);

            // Redirect with a success message
            return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
        
    }
}
