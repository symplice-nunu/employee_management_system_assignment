<!DOCTYPE html>
<html>
<head>
    <title>Attendance Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Employee attendance Dairly Report</h1>
    <table>
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Arrival Time</th>
                <th>Departure Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->employee->name }}</td>
                    <td>{{ $attendance->arrival_time }}</td>
                    <td>{{ $attendance->departure_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
