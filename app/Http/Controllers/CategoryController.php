<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_category_admin()
    {
        // Fetch all categories from the database
        $categories = Category::all();

        // Return the view with the categories data
        return view('dashboard.admin.categories', compact('categories'));
    }
    
    
    public function showcategories()
    {
        $categories = Category::all();
        // Return the view with the categories data
        return view('pages.layouts', compact('categories'));
    }
    

    
    public function store_category_admin(Request $request)
    {   
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);
        // Handle file upload if a file is provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imagePath = $file->store('images', 'public'); // Store the file in the 'public' disk
        } else {
            $imagePath = 'aucune'; // Set to null if no file is uploaded
        }
        // Create a new category
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            
        ]);
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    
    public function show_category_admin(string $id)
    {
        // Find the category by ID
        $category = Category::findOrFail($id);

        // Return the view with the category data
        return view('dashboard.admin.categories.show', compact('category'));
    }

    
    public function edit_category_admin(string $id)
    {
        // Find the category by ID
        $category = Category::findOrFail($id);

        // Return the view to edit the category
        return view('dashboard.admin.editcategorie', compact('category'));
    }

    
    public function update_category_admin(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        // Find the category by ID and update it
        $category = Category::findOrFail($id);
        $category->update($request->all());

        // Redirect to the categories index with a success message
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function events_par_categorie_accueil(string $id){
        $events = Event::where('category_id', $id)->get(); // Ajoutez ->get()
        $categories = Category::all();
        return view('pages.eventsparcategory' , compact('events', 'categories'));


    }

    
    public function destroy_category_admin(string $id)
    {
        // Find the category by ID
        $category = Category::findOrFail($id);

        // Delete the category
        $category->delete();

        // Redirect to the categories index with a success message
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
