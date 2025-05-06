@extends('admin.layouts')
@section('content')
    <div class="container">
        <h1>Events</h1>
        <a href="{{ route('admin.events.create') }}" class="btn btn-success">Add Event</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->name }}</td>
                        <td>
                            <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display:inline;">
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
   