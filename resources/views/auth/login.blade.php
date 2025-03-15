<x-layout>
    <div class="flex justify-center p-4 md:my-16">
        <form class="flex flex-col bg-white p-16 pt-6 rounded w-[100%] max-w-[500px] border-[3px] border-primary m-auto" method="POST">
            <h3 class=" font-bold text-5xl text-center pb-9 ">Log In</h3>
            @csrf
            <x-form-input  name="email" id="email" type="email" :value="old('email')" label="Email"/>
            <x-form-error name="email"/>
    
            <x-form-input name="password" id="password" type="password" label="Password"/>
            <x-form-error name="password"/>

            <a href="forgot-password" class="ml-2 md:ml-1 text-secondary text-sm">Forgot Password? </a>

            <button class="bg-primary text-white py-2 rounded hover:bg-accent1 text-lg mt-4">Log In</button>
             
            <div class="flex items-center">
                <p>Don't have an account?</p>
                <a href="register" class="ml-2 md:ml-1 text-secondary font-bold">Sign up</a>
            </div>
        </form>
    </div>
</x-layout>