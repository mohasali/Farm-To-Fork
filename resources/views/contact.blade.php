<x-layout>
    <main class="w-full bg-gray-50">
            <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-center">
                <h1 class="text-white text-4xl md:text-6xl font-bold mb-4">Contact Us</h1>
                <p class="text-white/90 text-lg md:text-xl max-w-2xl px-6">Got a query?<br>Ask away! Farm to Fork is here to help!</p>
            </div>
        </section>

        <!-- Contact Form -->
        <section class="container mx-auto px-4 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
              <!-- Send a message -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-8">
                        <div class="flex items-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary mr-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                            <!-- Header -->
                            <h2 class="text-2xl font-semibold text-gray-800">Send Us a Message</h2>
                        </div>
                        
                        <form action="https://formspree.io/f/mldezkpj" method="POST" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- First Name -->
                                <div>
                                    <label for="forename" class="block text-sm font-medium text-gray-700 mb-1">Forename</label>
                                    <input type="text" id="forename" name="forename" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition" placeholder="Enter your forename" required>
                                </div>
                                
                                <!-- Surname -->
                                <div>
                                    <label for="surname" class="block text-sm font-medium text-gray-700 mb-1">Surname</label>
                                    <input type="text" id="surname" name="surname" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition" placeholder="Enter your surname" required>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Email Address -->
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                    <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition" placeholder="Enter your email" required>
                                </div>
                                
                                <!-- Phone Number -->
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition" placeholder="Enter your phone number" pattern="(\+44\s?\d{10}|0\d{10})" title="Phone number must be in the format +44 0000000000 or 00000000000">
                                </div>
                            </div>
                            
                            <!-- Description -->
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Your Query</label>
                                <textarea id="message" name="message" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition resize-none" rows="5" placeholder="Write your query here..."required></textarea>
                            </div>
                            
                            <!-- Submit -->
                            <div class="pt-2">
                                <button type="submit" class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-3 px-6 rounded-lg transition flex items-center justify-center">
                                    Send
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Our Location -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-8">
                        <div class="flex items-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-primary mr-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <!-- Header -->
                            <h2 class="text-2xl font-semibold text-gray-800">Our Location</h2>
                        </div>

                        <div class="mb-6 space-y-4">
                            <!-- Address -->
                            <div class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-primary mt-1 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                <div>
                                    <h3 class="text-gray-700 font-medium">Address</h3>
                                    <p class="text-gray-600">Farms To Fork Ltd, West Midlands, UK</p>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-primary mt-1 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                                <div>
                                    <h3 class="text-gray-700 font-medium">Email</h3>
                                    <p class="text-gray-600">farmtofork.999@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Google embed -->
                        <div class="rounded-lg overflow-hidden h-[300px]">
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d358416.0809155384!2d-2.303475838479177!3d52.34936048196967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870c59b828a514b%3A0x971a4bc185c5f254!2sFarms%20To%20Fork%20Ltd!5e0!3m2!1sen!2suk!4v1729868207310!5m2!1sen!2suk" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout>