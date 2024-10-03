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

}
