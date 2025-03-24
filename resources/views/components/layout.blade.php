<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="z-50 bg-background text-text flex flex-col min-h-screen">
  <nav class="z-50 justify-between items-center bg-white px-7 desktop-nav hidden md:flex border-b-4 border-accent1 p-1">
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
      <x-nav-link href="{{ url('/account/rewards') }}" class="flex items-center"><i class="fa-solid fa-gift"></i></x-nav-link>
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
          <!-- User Image (CHANGE PATH) -->
          <x-nav-link href='/account/user'>
            <a href='/account/user'><img src="{{ Auth::user()->pfp ?? '/images/Placeholder.jpeg' }}" alt="Cart icon" class="h-6 md:h-8 hover:opacity-75 rounded-full"></a>
          </x-nav-link>
          <div class="group-hover:flex fixed top-[60px] right-[40px] flex-col z-10 p-4 space-y-2 hidden bg-white">
            <x-nav-link href="/account/user">Manage</x-nav-link>
            <form class=" m-0" method="POST" action="/logout">
              @csrf
              <button class="hover:text-primary">Log Out</button>
            </form>
          </div>
        </div>
        <x-nav-link href='/cart' class="relative">
            <img src="/images/cart.png" alt="Cart icon" class="h-6 md:h-8 hover:opacity-75">
            @php
                $cartItemCount = Auth::check() ? Auth::user()->cartItems()->count() : 0;
            @endphp
            @if($cartItemCount > 0)
                <p class="absolute -top-1.5 -right-1 bg-accent2 text-white text-xs rounded-full px-2 py-1">
                    {{ $cartItemCount }}
                </p>
            @endif
        </x-nav-link>

      
      @endauth

    </div>
  </nav>  
  
  <!-- MOBILE -->
  <nav class="px-3 z-50 bg-text p-6 mobile-nav md:hidden sticky top-0" >
    <div class="flex justify-end">
      <!-- Farm to fork -->
      <div class="absolute left-0 right-0 mx-auto w-max pointer-events-none">
        <h1 class="text-white font-medium">Farm to Fork</h1>
      </div>
      <button id="mobile-nav-button" class="mobile-nav">
        <div class=" w-[25px] h-[3px] bg-white mb-1"></div>
        <div class=" w-[25px] h-[3px] bg-white mb-1"></div>
        <div class=" w-[25px] h-[3px] bg-white mb-1"></div>
      </button>
    </div>
    <div class="flex flex-col fixed bg-white h-[100%] w-[200px] top-[69px] right-[0px] space-y-2 items-end p-2 mobile-menu transition-all duration-300 ease-in-out">
      <x-nav-link href='/'> Home </x-nav-link>
      <x-nav-link href='/about'> About Us </x-nav-link>
      <x-nav-link href='/boxes'> Boxes </x-nav-link>
      <x-nav-link href='/recipes'> Recipes </x-nav-link>
      <x-nav-link href='/contact'> Contact Us </x-nav-link>
      <x-nav-link href="{{ url('/account/rewards') }}" class="flex items-center"><i class="fa-solid fa-gift"></i></x-nav-link>
      
      @guest
      <x-nav-link href='/login'> Login </x-nav-link>
      <x-nav-link href='/register'> Register </x-nav-link>
      @endguest
      
      @auth
      <div class="flex-grow"></div>
      
        <div class="w-full flex flex-col border-t border-gray-200 pb-16 mb-16 mt-auto">
          <div class="w-full border-t border-gray-200 pt-3 mt-auto">
            <div class="flex justify-between items-center w-full">
              <!-- User -->
              <x-nav-link href='/account/user' class="flex items-center">
                <img src="{{ Auth::user()->pfp ?? '/images/Placeholder.jpeg' }}" alt="User pfp" class="h-8 w-8 hover:opacity-75 rounded-full">
                <span class="ml-2">Account</span>
              </x-nav-link>
              
              <!-- Cart -->
              <x-nav-link href='/cart' class="relative">
                <img src="/images/cart.png" alt="Cart icon" class="h-8 hover:opacity-75">
                @php
                    $cartItemCount = Auth::check() ? Auth::user()->cartItems()->count() : 0;
                @endphp
                @if($cartItemCount > 0)
                    <p class="absolute -top-1.5 -right-1 bg-accent2 text-white text-xs rounded-full px-2 py-1">
                        {{ $cartItemCount }}
                    </p>
                @endif
              </x-nav-link>
            </div>
            
            <!-- Logout -->
            <form class="mt-3 w-full" method="POST" action="/logout">
              @csrf
              <button class="w-full py-2 bg-primary text-white rounded text-center">Log Out</button>
            </form>
        </div>
      @endauth
    </div>
  </nav>

  <main>
    <style>  
      .emoji {
        position: fixed;
        font-size: 2rem;
        color: rgb(73, 73, 73);
        filter: grayscale(100%);
        opacity: 0.13;
        user-select: none;
        pointer-events: none;
        transition: filter 350ms ease, opacity 350ms ease;
        animation: moveDiagonal 100s linear infinite;
      }
  
      @keyframes moveDiagonal {
        0% { transform: translate(-100%, -100%); }
        100% { transform: translate(100vw, 100vh); }
      }
    </style>
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
        
        <p class="text-sm md:text-base">farmtofork.999@gmail.com</p>
        
        <div class="flex flex-col items-center">
          <h3 class="text-base md:text-lg font-semibold">Subscribe to our Newsletter</h3>
          <button class="px-8 py-1 mt-3 bg-text text-white rounded-lg hover:opacity-75">Join</button>
        </div>
      </div>
    </div>
    
    <div class="text-center py-4 border-t border-gray-200 mt-4">
      <p class="text-xs md:text-base">&copy; 2024 Farm To Fork. All rights reserved.</p>
    </div>
  </footer>
  
