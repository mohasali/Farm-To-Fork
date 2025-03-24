<x-layout title="About Us">
    <main class="w-full bg-gray-50">
        <!-- Image background with parallax!!!!-->
        <section class="relative w-full h-96 md:h-[500px] bg-cover bg-center bg-fixed" style="background-image: url('images/Aboutus.jpg');">
            <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-center">
                <h1 class="text-white text-4xl md:text-6xl font-bold mb-4">About Us</h1>
                <p class="text-white/90 text-lg md:text-xl max-w-2xl px-6">Discover our story, mission, and commitment to sustainable food systems.</p>
            </div>
        </section>

        <!-- Header - Our Story -->
        <section class="container mx-auto px-4 py-16">
            <div class="mb-12 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Our Story</h2>
                <div class="w-24 h-1 bg-primary mx-auto"></div>
            </div>

            <!-- Our Story Content -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
                <!-- Content -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-8">
                        <p class="text-gray-700 leading-relaxed">
                            Welcome to Farm to Fork! We are your sustainable solution to fresh, locally grown produce delivered straight to your fork. 
                            We take inspiration from the European Union's Farm to Fork Strategy for sustainable food systems, sharing the vision to reduce the environmental impact of food production while tackling food waste.
                        </p>
                    </div>
                </div>
                <!-- Image 1 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="images/Aboutus1.jpg" alt="Our Story 1" class="w-full h-full object-cover">
                </div>
                
                <!-- Image 2 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="images/Aboutus2.jpg" alt="Our Story 2" class="w-full h-full object-cover">
                </div>
                <!-- Content -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-8">
                        <p class="text-gray-700 leading-relaxed mb-4">
                            At farm to fork, we offer subscription based, locally sourced produce boxes that prioritise sustainability, freshness and convenience. 
                            Our service includes:
                        </p>
                        <ul class="text-gray-700 space-y-2">
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-primary mt-1 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Locally sourced produce: we support local farmers while reducing the miles your food takes to get to you.</span>
                            </li>
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-primary mt-1 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Customisable boxes: we give you the flexibility to change the contents of your box to suit your preferences.</span>
                            </li>
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-primary mt-1 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Innovative recipes: we teach you how step by step the best ways to use our ingredients.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Header - Our Mission -->
            <div class="mb-12 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Our Mission</h2>
                <div class="w-24 h-1 bg-secondary mx-auto"></div>
            </div>

            <!-- Our Mission Content -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
                <!-- Content -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-8">
                        <p class="text-gray-700 leading-relaxed">
                            Our mission is to allow people to make eco-friendly food choices, while not compromising on convenience, taste and affordability. 
                            We cater to busy individuals aged 35 – 45 in metropolitan areas who often have busy schedules and lack the time to visit farmers markets but also value premium quality.
                            <br><br>
                            We understand the importance of cultural diversity in the UK, and we reflect that in our products. 
                            Our boxes feature ingredients originating from a wide range of cuisines, ensuring that every customer can receive a taste of home and the chance to try something new.
                            <br><br>
                            By picking up a box from Farm to Fork, you're not only investing in your health but also helping to build a greener more environmentally sustainable future. 
                            Together, we can reduce food waste, support our local farmers and change the views on sustainable cooking for good.
                        </p>
                    </div>
                </div>
                <!-- Image 3 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="images/Aboutus3.jpg" alt="Our Mission" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Header - Our Location -->
            <div class="mb-12 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Our Location</h2>
                <div class="w-24 h-1 bg-secondary mx-auto"></div>
            </div>

            <!-- Google Maps -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-secondary mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                        <h3 class="text-2xl font-semibold text-gray-800">Find Us</h3>
                    </div>
                    
                    <div class="mb-6 space-y-4">
                        <!-- Address -->
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-secondary mt-1 mr-3">
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
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-secondary mt-1 mr-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                            <div>
                                <h3 class="text-gray-700 font-medium">Email</h3>
                                <p class="text-gray-600">farmtofork.999@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Google embed -->
                    <div class="rounded-lg overflow-hidden h-[400px]">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d358416.0809155384!2d-2.303475838479177!3d52.34936048196967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870c59b828a514b%3A0x971a4bc185c5f254!2sFarms%20To%20Fork%20Ltd!5e0!3m2!1sen!2suk!4v1729868207310!5m2!1sen!2suk" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout>