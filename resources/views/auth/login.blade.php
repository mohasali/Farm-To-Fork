<x-layout title="Login">
    <main class="w-full">
        <section class="container mx-auto px-4 py-32">
            <div class="max-w-[600px] mx-auto">
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-8">
                        <div class="flex items-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary mr-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            <!-- Header -->
                            <h2 class="text-2xl font-semibold text-gray-800">Log In</h2>
                        </div>
                        
                        <form method="POST" class="space-y-6">
                            @csrf
                            <!-- Login -->
                            <div>
                                <x-form-input name="email" id="email" type="email" :value="old('email')" label="Email" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition"/>
                                <x-form-error name="email"/>
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                <div class="relative password-container">
                                    <input type="password" name="password" id="password" class="w-full p-3 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition"/>
                                    <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500 hover:text-primary password-toggle">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </span>
                                </div>
                                <x-form-error name="password"/>
                                <a href="forgot-password" class="text-primary text-sm mt-1 inline-block hover:text-primary/80 transition">Forgot Password?</a>
                            </div>
                            
                            <!-- Submit -->
                            <div class="pt-2">
                                <button type="submit" class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-3 px-6 rounded-lg transition flex items-center justify-center">
                                    Log In
                                </button>
                            </div>
                            
                            <div class="flex items-center justify-center mt-4">
                                <p class="text-gray-600">Don't have an account?</p>
                                <a href="register" class="ml-2 text-primary font-bold hover:text-primary/80 transition">Sign up</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordContainers = document.querySelectorAll('.password-container');
            
            passwordContainers.forEach(container => {
                const inputField = container.querySelector('input');
                const toggleIcon = container.querySelector('.password-toggle');
                
                // Hover to show pass
                toggleIcon.addEventListener('mouseenter', function() {
                    inputField.type = 'text';
                });
                
                // when mouse leaves, change it to password = hide
                toggleIcon.addEventListener('mouseleave', function() {
                    inputField.type = 'password';
                });
            });
        });
    </script>
</x-layout>