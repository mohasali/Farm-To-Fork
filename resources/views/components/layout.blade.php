<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
  
  <nav class="flex flex-wrap justify-between items-center w-full h-[100px] bg-primary px-4 lg:px-0">
    <div class="flex justify-center lg:justify-start pl-4">
      <a href="/"><img src="images/farmtoforklogo.png" alt="Logo" class="h-16 lg:h-20"></a>
    </div>
    <div class="hidden lg:flex flex-1 justify-center">
      <ul class="flex space-x-4">
        <x-nav-link href="/">Home</x-nav-link>
        <x-nav-link href="/">Recipe's</x-nav-link>
        <x-nav-link href="/">About Us</x-nav-link>
        <x-nav-link href="/">Contact Us</x-nav-link>
      </ul>
    </div>
    <div class="flex justify-center lg:justify-end space-x-5 pr-4">
      <a href="/account"><img src="images/account.png" alt="Account" class="h-8"></a>
      <a href="/cart"><img src="images/cart.png" alt="Cart" class="h-8"></a>
    </div>
    <div class="lg:hidden flex items-center">
      <button id="menu" class="text-black">
        <svg class="w-8 h-8" stroke="currentColor">
          <path stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
  </nav>

  <div class="mobile-menu bg-primary">
    <ul class="flex flex-col items-center">
      <x-nav-link href="/">Home</x-nav-link>
      <x-nav-link href="/">Recipe's</x-nav-link>
      <x-nav-link href="/">About Us</x-nav-link>
      <x-nav-link href="/">Contact Us</x-nav-link>
    </ul>
  </div>
 

    <main class="w-full h-[500px] mt-5">
      {{ $slot }}

    </main>

    <footer class="flex justify-between items-center w-full h-[250px] bg-primary">
      <div class="w-[33.3%] h-full flex flex-col items-center justify-center">
        <ul class="space-y-1">
          <li><a class="text-sms hover:underline">Pages</a></li>
          <li><a href="/index" class="text-xs hover:underline">Home</a></li>
          <li><a href="/products" class="text-xs hover:underline">Products</a></li>
          <li><a href="/aboutus" class="text-xs hover:underline">About Us</a></li>
          <li><a href="/subscription" class="text-xs hover:underline">Subscribe</a></li>
          <li><a href="/account" class="text-xs hover:underline">Login</a></li>
          <li><a href="/account" class="text-xs hover:underline">Sign Up</a></li>
          <li><a href="/blog" class="text-xs hover:underline">Blog</a></li>
        </ul>
      </div>

        <div class="w-[33.4%] h-full flex items-center justify-center">
          <ul class="space-y-1">
            <li><a class="text-sms hover:underline">Legal</a></li>
            <li><a href="/termsandconditions" class="text-xs hover:underline">Terms and Conditions</a></li>
            <li><a href="/cookies" class="text-xs hover:underline">Privacy and Cookies</a></li>
            <li><a href="https://www.gov.uk/data-protection#:~:text=The%20Data%20Protection%20Act%202018%20is%20the%20UK's%20implementation%20of,used%20fairly%2C%20lawfully%20and%20transparently" class="text-xs hover:underline">General Data Protection Act (GDPA)</a></li>
            <li><a href="https://www.ifrs.org/groups/international-sustainability-standards-board/" class="text-xs hover:underline">International Sustainability Standards Board (ISSB)</a></li>
            <li><a href="https://www.modernslavery.gov.uk/start" class="text-xs hover:underline">Modern Slavery report</a></li>
            <li><a href="https://www.fca.org.uk/" class="text-xs hover:underline">UK Financial Conduct Authority (FCA)</a></li>
            <li><a href="/contactus" class="text-xs hover:underline">Contact Us</a></li>
          </ul>
        </div>

        <div class="w-[33.3%] h-full flex flex-col items-center justify-center space-y-2"> 

            <div class="flex items-center space-x-5" > 
              <a href="https://www.instagram.com/">
                <img src="images/instagram.png" alt="Instagram" class="h-8 hover:opacity-75">
              </a>
              <a href="https://x.com/?lang=en">
                <img src="images/x.png" alt="X" class="h-8 hover:opacity-75">
              </a>
              <a href="https://www.facebook.com/?locale=en_GB">
                <img src="images/facebook.png" alt="Facebook" class="h-8 hover:opacity-75">
              </a>
            </div>

            <div>
                <p class="text-center">Contact@FarmToFork.com</p> 
            </div>

            <div class="flex flex-col items-center space-y-2">
              <h3 class="text-lg font-semibold">Subscribe to our Newsletter</h3>
              <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Join</button>
            </div>

          </div>
          
      </footer>
      <footer class="bg-secondary text-center text-white p-4 h-15">
        <p>© 2024 Farm To Fork. All rights reserved.</p>
      </footer>
</body>
</html>