<?php

// app/Http/Controllers/Admin/UpazilaController.php

namespace App\Http\Controllers\Admin;

use App\Models\Upazila;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class UpazilaController extends Controller
{
    public function index()
    {
        $upazilas = Upazila::with('district')->latest()->paginate(10);
        return view('admin.upazilas.index', compact('upazilas'));
    }

    public function create()
    {
        $districts = District::orderBy('name')->get();
        return view('admin.upazilas.create', compact('districts'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:upazilas,name',
            'district_id' => 'required|exists:districts,id',
        ]);

        Upazila::create([
            'name' => $request->name,
            'district_id' => $request->district_id,
            'slug' => Str::slug($request->name),
            'code' => $request->code,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('upazilas.index')->with('success', 'Upazila created successfully.');
    }

    public function edit(Upazila $upazila)
    {
        $districts = District::orderBy('name')->get();
        return view('admin.upazilas.edit', compact('upazila', 'districts'));
    }


    public function update(Request $request, Upazila $upazila)
    {
        $request->validate([
            'name' => 'required|unique:upazilas,name,' . $upazila->id,
            'district_id' => 'required|exists:districts,id',
        ]);

        $upazila->update([
            'name' => $request->name,
            'district_id' => $request->district_id,
            'slug' => Str::slug($request->name),
            'code' => $request->code,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('upazilas.index')->with('success', 'Upazila updated successfully.');
    }

    public function destroy(Upazila $upazila)
    {
        $upazila->delete();
        return redirect()->back()->with('success', 'Upazila deleted.');
    }
}
