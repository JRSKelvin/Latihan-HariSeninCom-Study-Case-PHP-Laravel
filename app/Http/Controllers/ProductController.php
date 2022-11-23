<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $product = Product::latest()->paginate(10);
        return view('product', [
            'page_title' => 'Product | HariSenin.Com Study Case By Kelvin',
            'page_route' => 'Product',
            'page_data' => $product,
        ]);
    }

    public function create() {
        return view('creates.createproduct', [
            'page_title' => 'Create Product | HariSenin.Com Study Case By Kelvin',
            'page_route' => 'Product',
        ]);
    }

    public function edit(Product $product) {
        return view('edits.editproduct', [
            'page_title' => 'Edit Product | HariSenin.Com Study Case By Kelvin',
            'page_route' => 'Product',
            'product' => $product,
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'product_name' => 'required',
            'product_slug' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $new_product = Product::create([
            'product_name' => $request->product_name,
            'product_slug' => $request->product_slug,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        if($new_product){
            return redirect()->route('product.index')->with(['success' => 'Save Successfully!']);
        }else{
            return redirect()->route('product.index')->with(['error' => 'Save Failed!']);
        }
    }

    public function update(Request $request, Product $product) {
        $this->validate($request, [
            'product_name' => 'required',
            'product_slug' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $product = Product::findOrFail($product->id);
        $product->update([
            'product_name' => $request->product_name,
            'product_slug' => $request->product_slug,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        if($product){
            return redirect()->route('product.index')->with(['success' => 'Update Successfully!']);
        }else{
            return redirect()->route('product.index')->with(['error' => 'Update Failed!']);
        }
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();

        if($product){
            return redirect()->route('product.index')->with(['success' => 'Delete Successfully!']);
        }else{
            return redirect()->route('product.index')->with(['error' => 'Delete Failed!']);
        }
    }
}
