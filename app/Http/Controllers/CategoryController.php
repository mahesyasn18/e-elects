<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $categories = Category::get();
        $data = [
            "category" => $categories
        ];

        return view("admin.category.category", $data);
    }
    public function process(Request $request)
    {
        $request->validate([
            "category" => "required|unique:categories"
        ]);
        Category::create([
            "category" => $request->category
        ]);

        session()->flash("created", "success to create new category");
        return redirect()->route("addcategory");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "category" => "required|unique:categories"
        ]);
        $category = Category::findOrFail($id);
        $category->update([
            "category" => $request->category
        ]);

        session()->flash("updated", "success to update category");
        return redirect()->route("addcategory");
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('deleted', "success to delete category");
    }
}
