<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AttendanceRecorded extends Mailable
{
    use Queueable, SerializesModels;

    public $employeeName;

    public function __construct($employeeName)
    {
        $this->employeeName = $employeeName;
    }

    public function build()
    {
        return $this->subject('Attendance Recorded')
                    ->view('emails.attendance-recorded');
    }
}
