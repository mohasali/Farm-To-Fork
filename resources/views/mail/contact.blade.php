<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Submission</title>
</head>
<body>
    <h1>New Contact Form Submission</h1>
    <ul>
        @foreach($data->except('_token') as $key => $value)
            <li><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</li>
        @endforeach
    </ul>
</body>
</html>
