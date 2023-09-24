<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index()
    {
        if (!Auth::user()){
            return view('errors.404');
        } 
        else if (Auth::user()->roleID == 1) {
            $categories = Categories::all();
            return view("categories.index", compact("categories"));
        } else {
            return view("errors.404");
        }
    }

    public function create()
    {
        if (!Auth::user()){
            return view('errors.404');
        } 
        else if (Auth::user()->roleID == 1) {
            return view("categories.create");
        } else {
            return view("errors.404");
        }
    }

    public function store(Request $request)
    {
        if (!Auth::user()){
            return view('errors.404');
        } 
        else if (Auth::user()->roleID == 1) {
            $request->validate([
                "name" => "required|unique:categories|max:255",
            ]);

            $category = new Categories();
            $category->name = $request->input("name");
            $category->save();

            return redirect()
                ->route("categories.index")
                ->with("success", "Category created successfully.");
        } else {
            return view("errors.404");
        }
    }

    public function edit($id)
    {
        if (!Auth::user()){
            return view('errors.404');
        } 
        else if (Auth::user()->roleID == 1) {
            $category = Categories::find($id);

            if (!$category) {
                return view("errors.404");
            }

            return view("categories.edit", ["category" => $category]);
        } else {
            return view("errors.404");
        }
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()){
            return view('errors.404');
        } 
        else if (Auth::user()->roleID == 1) {
            $Categories = Categories::find($id);
            $Categories->name = $request->input("name");
            $Categories->save();
            return redirect()->route("categories.index");
        } else {
            return view("errors.404");
        }
    }

    public function destroy($id)
    {
        if (!Auth::user()){
            return view('errors.404');
        } 
        else if (Auth::user()->roleID == 1) {
            $category = Categories::find($id);

            if (!$category) {
                return view("errors.404");
            }

            $products = $category->products;

            $data = DB::table("products")
                ->where("categoryID", "=", $id)
                ->get();

            if ($data->isEmpty()) {
                $category->delete();
                return redirect()
                    ->route("categories.index")
                    ->with("success", "Category deleted successfully.");
            }

            return redirect()
                ->route("categories.index")
                ->with(
                    "error",
                    "Cannot delete category. There are Products registered on this category."
                );
        } else {
            return view("errors.404");
        }
    }
}
