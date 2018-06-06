<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>
        window.location = {{ url($redirect) }}
    </script>
</head>
<body>
    Please wait... if not redirect <a href="{{ url($redirect) }}">click here</a>
</body>
</html>
