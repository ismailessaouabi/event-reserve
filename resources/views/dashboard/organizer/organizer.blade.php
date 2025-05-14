@extends('dashboard.organizer.layouts')



@section('content')
<div class="space-y-6 ">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold flex items-center">
            <i class="fas fa-user text-orange-500 mr-2"></i>
            Mes informations
        </h1>
        <div class="border-b border-orange-500/20 mt-2"></div>
    </div>

    <!-- Profile Section -->
    <div class="bg-gray-800 rounded-lg p-6">
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Avatar -->
            <div class="flex flex-col items-center">
                <div class="w-32 h-32 bg-gray-700 rounded-full overflow-hidden mb-4">
                    <img src="{{ auth()->user()->avatar_url ?? asset('images/default-avatar.jpg') }}" 
                         alt="Photo de profil" 
                         class="w-full h-full object-cover">
                </div>
                <button class="text-orange-500 hover:text-orange-400 text-sm font-medium transition-colors">
                    <i class="fas fa-camera mr-1"></i> Changer la photo
                </button>
            </div>

            <!-- Form -->
            <div class="flex-1">
                <form action="#" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Nom -->
                        <div>
                            <label for="last_name" class="block text-sm font-medium mb-1">Nom</label>
                            <input type="text" id="last_name" name="last_name" 
                                   value="ismail"
                                   class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                            @error('last_name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Prénom -->
                        <div>
                            <label for="first_name" class="block text-sm font-medium mb-1">Prénom</label>
                            <input type="text" id="first_name" name="first_name" 
                                   value="essaouabi"
                                   class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                            @error('first_name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="md:col-span-2">
                            <label for="email" class="block text-sm font-medium mb-1">Email</label>
                            <input type="email" id="email" name="email" 
                                   value="{{ old('email', auth()->user()->email) }}"
                                   class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                            @error('email')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Téléphone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium mb-1">Téléphone</label>
                            <input type="tel" id="phone" name="phone" 
                                   value="{{ old('phone', auth()->user()->phone) }}"
                                   class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Société -->
                        <div>
                            <label for="company" class="block text-sm font-medium mb-1">Société (optionnel)</label>
                            <input type="text" id="company" name="company" 
                                   value="maroc"
                                   class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                            @error('company')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Adresse -->
                        <div class="md:col-span-2">
                            <label for="address" class="block text-sm font-medium mb-1">Adresse</label>
                            <input type="text" id="address" name="address" 
                                   value="{{ old('address', auth()->user()->address) }}"
                                   class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                            @error('address')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Ville et Code postal -->
                        <div>
                            <label for="city" class="block text-sm font-medium mb-1">Ville</label>
                            <input type="text" id="city" name="city" 
                                   value="{{ old('city', auth()->user()->city) }}"
                                   class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                            @error('city')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="zip_code" class="block text-sm font-medium mb-1">Code postal</label>
                            <input type="text" id="zip_code" name="zip_code" 
                                   value="zip_code"
                                   class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                            @error('zip_code')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Pays -->
                        <div class="md:col-span-2">
                            <label for="country" class="block text-sm font-medium mb-1">Pays</label>
                            <select id="country" name="country" 
                                    class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                                <option value="">Sélectionnez un pays</option>
                                    <option value=" 1">
                                       maroc
                                    </option>
                                
                            </select>
                            @error('country')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Bio -->
                        <div class="md:col-span-2">
                            <label for="bio" class="block text-sm font-medium mb-1">Description (optionnel)</label>
                            <textarea id="bio" name="bio" rows="3"
                                      class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint, molestiae?</textarea>
                            @error('bio')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6 flex justify-end">
                        <button type="submit" 
                                class="bg-orange-500 hover:bg-orange-600 text-white font-medium py-2 px-6 rounded-lg transition-colors">
                            Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Social Media Section -->
    <div class="bg-gray-800 rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4 flex items-center">
            <i class="fas fa-share-alt text-orange-500 mr-2"></i>
            Réseaux sociaux
        </h2>

        <form action="#" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach(['facebook', 'twitter', 'instagram', 'linkedin', 'website'] as $social)
                <div>
                    <label for="{{ $social }}" class="block text-sm font-medium mb-1">
                        <i class="fab fa-{{ $social }} mr-1"></i>
                        {{ ucfirst($social) }}
                    </label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 rounded-l-lg bg-gray-700 border border-r-0 border-gray-600 text-gray-300">
                            https://
                        </span>
                        <input type="text" id="{{ $social }}" name="{{ $social }}" 
                               value="{{ old($social, auth()->user()->socialLinks->$social ?? '') }}"
                               placeholder="votre-lien.{{ $social == 'website' ? 'com' : $social }}"
                               class="flex-1 bg-gray-700 border border-gray-600 rounded-r-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                    </div>
                    @error($social)
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                @endforeach
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" 
                        class="bg-orange-500 hover:bg-orange-600 text-white font-medium py-2 px-6 rounded-lg transition-colors">
                    Enregistrer les liens
                </button>
            </div>
        </form>
    </div>

    <!-- Delete Account Section -->
    <div class="bg-gray-800 rounded-lg p-6 border border-red-500/30">
        <h2 class="text-xl font-semibold mb-2 flex items-center text-red-400">
            <i class="fas fa-exclamation-triangle mr-2"></i>
            Zone dangereuse
        </h2>
        <p class="text-sm text-gray-400 mb-4">La suppression de votre compte est irréversible. Toutes vos données seront perdues.</p>

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h3 class="font-medium">Supprimer mon compte</h3>
                <p class="text-sm text-gray-400">Cette action ne peut pas être annulée</p>
            </div>
            <button type="button" 
                    onclick="confirmDelete()"
                    class="bg-red-500/20 hover:bg-red-500/30 text-red-400 hover:text-red-300 font-medium py-2 px-4 rounded-lg transition-colors border border-red-500/30">
                Supprimer le compte
            </button>
        </div>
    </div>
</div>

<script>
    function confirmDelete() {
        if (confirm('Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.')) {
            document.getElementById('delete-form').submit();
        }
    }
</script>

<!-- Hidden Delete Form -->
<form id="delete-form" action="#" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>
@endsection