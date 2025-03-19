<!-- This web page should only be accessed via email -->
<x-layout>
<div class="flex justify-center p-4 md:my-16">
        <form class="flex flex-col bg-white p-16 pt-6 rounded w-[100%] max-w-[500px] border-[3px] border-primary m-auto" method="POST" action="{{route('reset.password')}}">
            <h3 class=" font-bold text-5xl text-center pb-9 ">Change Password</h3>
            @csrf
            <input type="text" name = "token" hidden value="{{$token}}">
            <x-form-input  name="email" id="email" type="email" :value="old('email')" label="Email" required/>
            <x-form-error name="email"/>
            <p class="mt-4"> </p>
            <x-form-input name="password" id="password" type="password" label="Password"/>
            <x-form-error name="password"/>
            <p class="mt-4"> </p>
            <x-form-input name="password" id="password" type="password" label="Confirm new password"/>
            <x-form-error name="password"/>

            <button class="bg-primary text-white py-2 rounded hover:bg-accent1 text-lg mt-4">Reset Password</button>
             
            </div>
        </form>
    </div>
</x-layout>
