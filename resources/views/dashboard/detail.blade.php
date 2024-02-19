@extends('layouts.main')

@section('container')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Detail</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        .details {
            margin-top: 20px;
        }

        .details p {
            margin: 10px 0;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Student Detail</h1>

    <div class="details">
        <p><strong>NIS:</strong> {{$student->nis}}</p>
        <p><strong>Nama:</strong> {{$student->nama}}</p>
        <p><strong>Tanggal Lahir:</strong> {{$student->tanggal_lahir}}</p>
        <p><strong>Kelas:</strong> {{$student->kelas}}</p>
        <p><strong>Alamat:</strong> {{$student->alamat}}</p>
    </div>

    <a href="/dashboard/students" class="back-link">Back</a>
</div>

</body>
</html>
@endsection
