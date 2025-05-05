<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Madrasah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $query = Attendance::with(['teacher.user', 'madrasah']);

        if ($request->filled('teacher_id')) {
            $query->where('teacher_id', $request->teacher_id);
        }

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        $attendances = $query->latest()->paginate(20);
        $teachers = Teacher::with('user')->get();

        return view('admin.attendance.index', compact('attendances', 'teachers'));
    }

    public function create()
    {
        $teachers = Teacher::with('user')->get();
        $madrasahs = Madrasah::all();
        return view('admin.attendance.create', compact('teachers', 'madrasahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'madrasah_id' => 'required|exists:madrasahs,id',
            'date' => 'required|date',
            'status' => 'required|in:present,absent,late,leave',
        ]);

        $exists = Attendance::where('teacher_id', $request->teacher_id)
                            ->where('date', $request->date)
                            ->exists();

        if ($exists) {
            return back()->withErrors(['date' => 'Attendance already marked for this teacher on this date.']);
        }

        Attendance::create([
            'teacher_id' => $request->teacher_id,
            'madrasah_id' => $request->madrasah_id,
            'date' => $request->date,
            'status' => $request->status,
            'remarks' => $request->remarks,
            'device' => $request->device,
            'location' => $request->location,
            'verified_by' => Auth::id(),
            'is_verified' => true,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('attendances.index')->with('success', 'Attendance marked successfully.');
    }

    public function edit(Attendance $attendance)
    {
        $teachers = Teacher::with('user')->get();
        $madrasahs = Madrasah::all();
        return view('admin.attendance.edit', compact('attendance', 'teachers', 'madrasahs'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'status' => 'required|in:present,absent,late,leave',
        ]);

        $attendance->update([
            'status' => $request->status,
            'remarks' => $request->remarks,
            'device' => $request->device,
            'location' => $request->location,
            'is_verified' => true,
            'verified_by' => Auth::id(),
        ]);

        return redirect()->route('attendances.index')->with('success', 'Attendance updated successfully.');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->back()->with('success', 'Attendance deleted.');
    }
}
