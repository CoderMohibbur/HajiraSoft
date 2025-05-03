<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Madrasah;
use App\Models\District;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MadrasahController extends Controller
{
    public function index()
    {
        $madrasahs = Madrasah::with(['district', 'upazila'])->latest()->paginate(10);
        return view('admin.madrasahs.index', compact('madrasahs'));
    }

    public function create()
    {
        $districts = District::where('is_active', true)->orderBy('name')->get();
        $upazilas = Upazila::where('is_active', true)->orderBy('name')->get();
        return view('admin.madrasahs.create', compact('districts', 'upazilas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'eiin' => 'required|unique:madrasahs,eiin',
            'institute_code' => 'nullable|unique:madrasahs,institute_code',
            'district_id' => 'required|exists:districts,id',
            'upazila_id' => 'required|exists:upazilas,id',
            'type' => 'required|in:ebtedayee,dakhil,alim,fazil',
            'status' => 'required|in:active,pending,inactive',
        ]);

        Madrasah::create([
            'name' => $request->name,
            'eiin' => $request->eiin,
            'institute_code' => $request->institute_code,
            'type' => $request->type,
            'district_id' => $request->district_id,
            'upazila_id' => $request->upazila_id,
            'phone' => $request->phone,
            'email' => $request->email,
            'established_at' => $request->established_at,
            'logo' => $request->logo,
            'status' => $request->status,
            'created_by' => null,
        ]);

        return redirect()->route('madrasahs.index')->with('success', 'Madrasah created successfully.');
    }

    public function edit(Madrasah $madrasah)
    {
        $districts = District::where('is_active', true)->orderBy('name')->get();
        $upazilas = Upazila::where('is_active', true)->orderBy('name')->get();
        return view('admin.madrasahs.edit', compact('madrasah', 'districts', 'upazilas'));
    }

    public function update(Request $request, Madrasah $madrasah)
    {
        $request->validate([
            'name' => 'required|string',
            'eiin' => 'required|unique:madrasahs,eiin,' . $madrasah->id,
            'institute_code' => 'nullable|unique:madrasahs,institute_code,' . $madrasah->id,
            'district_id' => 'required|exists:districts,id',
            'upazila_id' => 'required|exists:upazilas,id',
            'type' => 'required|in:ebtedayee,dakhil,alim,fazil',
            'status' => 'required|in:active,pending,inactive',
        ]);

        $madrasah->update([
            'name' => $request->name,
            'eiin' => $request->eiin,
            'institute_code' => $request->institute_code,
            'type' => $request->type,
            'district_id' => $request->district_id,
            'upazila_id' => $request->upazila_id,
            'phone' => $request->phone,
            'email' => $request->email,
            'established_at' => $request->established_at,
            'logo' => $request->logo,
            'status' => $request->status,
        ]);

        return redirect()->route('madrasahs.index')->with('success', 'Madrasah updated successfully.');
    }

    public function destroy(Madrasah $madrasah)
    {
        $madrasah->delete();
        return redirect()->back()->with('success', 'Madrasah deleted.');
    }
}
