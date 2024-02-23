<?php

namespace App\Http\Controllers;


use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Attendance;
use App\Exports\AttendanceExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AttendanceReportController extends Controller
{
    public function generatePdfReport(Request $request)
    {
        $date = $request->input('date');

        $attendances = Attendance::whereDate('arrival_time', $date)
            ->orWhereDate('departure_time', $date)
            ->get();

        // Generate PDF report
        $pdfContent = PDF::loadView('reports.attendance', ['attendances' => $attendances])->output();

        return Response::make($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="attendance_report.pdf"'
        ]);
    }

    public function generateExcelReport(Request $request)
    {
        $date = $request->input('date');

        $attendances = Attendance::whereDate('arrival_time', $date)
            ->orWhereDate('departure_time', $date)
            ->get();
        return Excel::download(new AttendanceExport($attendances), 'attendance_' . $date . '.xlsx');
    }

}
