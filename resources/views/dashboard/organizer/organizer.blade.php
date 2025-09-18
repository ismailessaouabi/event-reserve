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
            
            <!-- Form -->
            <div class="flex-1">
                <form action="{{-- route('organizer.update' , auth()->user()->id)  --}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- profil image -->
                        <div class="md:col-span-2">
                            <label for="profil_image" class="block text-sm font-medium mb-1">Image de profil</label>
                            <div class="mb-2">
                                @if (auth()->user()->profile_picture)
                                    <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Picture" class="w-24 h-24 obfject-cover rounded-full">
                                @else
                                    <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile Picture" class="w-24 h-24 rounded-full">
                                @endif
                            </div>
                            <label for="profil_image" class="block text-sm font-medium mb-1">
                                <span class="text-gray-400">Sélectionner une nouvelle image</span>
                                <input type="file" id="profil_image" name="profile_picture" class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                            </label>
                            @error('profile_picture')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                       

                        <!-- nom -->
                        <div>
                            <label for="first_name" class="block text-sm font-medium mb-1">Prénom</label>
                            <input type="text" id="first_name" name="name" 
                                   value="{{-- old('name', auth()->user()->name) --}}"
                                   class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                            @error('first_name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="md:col-span-2">
                            <label for="email" class="block text-sm font-medium mb-1">Email</label>
                            <input type="email" id="email" name="email" 
                                   value="{{-- old('email', auth()->user()->email) --}}"
                                   class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                            @error('email')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Téléphone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium mb-1">Téléphone</label>
                            <input type="tel" id="phone" name="phone" 
                                   value="{{-- old('phone', auth()->user()->phone) --}}"
                                   class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Société -->
                        <div>
                            <label for="company" class="block text-sm font-medium mb-1">Société (optionnel)</label>
                            <input type="text" id="company" name="company" 
                                   value="{{-- old('company', auth()->user()->nom_entreprise) --}}"
                                   class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                            @error('company')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Adresse -->
                        <div class="md:col-span-2">
                            <label for="address" class="block text-sm font-medium mb-1">Adresse</label>
                            <input type="text" id="address" name="address" 
                                   value="{{-- auth()->user()->address --}}"
                                   class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                            @error('address')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Ville et Code postal -->
                        <div>
                            <label for="city" class="block text-sm font-medium mb-1">Ville</label>
                            <input type="text" id="city" name="city" 
                                   value="{{-- auth()->user()->city --}}"
                                   class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                            @error('city')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="postal_code" class="block text-sm font-medium mb-1">Code postal</label>
                            <input type="text" id="postal_code" name="postal_code" 
                                   value="{{--  auth()->user()->postal_code --}}"
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
                                    <option value=" {{-- old('country', auth()->user()->country) --}}">
                                        {{-- old('country', auth()->user()->country)--}}
                                    </option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Africana">Africana</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Australia">Australia</option>
                                
                            </select>
                            @error('country')
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

        <form action="" method="POST">
            @csrf
           

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="facebook" class="block text-sm font-medium mb-1">
                            <i class="fab fa-facebook mr-1"></i>
                        </label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 rounded-l-lg bg-gray-700 border border-r-0 border-gray-600 text-gray-300">
                                https://
                            </span>
                            <input type="text" id="facebook" name="facebook" 
                                    value="{{ $socialmedia ? $socialmedia->facebook : '' }}"
                                   placeholder="votre-lien.com"
                                   class="flex-1 bg-gray-700 border border-gray-600 rounded-r-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                        </div>
                        
                    </div>  
                    <div>
                        <label for="facebook" class="block text-sm font-medium mb-1">
                            <i class="fab fa-instagram mr-1"></i>
                        </label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 rounded-l-lg bg-gray-700 border border-r-0 border-gray-600 text-gray-300">
                                https://
                            </span>
                            <input type="text" id="facebook" name="facebook" 
                                    value="{{ $socialmedia ? $socialmedia->instagram : '' }}"
                                   placeholder="votre-lien.com"
                                   class="flex-1 bg-gray-700 border border-gray-600 rounded-r-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                        </div>
                        
                    </div>
                    <div>
                        <label for="facebook" class="block text-sm font-medium mb-1">
                            <i class="fab fa-twitter mr-1"></i>
                        </label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 rounded-l-lg bg-gray-700 border border-r-0 border-gray-600 text-gray-300">
                                https://
                            </span>
                            <input type="text" id="facebook" name="facebook" 
                                    value="{{ $socialmedia ? $socialmedia->twitter : '' }}"
                                   placeholder="votre-lien.com"
                                   class="flex-1 bg-gray-700 border border-gray-600 rounded-r-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                        </div>
                        
                    </div>
                    <div>
                        <label for="facebook" class="block text-sm font-medium mb-1">
                            <i class="fab fa-linkedin mr-1"></i>
                        </label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 rounded-l-lg bg-gray-700 border border-r-0 border-gray-600 text-gray-300">
                                https://
                            </span>
                            <input type="text" id="facebook" name="facebook" 
                                    value="{{ $socialmedia ? $socialmedia->linkedin : '' }}"
                                   placeholder="votre-lien.com"
                                   class="flex-1 bg-gray-700 border border-gray-600 rounded-r-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                        </div>
                        
                    </div>
                    <div>
                        <label for="facebook" class="block text-sm font-medium mb-1">
                            <i class="fab fa-site-web mr-1"></i>
                        </label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 rounded-l-lg bg-gray-700 border border-r-0 border-gray-600 text-gray-300">
                                https://
                            </span>
                            <input type="text" id="facebook" name="facebook" 
                                    value="{{ $socialmedia ? $socialmedia->website : '' }}"
                                   placeholder="votre-lien.com"
                                   class="flex-1 bg-gray-700 border border-gray-600 rounded-r-lg px-4 py-2 focus:border-orange-500 focus:ring-orange-500">
                        </div>
                        
                    </div>            
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