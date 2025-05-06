@extends('admin.layouts')
@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Events</h1>
        <a href="{{ route('admin.events.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded mb-4 inline-block">Add Event</a>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left">ID</th>
                        <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left">Name</th>
                        <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b border-gray-200">{{ $event->id }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $event->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <a href="{{ route('admin.events.edit', $event->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-1 px-3 rounded mr-2 inline-block">Edit</a>
                                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-medium py-1 px-3 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection