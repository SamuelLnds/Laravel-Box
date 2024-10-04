<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    public function index()
    {

        $userId = Auth::id();
        $tenants = Tenant::where('user_id', $userId)->get();

        return view('tenants.index', ["tenants" => $tenants]);
    }

    public function show($id)
    {
        return view('tenants.show', [
            "tenant" => Tenant::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);
    
        $tenant = Tenant::findOrFail($id);
    
        $tenant->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
        ]);
    
        return redirect()->route('tenants.index');
    }
    

    public function destroy($id) {
        Tenant::destroy($id);
        return redirect()->route('tenants.index');
    }

    public function create() {
        return view('tenants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        
        $tenant = new Tenant([
            'user_id' => Auth::id(),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address')
        ]);
        
        $tenant->save();

        return redirect()->route('tenants.index');
    }

}
