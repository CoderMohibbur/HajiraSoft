<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Madrasah;
use App\Models\Teacher;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{

public function index()
{
    $totalMadrasahs = 0;
    $totalTeachers = Teacher::count();
    $todaysAttendanceCount = Attendance::whereDate('date', Carbon::today())->count();
    $absenteesCount = Attendance::whereDate('date', Carbon::today())->where('status', 'absent')->count();

    return view('dashboard', compact(
        'totalMadrasahs',
        'totalTeachers',
        'todaysAttendanceCount',
        'absenteesCount'
    ));
}

}
