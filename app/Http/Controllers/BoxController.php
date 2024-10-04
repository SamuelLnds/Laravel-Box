<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StorageBox;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;

class BoxController extends Controller
{
    public function index()
    {

        $userId = Auth::id();
        $boxes = StorageBox::where('user_id', $userId)->get();
        $tenants = Tenant::where('user_id', Auth::id())->get();

        return view('storage_boxes.index', ["boxes" => $boxes], ['tenants' => $tenants]);
    }

    public function show($id)
    {
        $tenants = Tenant::where('user_id', Auth::id())->get();
        return view('storage_boxes.show', [
            "box" => StorageBox::findOrFail($id)
        ], ['tenants' => $tenants]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'size' => 'required|in:small,medium,large',
            'monthly_cost' => 'required|numeric|min:0',
            'tenant_id' => 'nullable|exists:tenants,id'
        ]);

        $box = StorageBox::findOrFail($id);

        $box->name = $request->get('name');
        $box->size = $request->get('size');
        $box->monthly_cost = $request->get('monthly_cost');

        $box->tenant_id = $request->get('tenant_id');
        $box->tenant_id ? $box->availability = false : $box->availability = true;
        $box->save();

        return redirect()->route('storage_boxes.index');
    }

    public function destroy($id) {
        StorageBox::destroy($id);
        return redirect()->route('storage_boxes.index');
    }

    public function create() {
        $tenants = Tenant::where('user_id', Auth::id())->get();
        return view('storage_boxes.create', ['tenants' => $tenants]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'size' => 'required|in:small,medium,large',
            'monthly_cost' => 'required|numeric|min:0',
            'tenant_id' => 'nullable|exists:tenants,id'
        ]);

        
        $box = new StorageBox([
            'user_id' => Auth::id(),
            'name' => $request->get('name'),
            'size' => $request->get('size'),
            'monthly_cost' => $request->get('monthly_cost'),
            'tenant_id' => $request->get('tenant_id'),
            'availability' => $request->get('tenant_id') ? false : true,
        ]);
        
        $box->save();

        return redirect()->route('storage_boxes.index');
    }

}
