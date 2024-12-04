<x-layout>
    <main class="w-full">

    <section class="relative w-full min-h-[calc(100vh-100px)] bg-cover bg-center" style="background-image: url('images/Aboutus.jpg');">
      <div class="absolute inset-0 flex flex-col items-center justify-center text-center">
        <h1 class="text-white text-6xl font-bold pb-4">About us</h1>
      </div>
    </section>
    

    <section class="w-full h-830px">
      <section class="w-full h-[100px] bg-white">
        <div class="w-full h-[100px] flex flex-col items-center justify-center">
          <h1 class="text-5xl font-bold text-black mb-2">Our Story</h1>
        </div>
      </section>

      <section class=" w-full h-730px flex flex-wrap flex-col lg:flex-row items-center "> 

        <section class="lg:w-1/2 w-full lg:h-1/2 h-300px p-5 flex items-center justify-center ">
          <div class="bg-gray-200 w-3/4 h-3/4 lg:p-10 p-4">
            <p class="text-black">content for the image on right</p>
          </div>
        </section>

        <section class="lg:w-1/2 w-full lg:h-1/2 h-300px p-5 flex items-center justify-center ">
          <div class="w-3/4 h-3/4">
            <img src="images/Aboutus1.jpg" alt="1" class="about-img w-full h-full rounded-3xl">
          </div>
        </section>

        <section class="lg:w-1/2 w-full lg:h-1/2 h-300px p-5 flex items-center justify-center ">
          <div class="w-3/4 h-3/4">
            <img src="images/Aboutus2.jpg" alt="our story 2" class="about-img w-full h-full rounded-3xl">
          </div>
        </section>

        <section class="lg:w-1/2 w-full lg:h-1/2 h-300px p-5 flex items-center justify-center ">
          <div class="bg-gray-200  w-3/4 h-3/4 lg:p-10 p-4">
            <p class="text-black">content for image on left</p>
          </div>
        </section>

      </section>
      
    </section>

    <section class="w-full h-full bg-gray-100 ">

      <section>
        <div class="w-full h-[100px] flex flex-col items-center justify-center">
         <h1 class="text-5xl font-bold text-black mb-2">Our Mission</h1>
        </div>
      </section>

      <section class=" w-full h-[full-100px] flex flex-wrap lg:flex-nowrap lg:flex-row"> 

        <section class=" w-1/2 lg:w-1/2 h-auto lg:p-5 p-5 items-center flex items-center justify-center">
          <div class="bg-gray-200  w-3/4 h-3/4 lg:p-10 p-4">
            <p class="text-black">content for the ima   ge on right</p>
          </div>
        </section>

        <section class=" w-1/2 lg:w-1/2 h-full p-5 lg:p-5 items-center flex items-center justify-center">
          <div class="w-3/4 h-3/4">
            <img src="images/Aboutus3.jpg" alt="1" class="about-img w-full h-full rounded-3xl">
          </div>
        </section>

      </section>
    </section>

  </main>

</x-layout>