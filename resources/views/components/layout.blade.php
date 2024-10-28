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
  <nav class="flex justify-between items-center bg-white px-7 py-2 desktop-nav hidden md:flex">
    <div>
      <a href="/"><img src="images/logo.png" alt="Logo" class="max-w-20"></a>
    </div>
  
    <div class="flex justify-between space-x-3">
      <x-nav-link href='/'> Home </x-nav-link>
      <x-nav-link href='/recipes'> Recipes </x-nav-link>
      <x-nav-link href='/boxes'> Boxes </x-nav-link>
      <x-nav-link href='/about'> About Us </x-nav-link>
      <x-nav-link href='/contact'> Contact Us </x-nav-link>
    </div>
    
    <div class="space-x-3">
      <x-nav-link href='/register'> Register </x-nav-link>
      <x-nav-link href='/login'> Login </x-nav-link>
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
    <div class=" flex flex-col fixed bg-white h-[100%] w-[200px] top-[69px] right-[0px] space-y-2 items-end p-2 mobile-menu">
      <x-nav-link href='/'> Home </x-nav-link>
      <x-nav-link href='/recipes'> Recipes </x-nav-link>
      <x-nav-link href='/boxes'> Boxes </x-nav-link>
      <x-nav-link href='/about'> About Us </x-nav-link>
      <x-nav-link href='/contact'> Contact Us </x-nav-link>
    </div>
  </nav>

  <main>
    {{ $slot }}
  </main>
  <footer class="mt-auto bg-primary w-full h-24">
  </footer>
</body>
</html>
