Title : {{ $request->title }}

Body : {{ $request->body }}

Category : 

@foreach ($request->categories as $category)
    {{ $category->name }}
@endforeach