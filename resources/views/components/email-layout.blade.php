<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>

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
