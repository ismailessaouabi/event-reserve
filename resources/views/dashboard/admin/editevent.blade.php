@extends('dashboard.admin.layouts')

@section('content')
<div class="flex justify-center items-center w-full h-screen flex-col lg:flex-row gap-8">
    <div class="w-full lg:w-1/3">
        <div class="bg-white rounded shadow">
            <div class="p-6">
                <form action="{{ route('events.update',  $event->id) }}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                        <input type="text" id="name" name="name" value="{{ $event->name }}" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                        
                        <div class="flex flex-col space-y-3">
                            <!-- Affichage de l'image existante -->
                            @if(isset($event) && $event->image_path)
                                <div class="relative w-32 h-32 border border-gray-300 rounded-md overflow-hidden group">
                                    <img src="{{ Storage::url($event->image_path) }}" alt="Event Image" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                        <span class="text-white text-xs">Image actuelle</span>
                                    </div>
                                </div>
                            @else
                                <div class="w-32 h-32 border border-gray-300 rounded-md flex items-center justify-center bg-gray-100">
                                    <span class="text-gray-400 text-sm">Aucune image</span>
                                </div>
                            @endif
                            
                            <!-- Interface d'upload -->
                            <div class="flex flex-col">
                                <div class="flex items-center space-x-2">
                                    <input type="file" id="image" name="image" 
                                        class="hidden" 
                                        accept="image/*"
                                        onchange="previewNewImage(this);">
                                    <label for="image" class="px-3 py-2 bg-blue-500 text-white text-sm rounded cursor-pointer hover:bg-blue-600 transition-colors">
                                        {{ isset($event) && $event->image_path ? 'Changer l\'image' : 'Ajouter une image' }}
                                    </label>
                                    <span id="file-selected" class="text-sm text-gray-600">Aucun fichier sélectionné</span>
                                </div>
                                
                                <!-- Prévisualisation de la nouvelle image -->
                                <div id="preview-container" class="mt-2 hidden">
                                    <p class="text-xs text-gray-600 mb-1">Aperçu de la nouvelle image:</p>
                                    <div class="relative w-32 h-32 border border-gray-300 rounded-md overflow-hidden">
                                        <img id="preview-image" src="#" alt="Aperçu" class="w-full h-full object-cover">
                                        <button type="button" onclick="resetImageUpload()" class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @error('image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                        <select name="category" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="category_id">
                            @if(isset($categories) && count($categories) > 0)
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if($category->id == $event->category_id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            @else
                                <option value="">Aucune catégorie trouvée</option>
                            @endif
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="lieu" class="block text-sm font-medium text-gray-700 mb-1">Lieu</label>
                        <input type="text" id="lieu" name="lieu" value="{{ $event->place->name }}" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        @error('lieu')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function previewNewImage(input) {
        const fileSelected = document.getElementById('file-selected');
        const previewContainer = document.getElementById('preview-container');
        const previewImage = document.getElementById('preview-image');
        
        if (input.files && input.files[0]) {
            const fileName = input.files[0].name;
            fileSelected.textContent = fileName.length > 20 ? fileName.substring(0, 17) + '...' : fileName;
            
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            resetImageDisplay();
        }
    }
    
    function resetImageUpload() {
        document.getElementById('image').value = '';
        resetImageDisplay();
    }
    
    function resetImageDisplay() {
        document.getElementById('file-selected').textContent = 'Aucun fichier sélectionné';
        document.getElementById('preview-container').classList.add('hidden');
    }
</script>
@endsection