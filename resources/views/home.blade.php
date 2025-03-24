<script src="{{ asset('js/slides.js') }}"></script>
<x-layout title="Home">
  <section class="relative w-full min-h-[calc(100vh-200px)] bg-cover bg-center bg-fixed" style="background-image: url('images/bg1.jpg');">
    <!-- Egg hunt banner -->
    <div class="relative z-10 flex flex-col pt-16 text-center">
      <h1 class="font-bold text-2xl text-primary">Egg Hunt is now LIVE</h1> 
      <p>5 eggs have been scattered across the website<br></p>
      <p>Find them all to win a prize!</p>
      <!-- Loop through egg_count and if user has found an egg, display it normally else display a transparent egg -->
      <p>
        @if (Auth::user())
          
        @for ($i = 1; $i <=Auth::user()->eggHunt()->count(); $i++)
            <span>🥚</span>
        @endfor
        @for ($i = 1; $i <=5-Auth::user()->eggHunt()->count(); $i++)
            <span style="color: transparent; text-shadow: 0 0 darkgray">🥚</span>
        @endfor
        @if (Auth::user()->eggHunt()->count()>=5)
        <form action="{{ route('eggHunt.claim') }}" method="POST">
          @csrf
            <button class="bg-primary text-white px-6 py-2 rounded-lg font-semibold hover:bg-accent1 mt-2">
                Claim Promo Code
            </button>
        </form>
        @endif        
         @endif

      </p>
    </div>
    <!-- Farm to Fork -->
    <div class="absolute inset-0 z-0 flex flex-col items-center justify-center text-center">
      <h1 class="text-4xl text-primary md:text-5xl lg:text-6xl font-bold pb-4">Farm To Fork</h1>
      <h2 class="text-secondary text-xl md:text-2xl font-semibold pb-8">Fresh Ingredients, Delivered to Your Doorstep</h2>
      <div class="flex justify-center space-x-5">
        <a href="/boxes" class="px-7 py-3 bg-primary bg-opacity-35 border-4 border-primary text-white rounded-lg hover:bg-accent1 text-lg md:text-2xl font-bold transition duration-300 ease-in-out shadow-lg">Boxes</a>
        <a href="/recipes" class="px-7 py-3 bg-text bg-opacity-35 border-4 border-text text-white rounded-lg hover:bg-accent2 text-lg md:text-2xl font-bold transition duration-300 ease-in-out shadow-lg">Recipes</a>
      </div>
    </div>
  </section>

  <!-- Features section -->
  <section class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 flex flex-col h-full">
        <div class="p-6 flex flex-col items-center justify-center text-center h-full">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary mb-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          <p class="text-2xl font-semibold">From our fields to your table in no time - taste what fresh really means!</p>
        </div>
      </div>
      <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 flex flex-col h-full">
        <div class="p-6 flex flex-col items-center justify-center text-center h-full">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary mb-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
          </svg>
          <p class="text-2xl font-semibold">Waste no time with our perfect recipes!</p>
        </div>
      </div>
      <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 flex flex-col h-full">
        <div class="p-6 flex flex-col items-center justify-center text-center h-full">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary mb-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
          </svg>

          <p class="text-2xl font-semibold">Join our mission to eliminate food waste - imperfect produce at perfect prices</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Product Gallery -->
  <section class="container mx-auto px-4 py-12">
    <div class="text-center mb-8">
      <h1 class="text-4xl text-gray-800 font-bold mb-4">Product Gallery</h1>
    </div>
  
    <div class="bg-white rounded-xl overflow-hidden shadow-lg p-5 relative">
      <div class="slideshow-container h-[600px] w-full relative">
        <div class="slides fade h-full w-full" >
          <img src="images/productgallery1.jpg" alt="Slide 1" class="slide-img rounded-xl h-full w-full object-cover">
        </div>
        <div class="slides fade h-full w-full">
          <img src="images/productgallery2.jpg" alt="Slide 2" class="slide-img rounded-xl h-full w-full object-cover">
        </div>
        <div class="slides fade h-full w-full">
          <img src="images/productgallery3.jpg" alt="Slide 3" class="slide-img rounded-xl h-full w-full object-cover">
        </div>
        <div class="slides fade h-full w-full">
          <img src="images/productgallery4.jpg" alt="Slide 4" class="slide-img rounded-xl h-full w-full object-cover">
        </div>
        <div class="slides fade h-full w-full">
          <img src="images/productgallery5.jpg" alt="Slide 5" class="slide-img rounded-xl h-full w-full object-cover">
        </div>

        <div class="dot-container absolute bottom-4 left-0 right-0 flex justify-center">
          <span class="dot active" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
          <span class="dot" onclick="currentSlide(3)"></span>
          <span class="dot" onclick="currentSlide(4)"></span>
          <span class="dot" onclick="currentSlide(5)"></span>
        </div> 
      </div>
    </div>
    <!-- to start the Product Gallery slideshow on page load -->
    <body onload="currentSlide(1)">
  </section>

  <!-- Reviews -->
  <section class="container mx-auto px-4 py-12">
    <div class="text-center mb-8">
      <h1 class="text-4xl text-gray-800 font-bold mb-4">What do our customers think?</h1>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      @foreach ($siteReviews as $review)
        <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 flex flex-col h-full">
          <div class="p-6 flex flex-col justify-between min-h-[250px]">
            <div>
              <h1 class="text-primary font-bold text-lg mb-2">{{ $review->site_title }}</h1>
              <p class="text-gray-600 text-sm md:text-base">{{ $review->site_description }}</p>
            </div>
            <div class="mt-4 pt-3 border-t border-gray-100">
              <div class="flex justify-between items-center">
                <h1 class="review-username text-gray-700">{{ $review->user->name ?? 'Deleted User' }}</h1>
                <p>
                  @for ($i = $review->site_rating; $i>0; $i--)
                  🥕
                  @endfor
                  @for ($i = $review->site_rating; $i<5; $i++)
                  <span style="color: transparent; text-shadow: 0 0 darkgray">🥕</span>
                  @endfor
                </p>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="flex justify-center mt-6">
      <a href='review' class="px-7 py-3 bg-primary text-white rounded-lg hover:bg-accent1 text-lg md:text-xl font-bold transition duration-300 ease-in-out shadow-lg">Give us a review!</a>
    </div>
  </section>

  <section class="container mx-auto px-4 py-12">
    <div class="text-center mb-8">
      <h1 class="text-4xl text-gray-800 font-bold mb-4">Our Location</h1>
    </div>
    <div class="bg-white rounded-xl overflow-hidden shadow-lg">
      <div class="w-full h-[400px] md:h-[500px] rounded-xl overflow-hidden">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d358416.0809155384!2d-2.303475838479177!3d52.34936048196967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870c59b828a514b%3A0x971a4bc185c5f254!2sFarms%20To%20Fork%20Ltd!5e0!3m2!1sen!2suk!4v1729868207310!5m2!1sen!2suk" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </section>
</x-layout>