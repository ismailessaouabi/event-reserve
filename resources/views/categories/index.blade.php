<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}">Add Category</a>
    <ul>
        @foreach($categories as $category)
            <li>
                {{ $category->name }}
                <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach

  
    
</body>
</html>