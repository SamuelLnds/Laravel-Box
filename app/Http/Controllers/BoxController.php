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
}
