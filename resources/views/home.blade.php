<script src="{{ asset('js/slides.js') }}"></script>
<x-layout>
  <section class="relative w-full min-h-[calc(100vh-200px)] bg-cover bg-center" style="background-image: url('images/bg1.jpg');">
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center">
      <h1 class="text-5xl font-bold pb-4">Farm To Fork</h1>
      <h2 class="text-primary text-2xl font-semibold pb-8">Fresh Ingredients, Delivered to Your Doorstep</h2>
      <div class="flex justify-center space-x-5">
        <a href="#" class="px-7 py-3 bg-primary text-white rounded-lg hover:brightness-95 text-lg md:text-2xl font-bold transition duration-300 ease-in-out">Collection</a>
        <a href="products.html" class="px-7 py-3 bg-text text-white rounded-lg hover:brightness-95 text-lg md:text-2xl font-bold transition duration-300 ease-in-out">Shop Now</a>
      </div>
    </div>
  </section>

  <section class="flex flex-col m-3 space-y-6 items-center md:flex-row md:space-x-6 md:space-y-0 md:justify-between">
    <div class="flex bg-gray-200 rounded-xl justify-center items-center w-[90%] h-[300px]">
      <p class="m-auto">Place Holder Text</p>
    </div>
    <div class="flex bg-gray-200 rounded-xl justify-center items-center w-[90%] h-[300px]">
      <p class="m-auto">Place Holder Text</p>
    </div>
    <div class="flex bg-gray-200 rounded-xl justify-center items-center w-[90%] h-[300px]">
      <p class="m-auto">Place Holder Text</p>
    </div>
  </section>

  <section class="w-full h-[830px]">

    <div class="w-full h-[100px] flex flex-col items-center justify-center">
      <h1 class="text-4xl font-bold mb-2">Product Gallery</h1>
    </div>
  
    <div class="w-full h-[730px] flex items-center justify-center">
      <div class="w-[90%] h-[90%] p-5 rounded-3xl shadow-lg relative">
  
        <div class="slideshow-container h-full w-full relative">
          <div class="slides fade h-full w-full">
            <img src="images/productgallery1.jpg" alt="Slide 1" class="slide-img rounded-3xl">
          </div>
          <div class="slides fade h-full w-full">
            <img src="images/productgallery2.jpg" alt="Slide 2" class="slide-img rounded-3xl">
          </div>
          <div class="slides fade h-full w-full">
            <img src="images/productgallery3.jpg" alt="Slide 3" class="slide-img rounded-3xl">
          </div>
          <div class="slides fade h-full w-full">
            <img src="images/productgallery4.jpg" alt="Slide 4" class="slide-img rounded-3xl">
          </div>
          <div class="slides fade h-full w-full">
            <img src="images/productgallery5.jpg" alt="Slide 5" class="slide-img rounded-3xl">
          </div>
  
          <div class="dot-container absolute bottom-4 left-0 right-0 flex justify-center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
          </div> 
  
        </div></div>
  
      </div>
    </div>
    
  </section>

  <section class="w-full py-10 flex flex-col items-center">
    <div class="text-center mb-8">
      <h1 class="text-5xl font-bold">Our Location</h1>
    </div>
    <div class="bg-white flex justify-center p-4 m-4 rounded-2xl drop-shadow-lg w-[90%]">
      <div class="w-full h-[400px] md:h-[500px] rounded-3xl overflow-hidden">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d358416.0809155384!2d-2.303475838479177!3d52.34936048196967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870c59b828a514b%3A0x971a4bc185c5f254!2sFarms%20To%20Fork%20Ltd!5e0!3m2!1sen!2suk!4v1729868207310!5m2!1sen!2suk" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </section>

</x-layout>
