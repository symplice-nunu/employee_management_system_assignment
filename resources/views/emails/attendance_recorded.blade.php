<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Recorded</title>
</head>
<body>
    <p>
        Dear {{ $attendance->employee->name }},
    </p>
    <p>
        Your {{ $recordType }} time has been recorded successfully.
    </p>
    <p>
        Arrival Time: {{ $attendance->arrival_time }}
    </p>
    <p>
        Departure Time: {{ $attendance->departure_time }}
    </p>
    <p>
        Regards,<br>
        Your Company
    </p>
</body>
</html>
