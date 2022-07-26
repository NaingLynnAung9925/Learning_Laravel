<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Phone</td>
    </tr>
    @foreach ($all as $test)
    <tr>
        <td> {{ $test->id }} </td>
        <td> {{ $test->name }} </td>
        <td> {{ $test->phone_no }} </td>
    </tr>
    @endforeach

</table>
</body>
</html>