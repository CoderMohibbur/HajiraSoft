<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeaveType;
use Illuminate\Support\Str;

class LeaveTypeController extends Controller
{
    public function index()
    {
        $leaveTypes = LeaveType::latest()->paginate(20);
        return view('admin.leave-types.index', compact('leaveTypes'));
    }

    public function create()
    {
        return view('admin.leave-types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:leave_types,name',
            'max_days' => 'nullable|integer|min:0',
        ]);

        LeaveType::create([
            'name' => $request->name,
            'max_days' => $request->max_days,
            'is_paid' => $request->has('is_paid'),
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('leave-types.index')->with('success', 'Leave type created successfully.');
    }

    public function edit(LeaveType $leaveType)
    {
        return view('admin.leave-types.edit', compact('leaveType'));
    }

    public function update(Request $request, LeaveType $leaveType)
    {
        $request->validate([
            'name' => 'required|unique:leave_types,name,' . $leaveType->id,
            'max_days' => 'nullable|integer|min:0',
        ]);

        $leaveType->update([
            'name' => $request->name,
            'max_days' => $request->max_days,
            'is_paid' => $request->has('is_paid'),
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('leave-types.index')->with('success', 'Leave type updated successfully.');
    }

    public function destroy(LeaveType $leaveType)
    {
        $leaveType->delete();
        return redirect()->back()->with('success', 'Leave type deleted.');
    }
}
