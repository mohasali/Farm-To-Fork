<x-layout>
<div class="flex justify-center p-4">
    <form class="flex flex-col bg-white p-16 pt-6 rounded w-[100%] max-w-[500px] border-[3px] border-primary" method="POST" action="/register">
        <h3 class=" font-bold text-5xl text-center pb-9 ">Register</h3>
        @csrf

        <label class="font-bold">Full Name</label>
        <x-form-input name="name" id="name" type="text" :value="old('name')" required/>
        <x-form-error name="name"/>

        <label class="font-bold">Email</label>
        <x-form-input  name="email" id="email" type="email" :value="old('email')" required/>
        <x-form-error name="email"/>

        <label class="font-bold">Confirm Email</label>
        <x-form-input  name="email_confirmation" id="email_confirmation" type="email" :value="old('email_confirmation')" required/>
        <x-form-error name="email_confirmation"/>

        <label class="font-bold">Password</label>
        <x-form-input name="password" id="password" type="password" required/>
        <x-form-error name="password"/>

        <label class="font-bold">Confirm Password</label>
        <x-form-input name="password_confirmation" id="password_confirmation" type="password"/>
        <button class="bg-primary text-white py-2 rounded hover:bg-accent1 text-lg mt-4">Register</button>

    </form>
</div>
</x-layout>