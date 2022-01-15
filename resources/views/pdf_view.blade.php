<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h2>Appointment All Doctors </h2>

<table>
    <tr>
        <th>Name Doctor</th>
        <th>Name Patient</th>
        <th>Time</th>
        <th>Rate</th>
        <th>Date</th>
    </tr>
    @foreach($booking as $book)

    <tr>
        <td>{{$book->doctor->first_name .' ' .$book->doctor->last_name}}</td>
        <td>{{$book->user->first_name .' ' .$book->user->last_name}}</td>
        <td>{{$book->time}}</td>

        <td>{{$book->rate ?? 'not selected'}}</td>
        <td>{{$book->date}}</td>
    </tr>
    @endforeach
</table>

</body>
</html>

