<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::latest()->paginate(10);
        
        return view('admin.districts.index', compact('districts'));
    }

    public function create()
    {
        return view('admin.districts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:districts,name',
        ]);

        District::create([
            'name' => $request->name,
            'division' => $request->division,
            'slug' => Str::slug($request->name),
            'code' => $request->code,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('districts.index')->with('success', 'District created successfully.');
    }

    public function edit(District $district)
    {
        return view('admin.districts.edit', compact('district'));
    }

    public function update(Request $request, District $district)
    {
        $request->validate([
            'name' => 'required|unique:districts,name,' . $district->id,
        ]);

        $district->update([
            'name' => $request->name,
            'division' => $request->division,
            'slug' => Str::slug($request->name),
            'code' => $request->code,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('districts.index')->with('success', 'District updated successfully.');
    }

    public function destroy(District $district)
    {
        $district->delete();
        return redirect()->back()->with('success', 'District deleted.');
    }
}
