<x-layout>
    <main class="w-full">
        <section class="relative w-full min-h-[calc(100vh-100px)] bg-cover bg-center" style="background-image: url('images/Aboutus.jpg');">
          <div class="absolute inset-0 flex flex-col items-center justify-center text-center">
            <h1 class="text-white text-6xl font-bold pb-4">About us</h1>
          </div>
        </section>
        
        <!-- Header - Our Story -->
        <section class="w-full h-830px">
          <section class="w-full h-[100px] bg-white">
            <div class="w-full h-[100px] flex flex-col items-center justify-center">
              <h1 class="text-5xl font-bold text-primary mb-2">Our Story</h1>
            </div>
          </section>

          <!-- Section 1 -->
           <!-- Content -->
          <section class=" w-full h-730px flex flex-wrap flex-col lg:flex-row items-center "> 
            <div class="lg:w-1/2 w-full lg:h-1/2 h-300px p-5 flex items-center justify-center ">
              <div class="bg-gray-200 rounded-2xl w-3/4 h-3/4 lg:p-10 p-4">
                <p class="text-black">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                   Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
              </div>
            </div>
            <!-- Image 1 -->
            <section class=" lg:w-1/2 w-full lg:h-1/2 h-300px p-5 flex items-center justify-center ">
              <div class="w-3/4 h-3/4">
                <img src="images/Aboutus1.jpg" alt="Our Story 1" class="about-img w-full h-full rounded-3xl">
              </div>
            </section>
            <!-- Section 2 -->
            <!-- Image 2 -->
            <section class="lg:w-1/2 w-full lg:h-1/2 h-300px p-5 flex items-center justify-center ">
              <div class="w-3/4 h-3/4">
                <img src="images/Aboutus2.jpg" alt="Our Story 2" class="about-img w-full h-full rounded-3xl">
              </div>
            </section>
            <!-- Content -->
            <section class=" lg:w-1/2 w-full lg:h-1/2 h-300px p-5 flex items-center justify-center ">
              <div class="bg-gray-200 rounded-2xl w-3/4 h-3/4 lg:p-10 p-4">
                <p class="text-black">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
              </div>
            </section>
          </section>
        </section>
        <section class="w-full h-830px">

        <!-- Header - Our Mission -->
        <section class="w-full">
          <div class="w-full h-[100px] flex flex-col items-center justify-center">
            <h1 class="text-5xl font-bold text-secondary mb-2">Our Mission</h1>
          </div>
          <!-- Content -->
          <section class="w-full flex flex-wrap lg:flex-nowrap items-center">
            <div class="w-full lg:w-1/2 p-5 flex items-center justify-center">
              <div class="bg-gray-200 rounded-2xl w-full md:w-3/4 lg:p-10 p-4">
                <p class="text-black">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
              </div>
            </div>
            <!-- Image 3 -->
            <div class="w-full lg:w-1/2 p-5 flex items-center justify-center">
              <div class="w-full md:w-3/4">
                <img src="images/Aboutus3.jpg" alt="Our Mission" class="w-full h-auto rounded-3xl">
              </div>
            </div>
          </section>
        </section>
    
        <!-- Header - Our Location -->
        <section class="w-full h-800px bg-white mb-12">
          <section>
            <div class="w-full h-[100px] flex flex-col items-center justify-center">
             <h1 class="text-5xl font-bold text-primary mb-2">Our location</h1>
            </div>
          </section>
          <!-- Google Maps -->
          <section>
            <div class="w-full h-700px flex justify-center px-4">
              <div class="bg-gray-200 w-full md:w-[90%] h-[400px] md:h-[500px] rounded-3xl overflow-hidden">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d358416.0809155384!2d-2.303475838479177!3d52.34936048196967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870c59b828a514b%3A0x971a4bc185c5f254!2sFarms%20To%20Fork%20Ltd!5e0!3m2!1sen!2suk!4v1729868207310!5m2!1sen!2suk" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
          </section>
        </section>
    </main>
</x-layout>