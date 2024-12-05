<x-layout>
    <main class="w-full">

        <section class="relative w-full min-h-[calc(100vh-100px)] bg-cover bg-center" style="background-image: url('images/Aboutus.jpg');">
          <div class="absolute inset-0 flex flex-col items-center justify-center text-center">
            <h1 class="text-white text-6xl font-bold pb-4">Contact us</h1>
          </div>
        </section>
    
        <section class= "w-full h-[830px]  bg-primary flex items-center justify-center ">
          
          <div class="w-[90%] md:w-[50%] bg-gray-100 p-6 rounded-lg">
    
            <h2 class="text-4xl font-bold mb-10 text-center">Contact Us</h2>
           
            <form action="https://formspree.io/f/mldezkpj" method="POST">
    
              <div class="mb-4">
                <label class="text-sm font-medium mb-2">Forename</label>
                <input type="text" id="forename" name="forename" class="w-full p-2 rounded" placeholder="Enter your forename" required>
              </div>
    
              <div class="mb-4">
                <label class="text-sm font-medium mb-2">Surname</label>
                <input type="text" id="surname" name="surname" class="w-full p-2 rounded-lg" placeholder="Enter your surname" required>
              </div>
    
              <div class="mb-4">
                <label class=" text-sm font-medium mb-2">Email Address</label>
                <input type="email" id="email" name="email" class="w-full p-2 rounded-lg" placeholder="Enter your email" required>
              </div>
    
              <div class="mb-4">
                <label class=" text-sm font-medium mb-2">Phone Number</label>
                <input type="tel" id="phone" name="phone" class="w-full p-2 rounded-lg" placeholder="Enter your phone number" pattern="(\+44\s?\d{10}|0\d{10})" title="Phone number must be in the format +44 0000000000 or 00000000000">
              </div>
    
              <div class="mb-6">
                <label class="text-sm font-medium mb-2">Your Query</label>
                <textarea id="message" name="message" class="w-full p-2 rounded-lg" rows="5" placeholder="Write your query here..."></textarea>
              </div>
    
              <div class="text-center">
                <button type="submit" class="bg-secondary text-white px-6 py-3 rounded-lg font-bold hover:bg-accent2">Submit</button>
              </div>
    
            </form>
    
          </div>
    
        </section>
        
    
        
    
        <section class="w-full h-800px bg-white">
    
          <section>
            <div class="w-full h-[100px] flex flex-col items-center justify-center mb-8">
             <h1 class="text-5xl font-bold text-black mb-2">Our location</h1>
            </div>
          </section>
    
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