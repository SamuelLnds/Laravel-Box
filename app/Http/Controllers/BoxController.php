<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StorageBox;
use Illuminate\Support\Facades\Auth;

class BoxController extends Controller
{
    public function index()
    {

        $userId = Auth::id();
        $boxes = StorageBox::where('user_id', $userId)->get();

        return view('storage_boxes.index', ["boxes" => $boxes]);
    }

    public function show($id)
    {
        return view('storage_boxes.show', [
            "box" => StorageBox::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $box = StorageBox::findOrFail($id);

        $box->name = $request->get('name');
        $box->size = $request->get('size');
        $box->monthly_cost = $request->get('monthly_cost');

        $box->availability = $request->boolean('availability');
        $box->save();

        return redirect()->route('storage_boxes.index');
    }

    public function destroy($id) {
        StorageBox::destroy($id);
        return redirect()->route('storage_boxes.index');
    }

}
