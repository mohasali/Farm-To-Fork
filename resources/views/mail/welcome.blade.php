@extends('components.email-layout')
<div class="flex flex-col mt-12 bg-white p-16 pt-6 rounded w-[100%] max-w-[500px] border-[3px] border-primary m-auto">
    <h1 class=" font-bold text-5xl text-center mt-5 pb-5">Hello,</h1>
    <p class="items-center text-center text-lg mt-6 mb-8">Thank you for joining the Farm to Fork community!</p>
        <p class="items-center text-center text-lg mt-6 mb-4">Complete our Easter Egg Hunt to get 10% off you next order!</p>
        <div class="flex justify-center mb-6">
            <a href="http://group-45.test" class="px-7 py-3 mt-4 flex-col justify-center text-center bg-primary text-white rounded-lg hover:bg-accent1 text-lg md:text-2xl font-bold transition duration-300 ease-in-out">Go to egg hunt</a>  
        </div>
    <p class="items-center text-center text-lg mt-2 mb-6"> Farm to Fork</p>
</div>

<footer>
    <div class="flex flex-col mt-12 bg-white p-16 pt-6 rounded w-[100%] max-w-[500px] m-auto">
        <div class="flex items-center justify-center space-x-3">
          <a href="https://www.instagram.com/farm.to.forks/">
            <img src="cid:instagram.png" alt="Instagram" class="h-6 md:h-8 hover:opacity-75">
          </a>
          <a href="https://x.com/FarmToForks">
            <img src="cid:x.png" alt="X" class="h-6 md:h-8 hover:opacity-75">
          </a>
          <a href="https://www.facebook.com/profile.php?id=61568983198372">
            <img src="cid:facebook.png" alt="Facebook" class="h-6 md:h-8 hover:opacity-75">
          </a>
        </div>
        
        <p class="text-sm md:text-base text-center">Contact@FarmToFork.com</p>
        
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
