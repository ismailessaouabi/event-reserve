@extends('dashboard.admin.layouts')
@section('content')
    <div class="w-full lg:w-2/3">
        <h2 class="text-2xl font-bold text-gray-800 mb-8">Gestion des Utilisateurs</h2>
    </div>
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Formulaire d'ajout -->
            <div class="w-full lg:w-1/3">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Ajouter un Utilisateur</h2>
                    
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                            <input type="text" id="name" name="name" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                            <input type="password" id="password" name="password" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <button type="submit" 
                                class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
                            Ajouter Utilisateur
                        </button>
                    </form>
                </div>
            </div>
            
            

            <!-- Liste des utilisateurs -->
            <div class="w-full lg:w-2/3">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Liste des Utilisateurs</h2>
                <!--  formulaire de recherche -->
                <form action="{{ route('users.index') }}" method="GET" class="mb-4">
                    <input type="text" name="search" placeholder="Rechercher par nom" class="w-96 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-200">Rechercher</button>
                </form>

                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead>
                        <tr>
                            <th class="py-3 px-4 bg-gray-200 text-left text-sm font-semibold text-gray-600">Nom</th>
                            <th class="py-3 px-4 bg-gray-200 text-left text-sm font-semibold text-gray-600">Email</th>
                            <th class="py-3 px-4 bg-gray-200 text-left text-sm font-semibold text-gray-600">Rôle</th>
                            <th class="py-3 px-4 bg-gray-200 text-left text-sm font-semibold text-gray-600">nombre des evenements crée</th>
                            <th class="py-3 px-4 bg-gray-200 text-left text-sm font-semibold text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="py-3 px-4 text-sm text-gray-700">{{ $user->name }}</td>
                                <td class="py-3 px-4 text-sm text-gray-700">{{ $user->email }}</td>
                                <td class="py-3 px-4 text-sm text-gray-700">{{ $user->role }}</td>
                                <td class="py-3 px-4 text-sm text-gray-700">{{ $user->events()->count() ?? 0 }}</td>
                                <td class="py-3 px-4 text-sm text-gray-700">
                                    <a href="{{ route('users.edit', $user->id) }}" class="text-blue-600 hover:text-blue-800 mr-2">Modifier</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