</body>

<script>
const emojis = [
  '🥕', '🍈', '🍑', '🍅', '🍄', '🥑', '🥔', '🍎', '🍊', '🍉', '🍇', '🍓', '🫐', '🍒', 
  '🍍', '🥭', '🥝', '🍐', '🍏', '🍆', '🥬', '🥦', '🌽', '🌶️', '🫑', '🫛', '🫒', '🥦',
  '🍆', '🥬', '🌽', '🌶️', '🥑', '🥩', '🍗', '🍖', '🥓', '🍤', '🐟', '🦐', '🦑', '🦀',
   '🐙', '🥩', '🥓', '🍗', '🍖'
];


  function spawnEmojis(v) {
    const numberOfEmojis = 20;
    const emojiRow = document.createElement('div');
    emojiRow.style.position = 'absolute';
    emojiRow.style.top = v + 'vh';
    emojiRow.style.left = '0';
    emojiRow.style.zIndex ='-1';

    for (let i = -numberOfEmojis; i < numberOfEmojis; i++) {
      const emoji = document.createElement('div');
      emoji.classList.add('emoji');
      emoji.textContent = emojis[Math.floor(Math.random() * emojis.length)];
      emoji.style.left = `${(100 / numberOfEmojis) * i}vw`;

      emojiRow.appendChild(emoji);
    }

    document.body.appendChild(emojiRow);
    setTimeout(() => emojiRow.remove(), 100000);
  }

  let emojiInterval;
    
  function setEmojis() {
    for (let i = 0; i < 100; i += 10) {
      spawnEmojis(i);
    }
    emojiInterval = setInterval(() => spawnEmojis(0), 10000);
  }

  function handleVisibilityChange() {
    if (document.hidden) {
      clearInterval(emojiInterval);
      document.querySelectorAll('.emoji').forEach(emoji => emoji.remove());
    } else {
      setEmojis();
    }
  }

  document.addEventListener('visibilitychange', handleVisibilityChange);
  setEmojis();

  document.addEventListener('mousemove', (event) => {
    document.querySelectorAll('.emoji').forEach(emoji => {
      const rect = emoji.getBoundingClientRect();
      const emojiX = rect.left + rect.width / 2;
      const emojiY = rect.top + rect.height / 2;

      const distance = Math.hypot(event.clientX - emojiX, event.clientY - emojiY);
      const maxDistance = 100; // Max distance for the effect

      if (distance < maxDistance) {
        const intensity = (1 - (distance / maxDistance) )*1.25; // Closer = stronger effect
        emoji.style.filter = `grayscale(${(1 - intensity) * 100}%)`;
        emoji.style.opacity = `${0.13 + intensity}`;
      } else {
        emoji.style.filter = 'grayscale(100%)';
        emoji.style.opacity = '0.13';
      }
    });
  });

</script>


</html>
