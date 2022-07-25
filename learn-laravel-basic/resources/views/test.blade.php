<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<style>
    .form-control{
        width: 25%!important;
    }
</style>
<body>
    <form method="POST" class="ms-3">
        @csrf
        <div>
            <label for="">Name :</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div>
            <label for="">Email :</label>
            <input type="email" placeholder="example@gmail.com" class="form-control" name="email">
        </div>
        
        <button class="btn btn-primary mt-3">Submit</button>
    </form>
</body>
</html>