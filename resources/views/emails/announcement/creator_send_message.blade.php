<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creator Send Mesage</title>
</head>
<body>
    This is mesage announcement:
    <br>
    <ul>
        @foreach ($data as $key => $item)
            <li>{{  $key }} | {{  $item }}</li>
        @endforeach
    </ul>
</body>
</html>