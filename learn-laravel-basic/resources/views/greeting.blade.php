<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    {{ $name }}
    {{ $occupation }}

    @{{ name }}

    {{-- Blade Directives --}}

    @if ($id == 1)
        I have one record!
        @elseif ($id > 1)
        I have multiple record!
        @else
        I don't have any record!
    @endif

    @isset($id)
    {{ $id }} is not null
    @endisset

    @empty($id)
        id is empty
    @endempty

    <section class="nav">
       
    </section>


    @sectionMissing('nav')
    
        @include('nav')
   
    @endif

    @switch($id)
        @case(1)
            First Case
            @break
        @case(2)
            Second Case
            @break
        @default
            Default Case
            
    @endswitch

    {{-- Conditional Classes --}}

@php
    $isActive = false;
    $hasError = true;
@endphp

<span @class([
    'p-2',
    'fw-bold' => $isActive,
    'text-info' => ! $isActive,
    'bg-danger' => $hasError,
])>conditional classes</span>

<input type="checkbox" name="active" value="active", @checked(true)>

<button class="btn btn-primary" @disabled($errors->isNotEmpty())>Submit</button>

<input type="email" name="email" value="email@laravel.com" @readonly(false)>

</body>
</html>