<!DOCTYPE html>
<html>
<head>
    <title>Data Pendaftaran Game Event</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            font-size: 12px;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h2>Data Pendaftaran Game Event</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>ID Number</th>
                <th>WhatsApp</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Game Event</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftaran as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->id_number }}</td>
                <td>{{ $data->whatsapp }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->status }}</td>            
                <td>{{ $data->gameEvent->name }}</td>                
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
