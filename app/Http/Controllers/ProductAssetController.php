<?php

namespace App\Http\Controllers;

use App\Models\ProductAsset;
use Illuminate\Http\Request;

class ProductAssetController extends Controller
{
    public function index() {
        $product_asset = ProductAsset::latest()->paginate(10);
        return view('product_asset', [
            'page_title' => 'Product Asset | HariSenin.Com Study Case By Kelvin',
            'page_route' => 'Product Asset',
            'page_data' => $product_asset,
        ]);
    }

    public function create() {
        return view('creates.createproductasset', [
            'page_title' => 'Create Product Asset | HariSenin.Com Study Case By Kelvin',
            'page_route' => 'Product Asset',
        ]);
    }

    public function edit(ProductAsset $product_asset) {
        return view('edits.editproductasset', [
            'page_title' => 'Edit Product Asset | HariSenin.Com Study Case By Kelvin',
            'page_route' => 'Product Asset',
            'product_asset' => $product_asset,
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'asset_id' => 'required',
            'product_id' => 'required',
        ]);

        $new_product_asset = ProductAsset::create([
            'asset_id' => $request->asset_id,
            'product_id' => $request->product_id,
        ]);

        if($new_product_asset){
            return redirect()->route('product_asset.index')->with(['success' => 'Save Successfully!']);
        }else{
            return redirect()->route('product_asset.index')->with(['error' => 'Save Failed!']);
        }
    }

    public function update(Request $request, ProductAsset $product_asset) {
        $this->validate($request, [
            'asset_id' => 'required',
            'product_id' => 'required',
        ]);

        $product_asset = ProductAsset::findOrFail($product_asset->id);
        $product_asset->update([
            'asset_id' => $request->asset_id,
            'product_id' => $request->product_id,
        ]);

        if($product_asset){
            return redirect()->route('product_asset.index')->with(['success' => 'Update Successfully!']);
        }else{
            return redirect()->route('product_asset.index')->with(['error' => 'Update Failed!']);
        }
    }

    public function destroy($id) {
        $product_asset = ProductAsset::findOrFail($id);
        $product_asset->delete();

        if($product_asset){
            return redirect()->route('product_asset.index')->with(['success' => 'Delete Successfully!']);
        }else{
            return redirect()->route('product_asset.index')->with(['error' => 'Delete Failed!']);
        }
    }
}
