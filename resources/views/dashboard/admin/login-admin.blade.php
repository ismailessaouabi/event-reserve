<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-purple-600 via-blue-600 to-indigo-800 flex items-center justify-center p-4">
    <!-- Éléments décoratifs de fond -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse animation-delay-2000"></div>
        <div class="absolute top-40 left-40 w-60 h-60 bg-indigo-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse animation-delay-4000"></div>
    </div>

    <!-- Container principal -->
    <div class="relative w-full max-w-md fade-in">
        <!-- Carte de connexion -->
        <div class="glass-effect rounded-2xl p-8 shadow-2xl">
            <!-- Logo/Titre -->
            <div class="text-center mb-8">
                <div class="mx-auto w-16 h-16 bg-gradient-to-tr from-purple-400 to-blue-400 rounded-full flex items-center justify-center mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-white mb-2">Bienvenue</h1>
                <p class="text-gray-200 text-sm">Connectez-vous à votre compte</p>
            </div>

            <!-- Formulaire -->
            <form class="space-y-6" action="{{ route('login.admin.post') }}" method="POST" >
                @csrf
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                    
                @endif
                <!-- Champ Email -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-gray-200">Email</label>
                    <div class="relative">
                        <input 
                            type="email" 
                            id="email" 
                            name="email"
                            required
                            class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition-all duration-200 backdrop-blur-sm"
                            placeholder="votre@email.com"
                        />
                        <svg class="absolute right-3 top-3.5 w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                    </div>
                </div>

                <!-- Champ Mot de passe -->
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-medium text-gray-200">Mot de passe</label>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="password" 
                            name="password"
                            required
                            class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition-all duration-200 backdrop-blur-sm"
                            placeholder="••••••••"
                        />
                        <button 
                            type="button" 
                            
                            class="absolute right-3 top-3.5 text-gray-300 hover:text-white transition-colors"
                        >
                            <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                

                <!-- Bouton de connexion -->
                <button 
                    type="submit"
                    class="w-full bg-gradient-to-r from-purple-500 to-blue-500 hover:from-purple-600 hover:to-blue-600 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-offset-2 focus:ring-offset-transparent"
                >
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Se connecter
                    </span>
                </button>
            </form>

            <!-- Séparateur -->
            <div class="mt-6 text-center">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300/30"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-transparent text-gray-300">ou</span>
                    </div>
                </div>
            </div>

            

            
        </div>
    </div>

    <script>
        

        
        
    </script>
</body>
</html>