<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Connexion</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <!-- Logo Admin -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center animate__animated animate__fadeInDown">
            <svg class="mx-auto h-16 w-16 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"></path>
            </svg>
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                Espace Administrateur
            </h2>
        </div>

        <!-- Formulaire -->
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md animate__animated animate__fadeInUp">
            <div class="bg-white py-8 px-6 shadow-lg rounded-lg sm:px-10 border-t-4 border-indigo-500">
                <form id="loginForm" class="mb-0 space-y-6" action="#" method="POST">
                    <!-- Champ Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email administratif
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                            </div>
                            <input id="email" name="email" type="email" autocomplete="email" required 
                                class="py-2 pl-10 block w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" 
                                placeholder="admin@votredomaine.com">
                        </div>
                    </div>

                    <!-- Champ Mot de passe -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Mot de passe
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="current-password" required 
                                class="py-2 pl-10 block w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" 
                                placeholder="••••••••">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button type="button" id="togglePassword" class="text-gray-400 hover:text-gray-500">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Options -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" 
                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-700">
                                Se souvenir de moi
                            </label>
                        </div>
                        <div class="text-sm">
                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                Mot de passe oublié ?
                            </a>
                        </div>
                    </div>
                    <button type="submit">yaaas</button>

                    <!-- Bouton de connexion -->
                    <div>
                        <a href="{{route('users.index')}}" id="loginBtn"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                            <span id="btnText">Connexion</span>
                            <svg id="spinner" class="hidden ml-2 h-5 w-5 text-white animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </a>
                    </div>
                </form>
            </div>
            <p class="mt-4 text-center text-sm text-gray-600">
                © 2023 Votre Société. Tous droits réservés.
            </p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            
            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.querySelector('svg').setAttribute('stroke', type === 'password' ? 'currentColor' : '#4F46E5');
            });

            // Form submission
            const loginForm = document.getElementById('loginForm');
            const loginBtn = document.getElementById('loginBtn');
            const btnText = document.getElementById('btnText');
            const spinner = document.getElementById('spinner');
            
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Simulate loading
                btnText.textContent = 'Connexion en cours...';
                spinner.classList.remove('hidden');
                loginBtn.disabled = true;
                
                // Simulate API call (replace with actual fetch)
                setTimeout(() => {
                    // Here you would normally make a fetch request
                    console.log('Email:', document.getElementById('email').value);
                    console.log('Password:', document.getElementById('password').value);
                    
                    // Reset button state (in a real app, handle success/error)
                    btnText.textContent = 'Connexion';
                    spinner.classList.add('hidden');
                    loginBtn.disabled = false;
                    
                    // Show success message (replace with actual redirect)
                    alert('Connexion simulée avec succès! Redirection...');
                    // window.location.href = '/admin/dashboard';
                }, 1500);
            });

            // Input validation on blur
            const emailInput = document.getElementById('email');
            emailInput.addEventListener('blur', function() {
                if (!this.value.includes('@') || !this.value.includes('.')) {
                    this.classList.add('border-red-500');
                    this.nextElementSibling?.remove(); // Remove existing error if any
                    const error = document.createElement('p');
                    error.className = 'mt-1 text-sm text-red-600';
                    error.textContent = 'Veuillez entrer une adresse email valide';
                    this.parentNode.appendChild(error);
                } else {
                    this.classList.remove('border-red-500');
                    this.nextElementSibling?.remove(); // Remove error if fixed
                }
            });
        });
    </script>
</body>
</html>