<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        .form-control
        {
            width: 25%!important;
        }
    </style>
</head>
<body>

    
   <div class="container mt-5">
        @if ($message = Session::get('success'))
            <div class="alert alert-info">  
                <p>{{ $message }}</p>
            </div>
        @endif
        @yield('context')
   </div>

</body>
</html>