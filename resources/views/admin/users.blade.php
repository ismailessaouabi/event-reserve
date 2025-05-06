@extends('admin.layouts')
@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Users</h1>
        
        <button class="mb-4 bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">
            Ajouter un utilisateur
        </button>
        
        <form action="{{ route('admin.users.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-4">
                <div class="w-full md:w-1/3 px-3 mb-4 md:mb-0">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" placeholder="User Name">
                </div>
                <div class="w-full md:w-1/3 px-3 mb-4 md:mb-0">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" placeholder="User Email">
                </div>
                <div class="w-full md:w-1/3 px-3 mb-4 md:mb-0">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" name="password" placeholder="User Password">
                </div>
            </div>
            <div class="flex items-center justify-end">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Add User
                </button>
            </div>
        </form>
        
        <div class="overflow-x-auto bg-white shadow-md rounded">
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    @foreach($users as $user)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-4 px-6 text-left whitespace-nowrap">{{ $user->id }}</td>
                            <td class="py-4 px-6 text-left">{{ $user->name }}</td>
                            <td class="py-4 px-6 text-left">{{ $user->email }}</td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex item-center justify-end">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="mr-2 transform hover:scale-110 text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-md">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="transform hover:scale-110 text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded-md">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection