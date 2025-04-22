<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            padding: 10px;
            text-align: center;
        }
        td {
            padding: 8px 10px;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 5px;
        }
        .date {
            text-align: right;
            margin-bottom: 20px;
        }
        .header {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>{{ $title }}</h2>
        <p class="date">Tanggal: {{ $date }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="10%">ID</th>
                <th width="25%">Nama</th>
                <th width="30%">Email</th>
                <th width="30%">Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr>
                <td style="text-align: center">{{ $loop->iteration }}</td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>