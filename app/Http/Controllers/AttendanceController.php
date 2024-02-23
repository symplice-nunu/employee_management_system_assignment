<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function recordArrival(Request $request, $employeeId)
    {
        $attendance = Attendance::updateOrCreate(
            ['employee_id' => $employeeId],
            ['arrival_time' => now()]
        );

        return response()->json(['message' => 'Arrival time recorded successfully']);
    }

    public function recordDeparture(Request $request, $employeeId)
    {
        $attendance = Attendance::where('employee_id', $employeeId)
            ->whereNull('departure_time')
            ->first();

        if ($attendance) {
            $attendance->update(['departure_time' => now()]);
            return response()->json(['message' => 'Departure time recorded successfully']);
        } else {
            return response()->json(['message' => 'No ongoing attendance record found'], 404);
        }
    }
}

