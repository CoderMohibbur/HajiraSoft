<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Madrasah;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with(['user', 'madrasah'])->latest()->paginate(10);
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        $users = User::whereDoesntHave('teacher')->pluck('name', 'id');
        $madrasahs = Madrasah::pluck('name', 'id');
        return view('admin.teachers.create', compact('users', 'madrasahs'));
    }

    public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'madrasah_id' => 'required|exists:madrasahs,id',
    ]);

    Teacher::create([
        'user_id' => $request->user_id,
        'madrasah_id' => $request->madrasah_id,
        'subject' => $request->subject,
        'designation' => $request->designation,
        'join_date' => $request->join_date,
        'gender' => $request->gender,
        'nid_number' => $request->nid_number,
        'photo' => $request->photo,
        'leave_balance' => $request->leave_balance,
        'remarks' => $request->remarks,
        'status' => $request->status ?? 'active',
    ]);

    return redirect()->route('teachers.index')->with('success', 'Teacher created successfully');
}


    public function edit(Teacher $teacher)
    {
        $users = User::pluck('name', 'id');
        $madrasahs = Madrasah::pluck('name', 'id');
        return view('admin.teachers.edit', compact('teacher', 'users', 'madrasahs'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'user_id' => 'required|unique:teachers,user_id,' . $teacher->id,
            'madrasah_id' => 'required',
            'subject' => 'nullable|string',
            'designation' => 'nullable|string',
            'join_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'nid_number' => 'nullable|string',
            'photo' => 'nullable|image',
            'leave_balance' => 'nullable|integer',
            'remarks' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            if ($teacher->photo && Storage::disk('public')->exists($teacher->photo)) {
                Storage::disk('public')->delete($teacher->photo);
            }
            $data['photo'] = $request->file('photo')->store('teachers', 'public');
        }

        $teacher->update($data);

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        if ($teacher->photo && Storage::disk('public')->exists($teacher->photo)) {
            Storage::disk('public')->delete($teacher->photo);
        }

        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
