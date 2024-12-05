<x-layout>
<div class="flex justify-center p-4">
    <form class="flex flex-col bg-white p-16 pt-6 rounded w-[100%] max-w-[500px] border-[3px] border-primary" method="POST">
        <h3 class=" font-bold text-5xl text-center pb-9 ">Register</h3>
        @csrf

        <!-- Registration form inputs-->
        <x-form-input name="name" id="name" type="text" :value="old('name')" label="Full Name"/>
        <x-form-error name="name"/>

        <x-form-input  name="email" id="email" type="email" :value="old('email')" label="Email" />
        <x-form-error name="email"/>

        <x-form-input  name="email_confirmation" id="email_confirmation" type="email" :value="old('email_confirmation')" label="Confirm Email"/>
        <x-form-error name="email_confirmation"/>

        <x-form-input  name="phone" id="phone" type="tel" :value="old('phone')" label="Phone" />
        <x-form-error name="phone"/>

        <!-- Address Details !!Make Optional
             
        <x-form-input  name="address_line_1" id="address_line_1" type="text" :value="old('address_line_1')" label="Address Line 1" />
        <x-form-error name="address_line_1"/>

        <x-form-input  name="address_line_2" id="address_line_2" type="text" :value="old('address_line_2')" label="Address Line 2" />
        <x-form-error name="address_line_2"/>

        <x-form-input  name="postcode" id="postcode" type="text" :value="old('postcode')" label="Postcode" />
        <x-form-error name="postcode"/>

        <x-form-input  name="town/city" id="town/city" type="text" :value="old('town/city')" label="Town/ City" />
        <x-form-error name="town/city"/>

        <x-form-input  name="country" id="country" type="text" :value="old('country')" label="Country" />
        <x-form-error name="country"/>
        -->

        <!-- Password Details -->
        <x-form-input name="password" id="password" type="password" label="Password"/>
        <x-form-error name="password"/>

        <x-form-input name="password_confirmation" id="password_confirmation" type="password" label="Confirm Password"/>
        <button class="bg-primary text-white py-2 rounded hover:bg-accent1 text-lg mt-4">Register</button>

        <div class="flex items-center">
            <p>Already have an account?</p>
            <a href="login" class="ml-2 md:ml-1 text-secondary font-bold">Log in</a>
        </div>
    </form>
</div>
</x-layout>