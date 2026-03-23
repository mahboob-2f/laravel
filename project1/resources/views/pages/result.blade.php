<!DOCTYPE html>
<html>
<head>
    <title>BTech Result 2025</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 40px auto;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
        }
        th {
            background-color: #333;
            color: white;
        }
        .pass {
            background-color: #d4edda; /* green */
        }
        .fail {
            background-color: #f8d7da; /* red */
        }
    </style>
</head>
<body>

    <h2 style="text-align:center;">BTech Result 2025</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Reg No</th>
            <th>CGPA</th>
            <th>Status</th>
        </tr>

        @foreach($students as $student)
            <tr class="{{ $student['cgpa'] < 4 ? 'fail' : 'pass' }}">
                <td>{{ $student['name'] }}</td>
                <td>{{ $student['regNo'] }}</td>
                <td>{{ $student['cgpa'] }}</td>
                <td>
                    {{ $student['cgpa'] < 4 ? 'Fail' : 'Pass' }}
                </td>
            </tr>
        @endforeach

    </table>

</body>
</html>