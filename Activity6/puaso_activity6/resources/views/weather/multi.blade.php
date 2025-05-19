<!DOCTYPE html>
<html>
<head>
    <title>Weather JSON View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        pre {
            background-color: #f8f9fa;
            padding: 15px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            height: 100%;
        }
        .json-column {
            min-width: 250px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Weather Data</h2>

        <div class="row flex-nowrap overflow-auto">
            @foreach($weatherData as $data)
                <div class="col json-column">
                    <pre>{{ json_encode($data, JSON_PRETTY_PRINT) }}</pre>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
