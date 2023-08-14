@extends('layouts.custom-layout')

@section('content')

<!DOCTYPE html>
<html>
<head>

    <style>
        body {
            background-color: #f0f0f0;
            justify-content: center;
            margin: 0;
        }

        .error-message {
            background-color: #0e7d67;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #060606;
            text-align: center;
            font-size: 24px;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="error-message">
        <h1>No cuenta con asignaturas asignadas actualmente</h1>
    </div>
</body>
</html>

@endsection
