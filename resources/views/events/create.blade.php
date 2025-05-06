<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-2xl">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Create New Event</h1>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('events.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf
            <div class="space-y-2">
                <label for="name" class="block text-sm font-medium text-gray-700">Event name</label>
                <input type="text" id="name" name="name" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="space-y-2">
                <label for="name" class="block text-sm font-medium text-gray-700">Event name</label>
                <input type="file" id="name" name="image" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div class="space-y-2">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" required rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            <div class="space-y-2">
                <label for="name" class="block text-sm font-medium text-gray-700">Event address</label>
                <input type="text" id="name" name="address" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div class="space-y-2">
                <label for="categore" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category_id" id="categore" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                
            <div class="space-y-2">
                <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                <input type="datetime-local" name="start_time" id="start_time" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

                <div class="space-y-2">
                    <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                    <input type="datetime-local" name="end_time" id="end_time" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
            
            <div class="pt-4">
                <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-md transition duration-300 ease-in-out">
                    Create Event
                </button>
            </div>
        </form>
    </div>
</body>
</html>