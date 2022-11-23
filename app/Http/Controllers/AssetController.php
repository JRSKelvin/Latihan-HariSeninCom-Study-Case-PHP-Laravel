<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    public function index() {
        $asset = Asset::latest()->paginate(10);
        return view('asset', [
            'page_title' => 'Asset | HariSenin.Com Study Case By Kelvin',
            'page_route' => 'Asset',
            'page_data' => $asset,
        ]);
    }

    public function create() {
        return view('creates.createasset', [
            'page_title' => 'Create Asset | HariSenin.Com Study Case By Kelvin',
            'page_route' => 'Asset',
        ]);
    }

    public function edit(Asset $asset) {
        return view('edits.editasset', [
            'page_title' => 'Edit Asset | HariSenin.Com Study Case By Kelvin',
            'page_route' => 'Asset',
            'asset' => $asset,
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $image = $request->file('image');
        $image_hash = $image->hashName();
        $image->storeAs('public/assets/', $image_hash);
        $new_asset = Asset::create([
            'name' => $image_hash,
            'path' => 'public/assets/'.$image_hash,
            'size' => $image->getSize(),
        ]);

        if($new_asset){
            return redirect()->route('asset.index')->with(['success' => 'Save Successfully!']);
        }else{
            return redirect()->route('asset.index')->with(['error' => 'Save Failed!']);
        }
    }

    public function update(Request $request, Asset $asset) {
        $this->validate($request, [
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $asset = Asset::findOrFail($asset->id);
        // Storage::disk('local')->delete('public/assets/'.$asset->name);
        $image = $request->file('image');
        $image_hash = $image->hashName();
        $image->storeAs('public/assets/', $image_hash);
        $asset->update([
            'name' => $image_hash,
            'path' => 'public/assets/'.$image_hash,
            'size' => $image->getSize(),
        ]);

        if($asset){
            return redirect()->route('asset.index')->with(['success' => 'Update Successfully!']);
        }else{
            return redirect()->route('asset.index')->with(['error' => 'Update Failed!']);
        }
    }

    public function destroy($id) {
        $asset = Asset::findOrFail($id);
        // Storage::disk('local')->delete('public/assets/'.$asset->name);
        $asset->delete();

        if($asset){
            return redirect()->route('asset.index')->with(['success' => 'Delete Successfully!']);
        }else{
            return redirect()->route('asset.index')->with(['error' => 'Delete Failed!']);
        }
    }
}
