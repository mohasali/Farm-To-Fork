<x-layout>
<div class="flex justify-center p-4 md:my-16">
        <form class="flex flex-col bg-white p-16 pt-6 rounded w-[100%] max-w-[500px] border-[3px] border-primary m-auto" method="POST">
            <h3 class=" font-bold text-5xl text-center pb-9 ">Forgot Password</h3>
            <p class="flex justify-center text-center mb-4">Enter your account email here and if it matches an existing account we will send you a password reset email!</p>
            @csrf
            <x-form-input  name="email" id="email" type="email" :value="old('email')" label="Email" required/>
            <x-form-error name="email"/>

            <button class="bg-primary text-white py-2 rounded hover:bg-accent1 text-lg mt-4">Reset Password</button>
             
            </div>
        </form>
    </div>
</x-layout>
