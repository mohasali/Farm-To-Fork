<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-background text-text flex flex-col min-h-screen">
  <nav class="justify-between items-center bg-white px-7 desktop-nav hidden md:flex border-b-4 border-accent1 p-1">
    <div>
      <a href="/"><img src="/images/logo.png" alt="Logo" class="max-w-20"></a>
    </div>
  
    <!-- Navigation bar -->
    <div class="flex justify-between space-x-3">
      <x-nav-link href='/'> Home </x-nav-link>
      <x-nav-link href='/about'> About Us </x-nav-link>
      <x-nav-link href='/boxes'> Boxes </x-nav-link>
      <x-nav-link href='/recipes'> Recipes </x-nav-link>
      <x-nav-link href='/contact'> Contact Us </x-nav-link>
    </div>

    <!-- Navigation bar guest access -->
    <div class=" flex items-center space-x-3">
      @guest
      <x-nav-link href='/login'> Login </x-nav-link>
      <x-nav-link href='/register'> Register </x-nav-link>
      @endguest

      <!-- Navigation bar logged in user -->
      @auth
      <div class="group flex flex-col justify-start bg-white">
        <x-nav-link class="group-hover:text-primary"  href='/account/user'> My Account </x-nav-link>
        <div class="group-hover:flex fixed top-[55px] flex-col z-10 p-4 space-y-2 hidden bg-white">
          <x-nav-link href="/account/user">Manage</x-nav-link>
          <form class=" m-0" method="POST" action="/logout">
            @csrf
            <button class="hover:text-primary">Log Out</button>
          </form>
        </div>
      </div>
        <x-nav-link href='/cart'> Cart </x-nav-link>
      </div>

      
      @endauth

    </div>
  </nav>    
  <nav class="px-3 z-10 bg-text p-6 mobile-nav md:hidden sticky top-0" >
    <div class="flex justify-end">
      <button id="mobile-nav-button" class="mobile-nav">
        <div class=" w-[25px] h-[3px] bg-white mb-1"></div>
        <div class=" w-[25px] h-[3px] bg-white mb-1"></div>
        <div class=" w-[25px] h-[3px] bg-white mb-1"></div>
      </button>
    </div>
    <div class=" flex flex-col fixed bg-white h-[100%] w-[200px] top-[69px] right-[0px] space-y-2 items-end p-2 mobile-menu transition-all duration-300 ease-in-out">
      <x-nav-link href='/'> Home </x-nav-link>
      <x-nav-link href='/about'> About Us </x-nav-link>
      <x-nav-link href='/boxes'> Boxes </x-nav-link>
      <x-nav-link href='/recipes'> Recipes </x-nav-link>
      <x-nav-link href='/contact'> Contact Us </x-nav-link>
      <x-nav-link href='/cart'>Cart</x-nav-link>
      @guest
      <x-nav-link href='/login'> Login </x-nav-link>
      <x-nav-link href='/register'> Register </x-nav-link>
      @endguest

      @auth
      <x-nav-link href='/'> My Account </x-nav-link>
      <form class=" m-0 ml-3" method="POST" action="/logout">
        @csrf
        <button class="hover:text-primary">Log Out</button>
      </form>
      @endauth
    </div>
  </nav>

  <main>
    {{ $slot }}
  </main>
  <footer class="mt-auto bg-primary w-full p-6 text-white">
    <div class="flex flex-wrap justify-center space-y-6 md:space-y-0 md:flex-nowrap">
      
      <div class="w-full md:w-1/3 text-center flex flex-col items-center">
        <ul class="space-y-1">
          <li class="font-semibold">Pages</li>
          <li><a href="/" class="hover:underline">Home</a></li>
          <li><a href="/about" class="hover:underline">About Us</a></li>
          <li><a href="/boxes" class="hover:underline">Boxes</a></li>
          <li><a href="/recipes" class="hover:underline">Recipes</a></li>
          <li><a href="account.html" class="hover:underline">Login</a></li>
          <li><a href="account.html" class="hover:underline">Register</a></li>
        </ul>
      </div>
      
      <div class="w-full md:w-1/3 text-center flex flex-col items-center">
        <ul class="space-y-1">
          <li class="font-semibold">Legal</li>
          <li><a href="/tmc" class="hover:underline">Terms and Conditions</a></li>
          <li><a href="/pnc" class="hover:underline">Privacy and Cookies</a></li>
          <li><a href="https://www.gov.uk/data-protection" class="hover:underline">GDPA</a></li>
          <li><a href="https://www.ifrs.org/groups/international-sustainability-standards-board/" class="hover:underline">ISSB</a></li>
          <li><a href="https://www.modernslavery.gov.uk/start" class="hover:underline">Modern Slavery Report</a></li>
          <li><a href="https://www.fca.org.uk/" class="hover:underline">UK FCA</a></li>
          <li><a href="/contact" class="hover:underline">Contact Us</a></li>
        </ul>
      </div>
      
      <div class="w-full md:w-1/3 text-center flex flex-col items-center space-y-4">
        <div class="flex items-center space-x-3">
          <a href="https://www.instagram.com/farm.to.forks/">
            <img src="/images/instagram.png" alt="Instagram" class="h-6 md:h-8 hover:opacity-75">
          </a>
          <a href="https://x.com/FarmToForks">
            <img src="/images/x.png" alt="X" class="h-6 md:h-8 hover:opacity-75">
          </a>
          <a href="https://www.facebook.com/profile.php?id=61568983198372">
            <img src="/images/facebook.png" alt="Facebook" class="h-6 md:h-8 hover:opacity-75">
          </a>
        </div>
        
        <p class="text-sm md:text-base">Contact@FarmToFork.com</p>
        
        <div class="flex flex-col items-center">
          <h3 class="text-base md:text-lg font-semibold">Subscribe to our Newsletter</h3>
          <button class="px-8 py-1 mt-3 bg-text text-white rounded-lg">Join</button>
        </div>
      </div>
    </div>
    
    <div class="text-center py-4 border-t border-gray-200 mt-4">
      <p class="text-xs md:text-base">&copy; 2024 Farm To Fork. All rights reserved.</p>
    </div>
  </footer>
  
</body>
</html>
