<x-layout>
    <main class="w-full">
        <section class="container mx-auto px-4 py-20">
            <div class="max-w-[600px] mx-auto">
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-8">
                        <div class="flex items-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary mr-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                            <!-- Header -->
                            <h2 class="text-2xl font-semibold text-gray-800">Forgot Password</h2>
                        </div>
                        
                        <p class="text-gray-600 text-center mb-6">Enter your account email here and if it matches an existing account we will send you a password reset email!</p>
                        
                        <form method="POST" class="space-y-6">
                            @csrf

                            <!-- Email -->
                            <div>
                                <x-form-input name="email" id="email" type="email" :value="old('email')" label="Email" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition"/>
                                <x-form-error name="email"/>
                            </div>
                            
                            <!-- Submit -->
                            <div class="pt-2">
                                <button type="submit" class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-3 px-6 rounded-lg transition flex items-center justify-center">
                                    Reset Password
                                </button>
                            </div>
                            
                            <div class="flex items-center justify-center mt-4">
                                <a href="login" class="text-primary font-bold hover:text-primary/80 transition">Back to Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout>