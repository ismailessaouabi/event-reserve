@extends('admin.layouts')
@section('content')
    <div class="container">
        <h1>Teckets</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teckets as $tecket)
                    <tr>
                        <td>{{ $tecket->id }}</td>
                        <td>{{ $tecket->name }}</td>
                        <td>
                            <a href="{{ route('teckets.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('ateckets.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection