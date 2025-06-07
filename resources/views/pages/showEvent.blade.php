<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Événement - Master Musicians of Jajouka</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-gray-900 to-slate-800 text-white min-h-screen">
    
    <!-- Header Navigation -->
    <div class="flex  items-center justify-between p-6 relative z-10">
        <a href="{{ route('events.home') }}" 
           class="group flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 hover:bg-white/20 transition-all duration-300 rounded-full p-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:-translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="text-sm font-medium hidden sm:block">Retour</span>
        </a>
        
        <div class="flex gap-3">
            <button class="bg-white/10 backdrop-blur-sm border border-white/20 hover:bg-white/20 transition-all duration-300 rounded-full p-3 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                </svg>
            </button>
            <button class="bg-white/10 backdrop-blur-sm border border-white/20 hover:bg-red-500/20 hover:border-red-400/30 transition-all duration-300 rounded-full p-3 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:scale-110 transition-transform duration-300 group-hover:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container  mx-auto px-6 pb-12">
        <div class="grid  lg:grid-cols-2 gap-12 items-start">
            
            <!-- Image Section -->
            <div class="relative h-full">
                <div class="bg-white/5 h-full backdrop-blur-sm border border-white/10 rounded-3xl p-2 shadow-2xl">
                    <div class="relative  h-full overflow-hidden rounded-2xl">
                        <img src="{{ Storage::url($event->image_path) }}" 
                             alt="Master Musicians of Jajouka" 
                             class="w-full h-full  lg: object-cover transform hover:scale-105 transition-transform duration-700">
                    </div>
                </div>
                
                <!-- Floating Category Badge -->
                <div class="absolute -top-4 left-8">
                    <span class="inline-flex items-center px-4 py-2 bg-emerald-500 text-emerald-50 text-sm font-semibold rounded-full shadow-lg">
                        <span class="w-2 h-2 bg-emerald-200 rounded-full mr-2 animate-pulse"></span>
                        {{ $event->category->name }}
                    </span>
                </div>
            </div>
            
            <!-- Event Information -->
            <div class="space-y-8">
                
                <!-- Title -->
                <div>
                    <h1 class="text-4xl lg:text-5xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent leading-tight">
                        {{ $event->name }}
                    </h1>
                </div>
                
                <!-- Event Details Cards -->
                <div class="space-y-4">
                    <!-- Location -->
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-all duration-300">
                        <div class="flex items-center gap-4">
                            <div class="bg-blue-500/20 p-3 rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm font-medium">Lieu</p>
                                <p class="text-white font-semibold text-lg">{{ $event->place->name }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Start Time -->
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-all duration-300">
                        <div class="flex items-center gap-4">
                            <div class="bg-green-500/20 p-3 rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm font-medium">Début</p>
                                <p class="text-white font-semibold text-lg">{{ $event->start_time }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- End Time -->
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-all duration-300">
                        <div class="flex items-center gap-4">
                            <div class="bg-red-500/20 p-3 rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm font-medium">Fin</p>
                                <p class="text-white font-semibold text-lg">{{ $event->end_time }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Description -->
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6">
                    <h3 class="text-xl font-semibold mb-4 text-white">Description</h3>
                    <p class="text-gray-300 leading-relaxed">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum animi blanditiis, nihil beatae sapiente iusto eligendi nobis impedit delectus est? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa distinctio quasi perspiciatis, sed accusamus, mollitia nemo veritatis harum est, adipisci ex atque optio nam et nisi molestias dolore fugiat. Amet similique facere velit, eligendi ad cupiditate doloremque sunt rerum omnis cumque molestias ab fugit corrupti reprehenderit non magnam ipsam expedita.
                    </p>
                </div>
                
                <!-- Price and Purchase Section -->
                <div class="bg-gradient-to-r from-blue-600/20 to-purple-600/20 backdrop-blur-sm border border-blue-400/20 rounded-2xl p-8">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                        <div class="text-center sm:text-left">
                            <p class="text-gray-300 text-sm font-medium mb-2">Prix du billet</p>
                            <div class="flex items-baseline gap-2">
                                @if($event->teckets->count() > 0)
                                    <span class="text-4xl font-bold text-white">{{ $event->teckets->first()->prix }}</span>
                                @else
                                    <span class="text-4xl font-bold text-white">300</span>
                                @endif
                                <span class="text-xl text-gray-400 font-medium">MAD</span>
                            </div>
                        </div>
                        
                        <a href="{{ route('payement.checkout', $event->id) }}" 
                           class="group bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:rotate-12 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Acheter maintenant
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Decorative Elements -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-500/10 rounded-full blur-3xl"></div>
    </div>

</body>
</html>