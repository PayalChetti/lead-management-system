<!DOCTYPE html>
<html>

<head>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
        }
    </style>

</head>

<body>

    <h2>Lead Report</h2>

    <table>

        <thead>

            <tr>

                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>

            </tr>

        </thead>

        <tbody>

            @foreach($leads as $lead)

            <tr>

                <td>{{ $lead->id }}</td>
                <td>{{ $lead->name }}</td>
                <td>{{ $lead->phone }}</td>
                <td>{{ $lead->email }}</td>

            </tr>

            @endforeach

        </tbody>

    </table>

</body>

</html>