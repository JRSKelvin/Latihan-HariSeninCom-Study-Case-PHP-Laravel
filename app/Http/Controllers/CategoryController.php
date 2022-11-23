<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::latest()->paginate(10);
        return view('category', [
            'page_title' => 'Category | HariSenin.Com Study Case By Kelvin',
            'page_route' => 'Category',
            'page_data' => $category,
        ]);
    }

    public function create() {
        return view('creates.createcategory', [
            'page_title' => 'Create Category | HariSenin.Com Study Case By Kelvin',
            'page_route' => 'Category',
        ]);
    }

    public function edit(Category $category) {
        return view('edits.editcategory', [
            'page_title' => 'Edit Category | HariSenin.Com Study Case By Kelvin',
            'page_route' => 'Category',
            'category' => $category,
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'category_name' => 'required',
            'category_slug' => 'required',
            'asset_id' => 'required',
        ]);

        $new_category = Category::create([
            'category_name' => $request->category_name,
            'category_slug' => $request->category_slug,
            'asset_id' => $request->asset_id,
        ]);

        if($new_category){
            return redirect()->route('category.index')->with(['success' => 'Save Successfully!']);
        }else{
            return redirect()->route('category.index')->with(['error' => 'Save Failed!']);
        }
    }

    public function update(Request $request, Category $category) {
        $this->validate($request, [
            'category_name' => 'required',
            'category_slug' => 'required',
            'asset_id' => 'required',
        ]);

        $category = Category::findOrFail($category->id);
        $category->update([
            'category_name' => $request->category_name,
            'category_slug' => $request->category_slug,
            'asset_id' => $request->asset_id,
        ]);

        if($category){
            return redirect()->route('category.index')->with(['success' => 'Update Successfully!']);
        }else{
            return redirect()->route('category.index')->with(['error' => 'Update Failed!']);
        }
    }

    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();

        if($category){
            return redirect()->route('category.index')->with(['success' => 'Delete Successfully!']);
        }else{
            return redirect()->route('category.index')->with(['error' => 'Delete Failed!']);
        }
    }
}
