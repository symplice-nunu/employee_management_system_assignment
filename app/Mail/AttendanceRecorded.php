<?php

namespace App\Mail;

use App\Models\Attendance;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AttendanceRecorded extends Mailable
{
    use Queueable, SerializesModels;

    public $attendance;
    public $recordType;

    public function __construct(Attendance $attendance, $recordType)
    {
        $this->attendance = $attendance;
        $this->recordType = $recordType;
    }

    public function build()
    {
        return $this->subject('Attendance Recorded')
            ->view('emails.attendance_recorded');
    }
}
